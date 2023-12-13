<?php

namespace App\Controllers;

use App\Models\AkunModel;
use App\Models\TokenModel;

class Forgotpassword extends BaseController
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
        $data = [
            'title' => 'Forgot Password'
        ];
        return view('forgotpassword', $data);
    }

    public function reset()
    {
        if (!$this->validate([
            'email' => 'required|valid_email'
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/forgotpassword')->withInput()->with('validation', $validation);
        } else {
            #Captcha
            $secretkey = env('SECRETEKEY');
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

            try {
                if (!$status['success']) {
                    $validation = \Config\Services::validation();
                    session()->setFlashdata('message', '<div class="alert alert-danger my-2" role="alert">Captcha Invalid.</div>');
                    return redirect()->to('/forgotpassword')->withInput()->with('validation', $validation);
                }
            } catch (\Throwable $th) {
                //throw $th;
            }

            $email = $this->request->getVar('email');
            $akun = $this->AkunModel->where('email', $email)->first();

            if ($akun) {
                $token = base64_encode(random_bytes(32));
                #Insert Token to DB
                $this->TokenModel->save([
                    'email' => $email,
                    'token' => $token
                ]);
                #Send Email Activation
                $this->_sendEmail($token);

                session()->setFlashdata('message', '<div class="alert alert-info my-2" role="alert">Silahkan check inbox email dan reset password.</div>');
                return redirect()->to('/forgotpassword');
            } else {
                session()->setFlashdata('message', '<div class="alert alert-danger my-2" role="alert">Email salah.</div>');
                return redirect()->to('/forgotpassword')->withInput();
            }
        }
    }

    private function _sendEmail($token)
    {
        $this->email->setFrom('pmb.noreplay@tik.idu.ac.id');
        $this->email->setTo($this->request->getVar('email'));
        $this->email->setSubject('PMB Unhan RI, Reset Password.');
        $this->email->setMessage('Click this link to reset password your account : <a href="' . base_url() . '/resetpassword?email=' . htmlspecialchars($this->request->getVar('email')) . '&token=' . urlencode($token) . '">Reset Password</a>');

        if (!$this->email->send()) {
            echo 'failed to send email. Please contact website administrator support@tik.idu.ac.id';
            die;
        } else {
            return true;
        }
    }

    public function resetpassword()
    {
        $email = $this->request->getVar('email');
        $token = $this->request->getVar('token');

        $hasil = $this->TokenModel->where('email', $email)->first();

        if ($hasil) {
            if ($hasil['token'] == $token) {
                session()->set(['email' => $email]);
                $data = [
                    'title' => 'Ubah Password',
                    'validation' => \Config\Services::validation()
                ];
                return view('/change', $data);
            } else {
                session()->setFlashdata('message', '<div class="alert alert-danger my-2" role="alert">Reset password gagal, token salah.</div>');
                return redirect()->to('/forgotpassword')->withInput();
            }
        } else {
            session()->setFlashdata('message', '<div class="alert alert-danger my-2" role="alert">Reset password gagal, email salah.</div>');
            return redirect()->to('/forgotpassword')->withInput();
        }
    }

    public function change()
    {
        $email = session()->get('email');
        if (session()->get('email')) {
            if (!$this->validate([
                'password1' => 'required|min_length[6]|matches[password2]',
                'password2' => 'required|matches[password1]'
            ])) {
                return redirect()->to('/forgotpassword');
            } else {
                //Update password
                $password = password_hash($this->request->getVar('password1'), PASSWORD_DEFAULT);
                $email = session()->get('email');
                $this->TokenModel->update('email', $email);

                $this->db->set('password', $password);
                $this->db->where('email', $email);
                $this->db->update('akun');
                //Delete token
                $this->db->delete('token', ['email' => $email]);

                //Destroy session
                echo '';
                session()->destroy('email');
                session()->setFlashdata('message', '<div class="alert alert-info my-2" role="alert">Ubah password berhasil. Silahkan login!</div>');
                return redirect()->to('/forgotpassword');
            }
        } else {
            session()->setFlashdata('message', '<div class="alert alert-danger my-2" role="alert">Anda tidak memiliki kewenangan untuk mengakses halam ini!</div>');
            return redirect()->to('/forgotpassword');
        }
    }
}
