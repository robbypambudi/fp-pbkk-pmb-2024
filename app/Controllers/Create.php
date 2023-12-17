<?php

namespace App\Controllers;

use App\Models\AkunModel;
use App\Models\TokenModel;

class Create extends BaseController
{
    protected $AkunModel;
    protected $TokenModel;

    public function __construct()
    {
        $this->AkunModel = new AkunModel();
        $this->TokenModel = new TokenModel();
        $this->email = \Config\Services::email();
    }

    public function index()
    {
        session();
        $data = [
            'title' => 'Create',
            'validation' => \Config\Services::validation()
        ];
        return view('create', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'nama' => 'required',
            'email' => 'required|valid_email|is_unique[akun.email]',
            'password' => 'required|matches[confirm-password]|min_length[6]',
            'confirm-password' => 'required|matches[password]'
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/create')->withInput()->with('validation', $validation);
        }

        #Captcha
        $secretkey = env("SECRETEKEY");
        $credential = array(
            'secret' => $secretkey,
            'response' => $this->request->getVar('g-recaptcha-response')
        );
        $verify = curl_init();
        curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($verify, CURLOPT_POST, true);
        curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($credential));
        curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($verify);

        $status = json_decode($response, true);
        if ($status['success']) {
            #Create Token
            $token = base64_encode(random_bytes(32));

            $email = htmlspecialchars($this->request->getVar('email'));

            #Save Data to DB
            $this->AkunModel->save([
                'nama' => htmlspecialchars($this->request->getVar('nama')),
                'email' => $email,
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'photo' => 'default.png',
                'active' => 0
            ]);

            #Insert Token to DB
            $this->TokenModel->save([
                'email' => $email,
                'token' => $token
            ]);

            #Send Email Activation
            $this->_sendEmail($token);

            session()->setFlashdata('message', 'Silahkan check inbox email dan aktifasi');
            return redirect()->to('/create');
        } else {
            $validation = \Config\Services::validation();
            return redirect()->to('/create')->withInput()->with('validation', $validation);
        }
    }

    private function _sendEmail($token)
    {
        $this->email->setFrom('fp.pbkk.a@gmail.com');
        $this->email->setTo($this->request->getVar('email'));
        $this->email->setSubject('PMB ITS, Account activation.');
        $this->email->setMessage('Click this link to activate your account : <a href="' . base_url() . '/activation?email=' . htmlspecialchars($this->request->getVar('email')) . '&token=' . urlencode($token) . '">Activate</a>');

        if (!$this->email->send()) {
            echo 'failed to send email. Please contact website administrator support@its.ac.id';
            die;
        } else {
            return true;
        }
    }
}
