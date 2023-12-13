<?php

namespace App\Controllers;

use App\Models\PendaftarModel;
use App\Models\AkunModel;
use App\Models\AkunSekolahModel;
use App\Models\SekolahKompetensiKeahlianModel;

class Beranda extends BaseController
{
    protected $PendaftarModel;
    protected $AkunModel;
    protected $AkunSekolahModel;
    protected $SekolahKompetensiKeahlianModel;

    public function __construct()
    {
        $this->is_loged_in();
        $this->aid = session()->get('aid');
        $this->PendaftarModel = new PendaftarModel();
        $this->AkunModel = new AkunModel();
        $this->AkunSekolahModel = new AkunSekolahModel();
        $this->SekolahKompetensiKeahlianModel = new SekolahKompetensiKeahlianModel();
    }
    public function index()
    {
        $akun = $this->AkunModel->where('id', $this->aid)->first();
        $riwayat_daftar = $this->PendaftarModel->where('akun', $this->aid)->findAll();
        $sekolah = $this->AkunSekolahModel->where('akun', $this->aid)->first();
        $kompetensi = '';
        if (isset($sekolah)) {
            $kompetensi = $this->SekolahKompetensiKeahlianModel->where('id', $sekolah['sekolah_kompetensi_keahlian'])->first();
        }
        $data = [
            'title' => 'Beranda',
            'akun' => $akun,
            'riwayat_daftar' => $riwayat_daftar,
            'sekolah' => $sekolah,
            'kompetensi' => $kompetensi
        ];
        return view('user/beranda', $data);
    }
}
