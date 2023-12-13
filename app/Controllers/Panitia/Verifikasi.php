<?php

namespace App\Controllers\Panitia;

use App\Controllers\BaseController;

use App\Models\PendaftarModel;
use App\Models\AkunModel;
use App\Models\AkunSekolahModel;
use App\Models\AkunNilaiModel;

class Verifikasi extends BaseController
{
    protected $PendaftarModel;
    protected $AkunModel;
    protected $AkunSekolahModel;
    protected $AkunNilaiModel;

    public function __construct()
    {
        $this->is_loged_as_panitia();
        $this->PendaftarModel = new PendaftarModel();
        $this->AkunModel = new AkunModel();
        $this->AkunSekolahModel = new AkunSekolahModel();
        $this->AkunNilaiModel = new AkunNilaiModel();
    }

    public function index()
    {
        $nomor = $this->request->getVar('nomor');
        $pendaftar = $this->PendaftarModel->where('nomor', $nomor)->first();
        $akun = $this->AkunModel->where('id', $pendaftar['akun'])->first();
        $sekolah = $this->AkunSekolahModel->where('akun', $pendaftar['akun'])->first();
        $nilai = $this->AkunNilaiModel->where('akun', $pendaftar['akun'])->findAll();

        $data = [
            'title' => 'Panitia - Verifikasi',
            'pendaftar' => $pendaftar,
            'akun' => $akun,
            'sekolah' => $sekolah,
            'nilai' => $nilai
        ];
        return view('panitia/verifikasi', $data);
    }

    public function proses()
    {
    }
}
