<?php

namespace App\Controllers;

use App\Models\AkunSekolahModel;
use App\Models\AkunNilaiModel;

class Nilai extends BaseController
{

    protected $AkunSekolahModel;
    protected $AkunNilaiModel;

    public function __construct()
    {
        $this->aid = session()->get('aid');
        $this->is_loged_in();
        $this->AkunSekolahModel = new AkunSekolahModel();
        $this->AkunNilaiModel = new AkunNilaiModel();
    }

    public function index()
    {
        $nilai = $this->AkunNilaiModel->where('akun', $this->aid)->orderBy('semester', 'asc')->findAll();
        $sekolah = $this->AkunSekolahModel->where('akun', $this->aid)->first();
        if (!$sekolah) {
            session()->setFlashdata('message', '<div class="alert alert-danger my-2" role="alert">Silahkan masukkan data sekolah terlebih dahulu</div>');
            return redirect()->to('/sekolah');
        }

        $kompetensi = $sekolah['sekolah_kompetensi_keahlian'];

        $data = [
            'validation' => \Config\Services::validation(),
            'title' => 'Sekolah Asal',
            'nilai' => $nilai,
            'sekolah' => $sekolah,
            'kompetensi' => $kompetensi
        ];
        return view('user/nilai', $data);
    }

    public function save()
    {
        $this->is_lock();
        $sekolah = $this->AkunSekolahModel->where('akun', $this->aid)->first();
        //SMA
        if ($sekolah['sekolah_jenis'] == 1) {
            //SMA IPA
            if ($sekolah['sekolah_bidang_keahlian'] == 1) {
                //Validasi
                if (!$this->validate([
                    'file' => [
                        'rules' => 'uploaded[file]|max_size[file,1024]|ext_in[file,pdf,jpg,jpeg,png]',
                        'errors' => [
                            'uploaded' => 'Pilih foto terlebih dahulu',
                            'max_size' => 'Ukuran foto terlalu besar'
                        ]
                    ]
                ])) {
                    return redirect()->to('/nilai')->withInput();
                }

                $semester = $this->request->getVar('semester');
                $rata_semester = $this->request->getVar('rata_semester');
                $matematika_p = $this->request->getVar('matematika_p');
                $matematika_k = $this->request->getVar('matematika_k');
                $biologi_p = $this->request->getVar('biologi_p');
                $biologi_k = $this->request->getVar('biologi_k');
                $fisika_p = $this->request->getVar('fisika_p');
                $fisika_k = $this->request->getVar('fisika_k');
                $kimia_p = $this->request->getVar('kimia_p');
                $kimia_k = $this->request->getVar('kimia_k');

                $file = $this->request->getFile('file');
                $namafile = $file->getRandomName();

                $file->move('uploads/rapor/', $namafile);

                $dataadd = [
                    'akun' => $this->aid,
                    'semester' => $semester,
                    'rata_semester' => $rata_semester,
                    'matematika_p' => $matematika_p,
                    'matematika_k' => $matematika_k,
                    'biologi_p' => $biologi_p,
                    'biologi_k' => $biologi_k,
                    'fisika_p' => $fisika_p,
                    'fisika_k' => $fisika_k,
                    'kimia_p' => $kimia_p,
                    'kimia_k' => $kimia_k,
                    'file' => $namafile
                ];
                try {
                    $this->AkunNilaiModel->save($dataadd);
                } catch (\Throwable $th) {
                    session()->setFlashdata('message', '<div class="alert alert-danger my-2" role="alert">Data nilai gagal disimpan, silahkan ulangi kembali</div>');
                    return redirect()->to('nilai');
                }
                session()->setFlashdata('message', '<div class="alert alert-success my-2" role="alert">Data nilai berhasil disimpan.</div>');
                return redirect()->to('nilai');
            } elseif ($sekolah['sekolah_bidang_keahlian'] == 2) {
                //SMA IPS
                //Validasi
                if (!$this->validate([
                    'file' => [
                        'rules' => 'uploaded[file]|max_size[file,1024]|ext_in[file,pdf,jpg,jpeg,png]',
                        'errors' => [
                            'uploaded' => 'Pilih foto terlebih dahulu',
                            'max_size' => 'Ukuran foto terlalu besar'
                        ]
                    ]
                ])) {
                    return redirect()->to('/nilai')->withInput();
                }

                $semester = $this->request->getVar('semester');
                $rata_semester = $this->request->getVar('rata_semester');
                $matematika_p = $this->request->getVar('matematika_p');
                $matematika_k = $this->request->getVar('matematika_k');
                $inggris_p = $this->request->getVar('inggris_p');
                $inggris_k = $this->request->getVar('inggris_k');
                $ekonomi_p = $this->request->getVar('ekonomi_p');
                $ekonomi_k = $this->request->getVar('ekonomi_k');
                $geografi_p = $this->request->getVar('geografi_p');
                $geografi_k = $this->request->getVar('geografi_k');

                $file = $this->request->getFile('file');
                $namafile = $file->getRandomName();

                $file->move('uploads/rapor/', $namafile);

                $dataadd = [
                    'akun' => $this->aid,
                    'semester' => $semester,
                    'rata_semester' => $rata_semester,
                    'matematika_p' => $matematika_p,
                    'matematika_k' => $matematika_k,
                    'inggris_p' => $inggris_p,
                    'inggris_k' => $inggris_k,
                    'ekonomi_p' => $ekonomi_p,
                    'ekonomi_k' => $ekonomi_k,
                    'geografi_p' => $geografi_p,
                    'geografi_k' => $geografi_k,
                    'file' => $namafile
                ];
                try {
                    $this->AkunNilaiModel->save($dataadd);
                } catch (\Throwable $th) {
                    session()->setFlashdata('message', '<div class="alert alert-danger my-2" role="alert">Data nilai gagal disimpan, silahkan ulangi kembali</div>');
                    return redirect()->to('nilai');
                }
                session()->setFlashdata('message', '<div class="alert alert-success my-2" role="alert">Data nilai berhasil disimpan.</div>');
                return redirect()->to('nilai');
            } else {
                //SMA Bahasa
                //Validasi
                if (!$this->validate([
                    'file' => [
                        'rules' => 'uploaded[file]|max_size[file,1024]|ext_in[file,pdf,jpg,jpeg,png]',
                        'errors' => [
                            'uploaded' => 'Pilih foto terlebih dahulu',
                            'max_size' => 'Ukuran foto terlalu besar'
                        ]
                    ]
                ])) {
                    return redirect()->to('/nilai')->withInput();
                }

                $semester = $this->request->getVar('semester');
                $rata_semester = $this->request->getVar('rata_semester');
                $matematika_p = $this->request->getVar('matematika_p');
                $matematika_k = $this->request->getVar('matematika_k');
                $inggris_p = $this->request->getVar('inggris_p');
                $inggris_k = $this->request->getVar('inggris_k');
                $indonesia_p = $this->request->getVar('indonesia_p');
                $indonesia_k = $this->request->getVar('indonesia_k');
                $b_asing_p = $this->request->getVar('b_asing_p');
                $b_asing_k = $this->request->getVar('b_asing_k');

                $file = $this->request->getFile('file');
                $namafile = $file->getRandomName();

                $file->move('uploads/rapor/', $namafile);

                $dataadd = [
                    'akun' => $this->aid,
                    'semester' => $semester,
                    'rata_semester' => $rata_semester,
                    'matematika_p' => $matematika_p,
                    'matematika_k' => $matematika_k,
                    'inggris_p' => $inggris_p,
                    'inggris_k' => $inggris_k,
                    'indonesia_p' => $indonesia_p,
                    'indonesia_k' => $indonesia_k,
                    'b_asing_p' => $b_asing_p,
                    'b_asing_k' => $b_asing_k,
                    'file' => $namafile
                ];
                try {
                    $this->AkunNilaiModel->save($dataadd);
                } catch (\Throwable $th) {
                    session()->setFlashdata('message', '<div class="alert alert-danger my-2" role="alert">Data nilai gagal disimpan, silahkan ulangi kembali</div>');
                    return redirect()->to('nilai');
                }
                session()->setFlashdata('message', '<div class="alert alert-success my-2" role="alert">Data nilai berhasil disimpan.</div>');
                return redirect()->to('nilai');
            }
        } else {
            //SMK
            //Validasi
            if (!$this->validate([
                'file' => [
                    'rules' => 'uploaded[file]|max_size[file,1024]|ext_in[file,pdf,jpg,jpeg,png]',
                    'errors' => [
                        'uploaded' => 'Pilih foto terlebih dahulu',
                        'max_size' => 'Ukuran foto terlalu besar'
                    ]
                ]
            ])) {
                return redirect()->to('/nilai')->withInput();
            }

            $semester = $this->request->getVar('semester');
            $rata_semester = $this->request->getVar('rata_semester');
            $matematika_p = $this->request->getVar('matematika_p');
            $matematika_k = $this->request->getVar('matematika_k');
            $inggris_p = $this->request->getVar('inggris_p');
            $inggris_k = $this->request->getVar('inggris_k');
            $indonesia_p = $this->request->getVar('indonesia_p');
            $indonesia_k = $this->request->getVar('indonesia_k');
            $keahlian_p = $this->request->getVar('keahlian_p');
            $keahlian_k = $this->request->getVar('keahlian_k');

            $file = $this->request->getFile('file');
            $namafile = $file->getRandomName();

            $file->move('uploads/rapor/', $namafile);

            $dataadd = [
                'akun' => $this->aid,
                'semester' => $semester,
                'rata_semester' => $rata_semester,
                'matematika_p' => $matematika_p,
                'matematika_k' => $matematika_k,
                'inggris_p' => $inggris_p,
                'inggris_k' => $inggris_k,
                'indonesia_p' => $indonesia_p,
                'indonesia_k' => $indonesia_k,
                'keahlian_p' => $keahlian_p,
                'keahlian_k' => $keahlian_k,
                'file' => $namafile
            ];

            try {
                $this->AkunNilaiModel->save($dataadd);
            } catch (\Throwable $th) {
                session()->setFlashdata('message', '<div class="alert alert-danger my-2" role="alert">Data nilai gagal disimpan, silahkan ulangi kembali</div>');
                return redirect()->to('nilai');
            }
            session()->setFlashdata('message', '<div class="alert alert-success my-2" role="alert">Data nilai berhasil disimpan.</div>');
            return redirect()->to('nilai');
        }
    }

    public function delete($id)
    {
        $this->is_lock();
        $file = $this->AkunNilaiModel->where('id', $id)->first();
        $delfile = $file['file'];
        unlink('uploads/rapor/' . $delfile);

        $this->AkunNilaiModel->delete($id);
        return redirect()->to('/nilai');
    }
}
