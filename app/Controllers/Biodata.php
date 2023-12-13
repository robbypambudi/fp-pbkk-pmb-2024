<?php

namespace App\Controllers;

use App\Models\AkunModel;
use App\Models\AgamaModel;
use App\Models\ProvinsiModel;
use App\Models\KabupatenModel;
use App\Models\KecamatanModel;
use App\Models\UkuranBajuModel;
use App\Models\UkuranSepatuModel;
use App\Models\UkuranKepalaModel;
use App\Models\PendidikanModel;

class Biodata extends BaseController
{
    protected $AkunModel;
    protected $AgamaModel;
    protected $ProvinsiModel;
    protected $KabupatenModel;
    protected $KecamatanModel;
    protected $UkuranBajuModel;
    protected $UkuranSepatuModel;
    protected $UkuranKepalaModel;
    protected $PendidikanModel;

    public function __construct()
    {
        $this->is_loged_in();
        $this->aid = session()->get('aid');
        $this->AkunModel = new AkunModel();
        $this->AgamaModel = new AgamaModel();
        $this->ProvinsiModel = new ProvinsiModel();
        $this->KabupatenModel = new KabupatenModel();
        $this->KecamatanModel = new KecamatanModel();
        $this->UkuranBajuModel = new UkuranBajuModel();
        $this->UkuranSepatuModel = new UkuranSepatuModel();
        $this->UkuranKepalaModel = new UkuranKepalaModel();
        $this->PendidikanModel = new PendidikanModel();
    }

    public function index()
    {
        $akun = $this->AkunModel->find($this->aid);
        $agama = $this->AgamaModel->findAll();
        $provinsi = $this->ProvinsiModel->findAll();
        $ukuranbaju = $this->UkuranBajuModel->findAll();
        $ukuransepatu = $this->UkuranSepatuModel->findAll();
        $ukurankepala = $this->UkuranKepalaModel->findAll();

        // Search data  in kabupaten where data equal to akun['alamat_kabupaten']
        if ($akun['alamat_kabupaten'] != null) {
            $kab = $this->KabupatenModel->where('id', $akun['alamat_kabupaten'])->findAll();
            $kabupaten = '<option selected value="' . $kab[0]['id'] . '">' . $kab[0]['name'] . '</option>';
        } else {
            $kabupaten = null;
        }
        if ($akun['alamat_kecamatan'] != null) {
            $kec = $this->KecamatanModel->where('id', $akun['alamat_kecamatan'])->findAll();
            $kecamatan = '<option selected value="' . $kec[0]['id'] . '">' . $kec[0]['name'] . '</option>';
        } else {
            $kecamatan = null;
        }

        $data = [
            'title' => 'Biodata',
            'validation' => \Config\Services::validation(),
            'akun' => $akun,
            'agama' => $agama,
            'provinsi' => $provinsi,
            'kabupaten' => $kabupaten,
            'kecamatan' => $kecamatan,
            'ukuranbaju' => $ukuranbaju,
            'ukuransepatu' => $ukuransepatu,
            'ukurankepala' => $ukurankepala
        ];
        return view('user/biodata', $data);
    }

    public function save()
    {
        $this->is_lock();
        $akun = $this->AkunModel->where('id', $this->aid)->first();
        //Check duluh nik nya sama atau bedah
        if ($akun['nik'] == $this->request->getVar('nik')) {
            $rule_nik = 'required';
        } else {
            $rule_nik = 'required';
            //$rule_nik = 'required|is_unique[akun.nik]';
        }
        //Validasi
        if (!$this->validate([
            'nama' => 'required',
            'nik' => $rule_nik,
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'alamat_provinsi' => 'required',
            'alamat_kabupaten' => 'required',
            'alamat_kecamatan' => 'required',
            'kode_pos' => 'required',
            'iq' => 'required',
            'tinggi_badan' => 'required',
            'berat_badan' => 'required',
            'golongan_darah' => 'required',
            'telp' => 'required',
            'hp' => 'required',
            'baju_seragam' => 'required',
            'baju_olahraga' => 'required',
            'sepatu_sekolah' => 'required',
            'sepatu_olahraga' => 'required',
            'lingkar_kepala' => 'required'
        ])) {
            $validation = \Config\Services::validation();
            session()->setFlashdata('message', '<div class="alert alert-danger my-2" role="alert">Simpan data gagal, periksa kembali field yang ada.</div>');
            return redirect()->to('/biodata')->withInput()->with('validation', $validation);
        }
        //Data yang akan dimasukkan
        $data_add = [
            'id' => $this->aid,
            'nama' => $this->request->getVar('nama'),
            'nik' => $this->request->getVar('nik'),
            'tmp_lahir' => $this->request->getVar('tmp_lahir'),
            'tgl_lahir' => $this->request->getVar('tgl_lahir'),
            'kelamin' => $this->request->getVar('kelamin'),
            'agama' => $this->request->getVar('agama'),
            'alamat' => $this->request->getVar('alamat'),
            'alamat_provinsi' => $this->request->getVar('alamat_provinsi'),
            'alamat_kabupaten' => $this->request->getVar('alamat_kabupaten'),
            'alamat_kecamatan' => $this->request->getVar('alamat_kecamatan'),
            'kode_pos' => $this->request->getVar('kode_pos'),
            'iq' => $this->request->getVar('iq'),
            'tinggi_badan' => $this->request->getVar('tinggi_badan'),
            'berat_badan' => $this->request->getVar('berat_badan'),
            'golongan_darah' => $this->request->getVar('golongan_darah'),
            'riwayat_penyakit' => $this->request->getVar('riwayat_penyakit'),
            'telp' => $this->request->getVar('telp'),
            'hp' => $this->request->getVar('hp'),
            'baju_seragam' => $this->request->getVar('baju_seragam'),
            'baju_olahraga' => $this->request->getVar('baju_olahraga'),
            'sepatu_sekolah' => $this->request->getVar('sepatu_sekolah'),
            'sepatu_olahraga' => $this->request->getVar('sepatu_olahraga'),
            'lingkar_kepala' => $this->request->getVar('lingkar_kepala')
        ];
        #Save Data to DB
        $this->AkunModel->save($data_add);

        session()->setFlashdata('message', '<div class="alert alert-success my-2" role="alert">Data berhasil disimpan.</div>');
        return redirect()->to('/biodata');
    }
}
