<?php

namespace App\Controllers;

use App\Models\AkunModel;

class Pasfoto extends BaseController
{
    protected $id;
    protected $AkunModel;

    public function __construct()
    {
        $this->id = session()->get('aid');
        $this->is_loged_in();
        $this->AkunModel = new AkunModel();
    }

    public function index()
    {
        $akun = $this->AkunModel->where('id', $this->id)->first();
        $data = [
            'title' => 'Pas Foto',
            'validation' => \Config\Services::validation(),
            'akun' => $akun
        ];
        return view('user/pasfoto', $data);
    }

    public function upload()
    {
        $this->is_lock();
        //Validasi
        if (!$this->validate([
            'photo' => [
                'rules' => 'uploaded[photo]|max_size[photo,512]|is_image[photo]|mime_in[photo,image/jpg,image/jpeg,image/png]',
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
            return redirect()->to('/pasfoto')->withInput();
        }
        //Ambil foto
        $photo = $this->request->getFile('photo');
        //Generate nama
        $namaphoto = $photo->getRandomName();
        //Pindahkan ke folder
        $photo->move('uploads/img/', $namaphoto);
        //Hapus foto yg lama
        $akun = $this->AkunModel->find($this->id);
        if ($akun['photo'] != 'default.png') {
            unlink('uploads/img/' . $akun['photo']);
        }
        //Save Data to DB
        $this->AkunModel->save([
            'id' => $this->id,
            'photo' => $namaphoto
        ]);

        session()->setFlashdata('message', '<div class="alert alert-success my-2" role="alert">Pasfoto berhasil disimpan.</div>');
        return redirect()->to('/pasfoto');
    }
}
