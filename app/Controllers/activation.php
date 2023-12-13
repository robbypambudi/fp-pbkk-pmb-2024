<?php

namespace App\Controllers;

use App\Models\AkunModel;
use App\Models\TokenModel;

class Activation extends BaseController
{
    protected $AkunModel;
    protected $TokenModel;

    public function __construct()
    {
        $this->AkunModel = new AkunModel();
        $this->TokenModel = new TokenModel();
    }

    public function index()
    {
        $email = $this->request->getGet('email');
        $token = $this->request->getGet('token');

        $akun = $this->AkunModel->where('email', $email)->first();
        $id = $akun['id'];

        if ($akun) {
            $user_token = $this->TokenModel->where('token', $token)->first();

            if ($user_token) {
                //Set akun active
                $this->AkunModel->save([
                    'id' => $id,
                    'active' => 1
                ]);
                //Delete token
                $this->TokenModel->where('email', $email)->delete();
                session()->setFlashdata('message', '<div class="alert alert-info my-2" role="alert">Akun telah aktif. SIlahkan login dan lengkapi data diri dan persyaratan!</div>');
                return redirect()->to('/');
            } else {
                session()->setFlashdata('message', '<div class="alert alert-danger my-2" role="alert">Token salah. Aktivasi akun gagal.</div>');
                return redirect()->to('/');
            }
        } else {
            session()->setFlashdata('message', '<div class="alert alert-danger my-2" role="alert">Email salah. Aktivasi akun gagal.</div>');
            return redirect()->to('/');
        }
    }
}
