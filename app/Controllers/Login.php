<?php

namespace App\Controllers;

use App\Models\AkunModel;

class Login extends BaseController
{
    protected $AkunModel;
    protected $session;

    public function __construct()
    {
        $session = \Config\Services::session();
        $this->AkunModel = new AkunModel();
    }
    public function index()
    {
        session();
        $data = [
            'title' => 'Login',
            'validation' => \Config\Services::validation()
        ];
        return view('login', $data);
    }

    //Method authentication
    public function process()
    {
        if (!$this->validate([
            'email' => 'required|valid_email',
            'password' => 'required'
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/login')->withInput()->with('validation', $validation);
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
                    return redirect()->to('/login')->withInput()->with('validation', $validation);
                }
            } catch (\Throwable $th) {
                //throw $th;
            }

            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');

            $akun = $this->AkunModel->where('email', $email)->first();

            //Jika akun ada
            if ($akun) {
                //Check akun aktif
                if ($akun['active'] == 1) {
                    if (password_verify($password, $akun['password'])) {
                        $data = [
                            'aid' => $akun['id'],
                            'nama' => $akun['nama'],
                            'logged_in' => true
                        ];
                        session()->set($data);
                        return redirect()->to('beranda');
                    } else {
                        session()->setFlashdata('message', '<div class="alert alert-danger my-2" role="alert">Email atau password salah.</div>');
                        return redirect()->to('/login');
                    }
                } else {
                    session()->setFlashdata('message', '<div class="alert alert-danger my-2" role="alert">Akun belum aktif. Check email dan lakukan aktivasi.</div>');
                    return redirect()->to('/login');
                }
            } else {
                session()->setFlashdata('message', '<div class="alert alert-danger my-2" role="alert">Email atau password salah.</div>');
                return redirect()->to('/login');
            }
        }
    }
}
