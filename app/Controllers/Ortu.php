<?php

namespace App\Controllers;

use App\Models\AkunOrtuModel;
use App\Models\PendidikanModel;
use App\Models\PekerjaanModel;
use App\Models\PenghasilanModel;
use App\Models\HubunganWaliModel;

class Ortu extends BaseController
{
    protected $id;
    protected $AkunOrtuModel;
    protected $PendidikanModel;
    protected $PekerjaanModel;
    protected $PenghasilanModel;
    protected $HubunganWaliModel;

    public function __construct()
    {
        $this->id = session()->get('aid');
        $this->is_loged_in();
        $this->AkunOrtuModel = new AkunOrtuModel();
        $this->PendidikanModel = new PendidikanModel();
        $this->PekerjaanModel = new PekerjaanModel();
        $this->PenghasilanModel = new PenghasilanModel();
        $this->HubunganWaliModel = new HubunganWaliModel();
    }

    public function index()
    {
        $ortu = $this->AkunOrtuModel->where('akun', $this->id)->first();
        $pendidikan = $this->PendidikanModel->findAll();
        $pekerjaan = $this->PekerjaanModel->findAll();
        $penghasilan = $this->PenghasilanModel->findAll();
        $hubunganwali = $this->HubunganWaliModel->findAll();
        $data = [
            'title' => 'Orang Tua',
            'validation' => \Config\Services::validation(),
            'akun' => $ortu,
            'pendidikan' => $pendidikan,
            'pekerjaan' => $pekerjaan,
            'penghasilan' => $penghasilan,
            'hubunganwali' => $hubunganwali
        ];
        return view('user/ortu', $data);
    }

    public function save()
    {
        $this->is_lock();
        //Validasi
        if (!$this->validate([
            'ayah_nik' => 'required',
            'ibu_nik' => 'required'
        ])) {
            $validation = \Config\Services::validation();
            session()->setFlashdata('message', '<div class="alert alert-danger my-2" role="alert">Simpan data gagal.</div>');
            return redirect()->to('/ortu')->withInput()->with('validation', $validation);
        }

        //Check apakah data sebelumnya sudah ada
        $ortu = $this->AkunOrtuModel->where('akun', $this->id)->first();
        if ($ortu) {
            $idortu = $ortu['id'];
        }
        $dataadd = [
            'akun' => $this->id,
            'ayah_nik' => $this->request->getVar('ayah_nik'),
            'ayah_nama' => $this->request->getVar('ayah_nama'),
            'ayah_tanggal_lahir' => $this->request->getVar('ayah_tanggal_lahir'),
            'ayah_pendidikan' => $this->request->getVar('ayah_pendidikan'),
            'ayah_pekerjaan' => $this->request->getVar('ayah_pekerjaan'),
            'ayah_jabatan' => $this->request->getVar('ayah_jabatan'),
            'ayah_penghasilan' => $this->request->getVar('ayah_penghasilan'),
            'ibu_nik' => $this->request->getVar('ibu_nik'),
            'ibu_nama' => $this->request->getVar('ibu_nama'),
            'ibu_tanggal_lahir' => $this->request->getVar('ibu_tanggal_lahir'),
            'ibu_pendidikan' => $this->request->getVar('ibu_pendidikan'),
            'ibu_pekerjaan' => $this->request->getVar('ibu_pekerjaan'),
            'ibu_jabatan' => $this->request->getVar('ibu_jabatan'),
            'ibu_penghasilan' => $this->request->getVar('ibu_penghasilan'),
            'telp_ortu' => $this->request->getVar('telp_ortu'),
            'wali_nama' => $this->request->getVar('wali_nama'),
            'wali_tanggal_lahir' => $this->request->getVar('wali_tanggal_lahir'),
            'wali_pendidikan' => $this->request->getVar('wali_pendidikan'),
            'wali_pekerjaan' => $this->request->getVar('wali_pekerjaan'),
            'wali_jabatan' => $this->request->getVar('wali_jabatan'),
            'wali_penghasilan' => $this->request->getVar('wali_penghasilan'),
            'hubungan_wali' => $this->request->getVar('hubungan_wali')
        ];
        if ($ortu) {
            $dataupdate = array_merge(['id' => $idortu], $dataadd);
        }

        if (isset($idortu)) {
            //Jika Update
            $this->AkunOrtuModel->save($dataupdate);
        } else {
            //Jika Add
            $this->AkunOrtuModel->save($dataadd);
        }

        session()->setFlashdata('message', '<div class="alert alert-success my-2" role="alert">Data orang tua/wali berhasil ditambah/ubah.</div>');
        return redirect()->to('/ortu');
    }
}
