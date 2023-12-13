<?php

namespace App\Controllers\Panitia;

use App\Controllers\BaseController;

use App\Models\AkunModel;

class Akun extends BaseController
{
    protected $AkunModel;

    public function __construct()
    {
        $this->is_loged_as_panitia();
        $this->AkunModel = new AkunModel();
        $pager = \Config\Services::pager();
    }

    public function index()
    {
        $CurrentPage = $this->request->getVar('page_akun') ? $this->request->getVar('page_akun') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $akun = $this->AkunModel->cari($keyword);
        } else {
            $akun = $this->AkunModel;
        }

        $data = [
            'title' => 'Beranda',
            'akun' => $akun->paginate(25, 'akun'),
            'pager' => $this->AkunModel->pager,
            'CurrentPage' => $CurrentPage
        ];
        return view('panitia/akun', $data);
    }
}
