<?php

namespace App\Controllers;

use App\Models\AkunModel;

class Changepassword extends BaseController
{
    protected $AkunModel;

    public function __construct()
    {
        $this->is_loged_in();
        $this->aid = session()->get('aid');
        $this->AkunModel = new AkunModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Change Password',
            'validation' => \Config\Services::validation()

        ];
        return view('user/changepassword', $data);
    }
    public function process()
    {

        if (!$this->validate([
            'current-password' => 'required',
            'new-password' => 'required|matches[confirm-password]|min_length[6]',
            'confirm-password' => 'required|matches[new-password]'
        ])) {
            return redirect()->to('changepassword')->withInput();
        }

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

        if (!$status['success']) {
            session()->setFlashdata('message', '<div class="alert alert-danger my-2" role="alert">Captcha Invalid.</div>');
            return redirect()->to('changepassword')->withInput();
        }

        $current_password = $this->request->getVar('current-password');
        $new_password = $this->request->getVar('new-password');
        $akun = $this->AkunModel->where('id', $this->aid)->first();

        // Verivikasi Email
        if (password_verify($current_password, $akun['password'])) {
            $data = [
                'password' => password_hash($new_password, PASSWORD_DEFAULT)
            ];
            $this->AkunModel->update($akun['id'], $data);
            session()->setFlashdata('message', '<div class="alert alert-success my-2" role="alert">Password changed berhasil diubah.</div>');
            return redirect()->to('/changepassword');
        }
        $validation = \Config\Services::validation();
        session()->setFlashdata('message', '<div class="alert alert-danger my-2" role="alert">Password lama salah.</div>');
        return redirect()->to('changepassword')->withInput();
    }
}
