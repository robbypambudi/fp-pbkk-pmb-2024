<?php

namespace App\Controllers;

use App\Models\AkunModel;
use App\Models\GelombangModel;
use App\Models\GelombangSyaratAdminModel;
use App\Models\AkunAdministrasiModel;

class Uploadadm extends BaseController
{
    protected $AkunModel;
    protected $GelombangModel;
    protected $GelombangSyaratAdminModel;
    protected $AkunAdministrasiModel;

    public function __construct()
    {
        $this->aid = session()->get('aid');
        $this->is_loged_in();
        $this->AkunModel = new AkunModel();
        $this->GelombangModel = new GelombangModel();
        $this->GelombangSyaratAdminModel = new GelombangSyaratAdminModel();
        $this->AkunAdministrasiModel = new AkunAdministrasiModel();
    }

    public function index()
    {
        //Check apakah ada gelombang PMB b
        $dateNow = (date('Y-m-d'));
        $condition = [
            'mulai <=' => $dateNow,
            'selesai >=' => $dateNow
        ];

        $gelombang = $this->GelombangModel->where($condition)->first();
        $syarat_administrasi = '';
        $file = '';
        if (isset($gelombang)) {
            $syarat_administrasi = $this->GelombangSyaratAdminModel->where('gelombang', $gelombang['id'])->findAll();
            $db = db_connect();
            $query =    'SELECT gsa.id, sa.syarat
                        FROM gelombang_syarat_administrasi gsa
                        INNER JOIN syarat_administrasi sa
                        ON gsa.syarat = sa.id AND gsa.gelombang = ' . $gelombang['id'] . '';

            $syarat_administrasi = $db->query($query)->getResultArray();
            // dd($syarat_administrasi);
            $db->close();
            //Check tambah baru atau hapus
            $file = $this->AkunAdministrasiModel->where('akun', $this->aid, 'gelombang', $gelombang['id'])->first();
            //dd($file);
        }

        $data = [
            'title' => 'Upload Administrasi',
            'aid' => $this->aid,
            'validation' => \Config\Services::validation(),
            'gelombang' => $gelombang,
            'syarat_administrasi' => $syarat_administrasi,
            'file' => $file
        ];

        return view('user/uploadadm', $data);
    }

    public function save()
    {
        $this->is_lock();
        //Validasi
        if (!$this->validate([
            'file' => [
                'rules' => 'uploaded[file]|max_size[file,1024]|is_image[file]|mime_in[file,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Pilih foto terlebih dahulu',
                    'max_size' => 'Ukuran foto terlalu besar',
                    'is_image' => 'Yang dipilih bukan gambar',
                    'mime_in' => 'Yang dipilih bukan gambar'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            // session()->setFlashdata('message', '<div class="alert alert-danger my-2" role="alert">Pilih foto terlebih dahulu.</div>');
            return redirect()->to('/uploadadm')->withInput();
        }
        //Ambil file dan data
        $jenisfile = $this->request->getVar('jenisfile');
        $file = $this->request->getFile('file');
        //Generate nama
        $namafile = $file->getRandomName();
        //Pindahkan ke folder
        $file->move('uploads/file/', $namafile);
        //Check gelombang saat ini
        $dateNow = (date('Y-m-d'));
        $condition = [
            'mulai <=' => $dateNow,
            'selesai >=' => $dateNow
        ];
        $gelombang = $this->GelombangModel->where($condition)->first();
        //Check tambah baru atau update
        $db = db_connect();
        $query = 'SELECT * FROM akun_administrasi WHERE akun = ' . $this->aid . ' AND gelombang = ' . $gelombang['id'] . ' AND jenis_administrasi = ' . $jenisfile . '';
        $old_file = $db->query($query)->getRowArray();
        $db->close();
        // $old_file = $this->AkunAdministrasiModel->where('akun', $this->aid, 'gelombang', $gelombang['id'], 'jenis_administrasi', $jenisfile)->find();
        //dd($old_file);

        $dataadd = [
            'akun' => $this->aid,
            'gelombang' => $gelombang['id'],
            'jenis_administrasi' => $jenisfile,
            'file' => $namafile
        ];

        if (!empty($old_file)) {
            //Hapus file lama
            unlink('uploads/file/' . $old_file['file']);
            $dataupdate = array_merge(['id' => $old_file['id']], $dataadd);
            //Save Data to DB
            $this->AkunAdministrasiModel->save($dataupdate);
        } else {
            //Save Data to DB
            $this->AkunAdministrasiModel->save($dataadd);
        }

        session()->setFlashdata('message', '<div class="alert alert-success my-2" role="alert">File berhasil disimpan.</div>');
        return redirect()->to('/uploadadm');
    }
}
