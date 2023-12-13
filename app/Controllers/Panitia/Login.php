<?php

namespace App\Controllers\Panitia;

use App\Controllers\BaseController;

use App\Models\Panitia\UsersModel;

class Login extends BaseController
{
    protected $UsersModel;

    public function __construct()
    {
        $session = \Config\Services::session();
        $this->UsersModel = new UsersModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Login',
            'validation' => \Config\Services::validation()
        ];
        return view('panitia/login', $data);
    }

    public function proses()
    {
        if (!$this->validate([
            'email' => 'required|valid_email',
            'password' => 'required'
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/panitia/login')->withInput()->with('validation', $validation);
        } else {
            // #Captcha
            // $secretkey = env('SECRETEKEY');
            // $credential = array(
            //     'secret' => $secretkey,
            //     'response' => $this->request->getVar('g-recaptcha-response')
            // );
            // $verify = curl_init();
            // curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
            // curl_setopt($verify, CURLOPT_POST, true);
            // curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($credential));
            // curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
            // curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
            // $response = curl_exec($verify);

            // $status = json_decode($response, true);

            // try {
            //     if (!$status['success']) {
            //         $validation = \Config\Services::validation();
            //         session()->setFlashdata('message', '<div class="alert alert-danger my-2" role="alert">Captcha Invalid.</div>');
            //         return redirect()->to('/login')->withInput()->with('validation', $validation);
            //     }
            // } catch (\Throwable $th) {
            //     //throw $th;
            // }

            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');

            $users = $this->UsersModel->where('email', $email)->first();

            //Jika akun ada
            if ($users) {
                //Check akun aktif
                if ($users['active'] == 1) {
                    if (password_verify($password, $users['password'])) {
                        $data = [
                            'aid' => $users['id'],
                            'nama' => $users['name'],
                            'role' => $users['role'],
                            'panitia_logged_in' => true
                        ];
                        session()->set($data);
                        return redirect()->to('/panitia/home');
                    } else {
                        session()->setFlashdata('message', '<div class="alert alert-danger my-2" role="alert">3. Email atau password salah.</div>');
                        return redirect()->to('/panitia/login')->withInput();
                    }
                } else {
                    session()->setFlashdata('message', '<div class="alert alert-danger my-2" role="alert">2. Akun tidak aktif. Silahkan hubungi Admin Sistem!</div>');
                    return redirect()->to('/panitia/login')->withInput();
                }
            } else {
                session()->setFlashdata('message', '<div class="alert alert-danger my-2" role="alert">1. Email atau password salah.</div>');
                return redirect()->to('/panitia/login')->withInput();
            }
        }
    }
}
