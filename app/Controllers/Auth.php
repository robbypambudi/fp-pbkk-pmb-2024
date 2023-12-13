<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function index()
    {
        return redirect()->to('/login');
    }

    public function logout()
    {
        session()->destroy();
        session()->setFlashdata('message', '<div class="alert alert-info my-2" role="alert">Anda telah berhasil log out.</div>');
        return redirect()->to('/');
    }

    public function resetpassword()
    {
    }
}
