<?php

namespace App\Controllers;

use App\Models\AkunSekolahModel;
use App\Models\ProvinsiModel;
use App\Models\KabupatenModel;
use App\Models\KecamatanModel;
use App\Models\SekolahBidangKeahlianModel;
use App\Models\SekolahProgramKeahlianModel;
use App\Models\SekolahKompetensiKeahlianModel;
use CodeIgniter\HTTP\Request;

class Sekolah extends BaseController
{
    protected $AkunSekolahModel;
    protected $ProvinsiModel;
    protected $KabupatenModel;
    protected $KecamatanModel;
    protected $Bidang_keahlian;
    protected $Program_keahlian;
    protected $Kompetensi_keahlian;

    public function __construct()
    {
        $this->aid = session()->get('aid');
        $this->is_loged_in();
        $this->ProvinsiModel = new ProvinsiModel();
        $this->AkunSekolahModel = new AkunSekolahModel();
        $this->KabupatenModel = new KabupatenModel();
        $this->KecamatanModel = new KecamatanModel();
        $this->Bidang_keahlian = new SekolahBidangKeahlianModel();
        $this->Program_keahlian = new SekolahProgramKeahlianModel();
        $this->Kompetensi_keahlian = new SekolahKompetensiKeahlianModel();
    }

    public function index()
    {
        $akun_sekolah = $this->AkunSekolahModel->where('akun', $this->aid)->first();
        $provinsi = $this->ProvinsiModel->findAll();
        $kabkec = '';
        $dik = '';
        //Check apa sudah ada data sekolah
        if (isset($akun_sekolah)) {
            $db = db_connect();
            $q_kabkec = 'SELECT r.id as idkab, r.name as kab, d.id as idkec, d.name as kec FROM regencies r, districts d WHERE d.regency_id = r.id AND d.id = ' . $akun_sekolah['sekolah_kecamatan'] . '';
            $kabkec = $db->query($q_kabkec)->getRowArray();
            $q_dik = 'SELECT kk.id as idkk, kk.kompetensi_keahlian, pk.id as idpk, pk.program_keahlian, bk.id as idbk, bk.bidang_keahlian FROM sekolah_kompetensi_keahlian kk, sekolah_program_keahlian pk, sekolah_bidang_keahlian bk WHERE kk.program_keahlian = pk.id AND pk.bidang_keahlian = bk.id AND kk.id = ' . $akun_sekolah['sekolah_kompetensi_keahlian'] . '';
            $dik = $db->query($q_dik)->getRowArray();
            $db->close();
        }
        $data = [
            'title' => 'Sekolah Asal',
            'validation' => \Config\Services::validation(),
            'akun_sekolah' => $akun_sekolah,
            'provinsi' => $provinsi,
            'kabkec' => $kabkec,
            'dik' => $dik
        ];
        return view('user/sekolah', $data);
    }

    public function save()
    {
        $this->is_lock();
        $db = db_connect();
        $query = 'SELECT id FROM akun_nilai where akun = ' . $this->aid . '';
        $nilai = $db->query($query)->getRowArray();
        $db->close();
        if (isset($nilai)) {
            $akun_sekolah = $this->AkunSekolahModel->where('akun', $this->aid)->first();
            //Jika ganti Jenis Sekolah
            if ($akun_sekolah['sekolah_jenis'] != $this->request->getVar('sekolah_jenis')) {
                session()->setFlashdata('message', '<div class="alert alert-danger my-2" role="alert">Anda telah melakukan input data nilai maka tidak diperbolehkan melakukan perubahan data jenis sekolah, bidang, program dan kompetensi sekolah asal. Untuk melakukan perubahan silahkan hapus data nilai terlebih dahulu.</div>');
                return redirect()->to('/sekolah')->withInput();
            }
            //Jika ganti Bidang Keahlian
            if ($akun_sekolah['sekolah_bidang_keahlian'] != $this->request->getVar('bidang_keahlian')) {
                session()->setFlashdata('message', '<div class="alert alert-danger my-2" role="alert">Anda telah melakukan input data nilai maka tidak diperbolehkan melakukan perubahan data jenis sekolah, bidang, program dan kompetensi sekolah asal. Untuk melakukan perubahan silahkan hapus data nilai terlebih dahulu.</div>');
                return redirect()->to('/sekolah')->withInput();
            }
            //Jika ganti Program Keahlian
            if ($akun_sekolah['sekolah_program_keahlian'] != $this->request->getVar('program_keahlian')) {
                session()->setFlashdata('message', '<div class="alert alert-danger my-2" role="alert">Anda telah melakukan input data nilai maka tidak diperbolehkan melakukan perubahan data jenis sekolah, bidang, program dan kompetensi sekolah asal. Untuk melakukan perubahan silahkan hapus data nilai terlebih dahulu.</div>');
                return redirect()->to('/sekolah')->withInput();
            }
            //Jika ganti Kompetensi Keahlian
            if ($akun_sekolah['sekolah_kompetensi_keahlian'] != $this->request->getVar('kompetensi_keahlian')) {
                session()->setFlashdata('message', '<div class="alert alert-danger my-2" role="alert">Anda telah melakukan input data nilai maka tidak diperbolehkan melakukan perubahan data jenis sekolah, bidang, program dan kompetensi sekolah asal. Untuk melakukan perubahan silahkan hapus data nilai terlebih dahulu.</div>');
                return redirect()->to('/sekolah')->withInput();
            }
        }
        if (!$this->validate([
            'sekolah_nama' => 'required',
            'sekolah_alamat' => 'required',
            'sekolah_kecamatan' => 'required',
            'sekolah_kabupaten ' => 'required',
            'sekolah_provinsi' => 'required',
            'sekolah_telp' => 'required',
            'sekolah_status' => 'required',
            'sekolah_jenis' => 'required',
            'sekolah_akreditasi' => 'required',
            'tahun_lulus_sekolah' => 'required',
            'nisn' => 'required',
            'bidang_keahlian' => 'required',
            'program_keahlian' => 'required',
            'kompetensi_keahlian' => 'required',
        ])) {
            $validation = \Config\Services::validation();
            session()->setFlashdata('message', '<div class="alert alert-danger my-2" role="alert">Simpan data gagal, periksa kembali!</div>');
            return redirect()->to('/sekolah')->withInput()->with('validation', $validation);
        };
        $data_add = [
            'akun' => $this->aid,
            'sekolah_nama' => $this->request->getVar('sekolah_nama'),
            'sekolah_alamat' => $this->request->getVar('sekolah_alamat'),
            'sekolah_kecamatan' => $this->request->getVar('sekolah_kecamatan'),
            'sekolah_kabupaten' => $this->request->getVar('sekolah_kabupaten'),
            'sekolah_provinsi' => $this->request->getVar('sekolah_provinsi'),
            'sekolah_telp' => $this->request->getVar('sekolah_telp'),
            'sekolah_status' => $this->request->getVar('sekolah_status'),
            'sekolah_jenis' => $this->request->getVar('sekolah_jenis'),
            'sekolah_akreditasi' => $this->request->getVar('sekolah_akreditasi'),
            'tahun_lulus_sekolah' => $this->request->getVar('tahun_lulus_sekolah'),
            'nisn' => $this->request->getVar('nisn'),
            'sekolah_bidang_keahlian' => $this->request->getVar('bidang_keahlian'),
            'sekolah_program_keahlian' => $this->request->getVar('program_keahlian'),
            'sekolah_kompetensi_keahlian' => $this->request->getVar('kompetensi_keahlian'),

        ];
        //Check apa add atau update
        $sekolah = $this->AkunSekolahModel->where('akun', $this->aid)->first();
        if (isset($sekolah)) {
            //Jika update
            $data_update = array_merge(['id' => $sekolah['id']], $data_add);
            $this->AkunSekolahModel->save($data_update);
        } else {
            //Jika add
            $this->AkunSekolahModel->save($data_add);
        }

        session()->setFlashdata('message', '<div class="alert alert-success my-2" role="alert">Data sekolah berhasil ditambah/ubah.</div>');
        return redirect()->to('/sekolah');
    }
}
