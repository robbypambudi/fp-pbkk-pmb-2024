<?php

namespace App\Controllers;

use App\Models\AkunModel;
use App\Models\GelombangModel;
use App\Models\GelombangProdiModel;
use App\Models\AkunSekolahModel;
use App\Models\PendaftarModel;
use App\Models\AkunNilaiModel;

class Daftar extends BaseController
{
    protected $aid;
    protected $AkunModel;
    protected $GelombangModel;
    protected $GelombangProdiModel;
    protected $AkunSekolahModel;
    protected $PendaftarModel;
    protected $gelombang;
    protected $AkunNilaiModel;

    public function __construct()
    {
        $this->aid = session()->get('aid');
        $this->is_loged_in();
        $this->AkunModel = new AkunModel();
        $this->GelombangModel = new GelombangModel();
        $this->GelombangProdiModel = new GelombangProdiModel();
        $this->AkunSekolahModel = new AkunSekolahModel();
        $this->PendaftarModel = new PendaftarModel();
        $this->AkunNilaiModel = new AkunNilaiModel();

        //Check apakah ada gelombang PMB
        $dateNow = (date('Y-m-d'));
        $condition = [
            'mulai <=' => $dateNow,
            'selesai >=' => $dateNow
        ];
        $this->gelombang = $this->GelombangModel->where($condition)->findAll();
    }

    public function index()
    {

        $data = [
            'title' => 'Buat Pendaftaran',
            'gelombang' => $this->gelombang
        ];
        return view('user/daftar', $data);
    }

    public function proses()
    {
        $idgel = $this->request->getVar('idgel');
        $kodegel = $this->request->getVar('kodegel');
        $pilihan1 = $this->request->getVar('pilihan1');
        $pilihan2 = $this->request->getVar('pilihan2');
        //Check apakah sudah daftar
        $db = db_connect();
        $querydaftar = 'SELECT * FROM pendaftar WHERE akun = ' . $this->aid . ' AND gelombang = ' . $this->request->getVar('idgel') . '';
        $checkdaftar = $db->query($querydaftar)->getRowArray();
        $db->close();
        if (!empty($checkdaftar)) {
            session()->setFlashdata('message', '<div class="alert alert-danger my-2" role="alert">Pendaftaran gagal, anda sudah terdaftar di gelombang PMB saat ini.</div>');
            return redirect()->to('/daftar');
        }
        //Get Datadiri
        $akun = $this->AkunModel->where('id', $this->aid)->first();
        //Check datadiri
        if ($akun['tmp_lahir'] == null) {
            session()->setFlashdata('message', '<div class="alert alert-danger my-2" role="alert">Pendaftaran gagal, silahkan lengkapi data diri!</div>');
            return redirect()->to('/daftar');
        }
        //Check Pasfoto
        if ($akun['photo'] == 'default.png') {
            session()->setFlashdata('message', '<div class="alert alert-danger my-2" role="alert">Pendaftaran gagal, silahkan upload foto!</div>');
            return redirect()->to('/daftar');
        }
        //Check IQ
        // if ($akun['iq'] < 120) {
        //     session()->setFlashdata('message', '<div class="alert alert-danger my-2" role="alert">Pendaftaran gagal, Nilai IQ kurang dari 120!</div>');
        //     return redirect()->to('/daftar');
        // }
        //Check tinggi badan laki-laki
        // if ($akun['kelamin'] == 'L') {
        //     if ($akun['tinggi_badan'] < 160) {
        //         session()->setFlashdata('message', '<div class="alert alert-danger my-2" role="alert">Pendaftaran gagal, tinggi badan kurang dari 160 Cm!</div>');
        //         return redirect()->to('/daftar');
        //     }
        // }
        //Check tinggi badan perempuan
        // if ($akun['kelamin'] == 'P') {
        //     if ($akun['tinggi_badan'] < 155) {
        //         session()->setFlashdata('message', '<div class="alert alert-danger my-2" role="alert">Pendaftaran gagal, tinggi badan kurang dari 155 Cm!</div>');
        //         return redirect()->to('/daftar');
        //     }
        // }
        //Check Data Orang Tua
        $db = db_connect();
        $q_ortu = 'SELECT * FROM akun_orang_tua WHERE akun = ' . $this->aid . '';
        $ortu = $db->query($q_ortu)->getResultArray();
        $db->close();
        if (empty($ortu)) {
            session()->setFlashdata('message', '<div class="alert alert-danger my-2" role="alert">Pendaftaran gagal, silahkan masukkan data orang tua.</div>');
            return redirect()->to('/daftar');
        }
        //Get data sekolah
        $sekolah = $this->AkunSekolahModel->where('akun', $this->aid)->first();
        if (!isset($sekolah)) {
            session()->setFlashdata('message', '<div class="alert alert-danger my-2" role="alert">Pendaftaran gagal, silahkan masukkan data sekolah asal.</div>');
            return redirect()->to('/daftar');
        }
        //Check pilihan ke-1
        $db = db_connect();
        $query1 = 'SELECT * FROM kompotensi_allow_prodi WHERE prodi = ' . $pilihan1 . ' AND kompetensi = ' . $sekolah['sekolah_kompetensi_keahlian'] . '';
        $check1 = $db->query($query1)->getResultArray();
        if (empty($check1)) {
            session()->setFlashdata('message', '<div class="alert alert-danger my-2" role="alert">Pendaftaran gagal, jurusan sekolah tidak diperbolehkan untuk memilih pilihan ke-1!</div>');
            return redirect()->to('/daftar');
        }
        //Check pilihan ke-2
        $query2 = 'SELECT * FROM kompotensi_allow_prodi WHERE prodi = ' . $pilihan2 . ' AND kompetensi = ' . $sekolah['sekolah_kompetensi_keahlian'] . '';
        $check2 = $db->query($query2)->getResultArray();
        $db->close();
        if (empty($check2)) {
            session()->setFlashdata('message', '<div class="alert alert-danger my-2" role="alert">Pendaftaran gagal, jurusan sekolah tidak diperbolehkan untuk memilih pilihan ke-2!</div>');
            return redirect()->to('/daftar');
        }
        //Get Nilai
        //Check Nilai Rata-rata
        $db = db_connect();
        $q_nilai = 'SELECT * FROM akun_nilai WHERE akun = ' . $this->aid . '';
        $nilai = $db->query($q_nilai)->getResultArray();
        $db->close();
        //Check apa nilai ada?
        if (!isset($nilai)) {
            session()->setFlashdata('message', '<div class="alert alert-danger my-2" role="alert">Pendaftaran gagal, silahkan upload data nilai.</div>');
            return redirect()->to('/daftar');
        }
        //Check apa nilai sudah semuah semester I s.d V
        $row = count($nilai);
        if ($row < 5) {
            session()->setFlashdata('message', '<div class="alert alert-danger my-2" role="alert">Pendaftaran gagal, silahkan upload data semua nilai semester I s.d V</div>');
            return redirect()->to('/daftar');
        }
        //Check nilai rata-rata rapor semester
        foreach ($nilai as $n) {
            if ($n['rata_semester'] < 80) {
                session()->setFlashdata('message', '<div class="alert alert-danger my-2" role="alert">Pendaftaran gagal, terdapat nilai rata-rata rapor semester kurang dari 80.</div>');
                return redirect()->to('/daftar');
                exit;
            }
        }
        //Check nilai semester V
        $db = db_connect();
        $q_nilai_v = 'SELECT * FROM akun_nilai WHERE akun = ' . $this->aid . ' AND semester = 5';
        $nilai_v = $db->query($q_nilai_v)->getRowArray();
        $db->close();
        //Jika Kedokteran
        if ($pilihan1 == 1 || $pilihan2 == 1) {
            if (($nilai_v['biologi_p'] < 90) || ($nilai_v['matematika_p'] < 90)) {
                session()->setFlashdata('message', '<div class="alert alert-danger my-2" role="alert">D1. Pendaftaran gagal, nilai semester V Biologi atau matematika < 90.</div>');
                return redirect()->to('/daftar');
            }
        }
        //Jika Farmasi
        if ($pilihan1 == 2 || $pilihan2 == 2) {
            if ($sekolah['sekolah_jenis'] == 1) {
                if ($nilai_v['biologi_p'] < 90 || $nilai_v['matematika_p'] < 90 || $nilai_v['kimia_p'] < 90) {
                    session()->setFlashdata('message', '<div class="alert alert-danger my-2" role="alert">D2. Pendaftaran gagal, nilai semester V Biologi atau Matematika atau Kimia < 90.</div>');
                    return redirect()->to('/daftar');
                }
            } else {
                if ($nilai_v['matematika_p'] < 90 || $nilai_v['keahlian_p'] < 90) {
                    session()->setFlashdata('message', '<div class="alert alert-danger my-2" role="alert">D3. Pendaftaran gagal, nilai semester V Matematika atau P.Keahlian < 90.</div>');
                    return redirect()->to('/daftar');
                }
            }
        }
        //Jika Matematika atau Fisika
        if ($pilihan1 == 4 || $pilihan2 == 4 || $pilihan1 == 6 || $pilihan2 == 6) {
            if ($nilai_v['fisika_p'] < 90 || $nilai_v['matematika_p'] < 90) {
                session()->setFlashdata('message', '<div class="alert alert-danger my-2" role="alert">D4. Pendaftaran gagal, nilai semester V Fisika atau Matematika < 90.</div>');
                return redirect()->to('/daftar');
            }
        }
        //Jika Kimia
        if ($pilihan1 == 5 || $pilihan2 == 5) {
            if ($nilai_v['kimia_p'] < 90 || $nilai_v['matematika_p'] < 90) {
                session()->setFlashdata('message', '<div class="alert alert-danger my-2" role="alert">D5. Pendaftaran gagal, nilai semester V Kimia atau Matematika < 90.</div>');
                return redirect()->to('/daftar');
            }
        }
        //Jika Biologi
        if ($pilihan1 == 3 || $pilihan2 == 3) {
            if ($nilai_v['biologi_p'] < 90 || $nilai_v['matematika_p'] < 90) {
                session()->setFlashdata('message', '<div class="alert alert-danger my-2" role="alert">D6. Pendaftaran gagal, nilai semester V Biologi atau Matematika < 90.</div>');
                return redirect()->to('/daftar');
            }
        }
        //Jika Teknik
        if (($pilihan1 == 7 || $pilihan2 == 7 || $pilihan1 == 8 || $pilihan2 == 8 || $pilihan1 == 9 || $pilihan2 == 9 || $pilihan1 == 10 || $pilihan2 == 10)) {
            if ($sekolah['sekolah_jenis'] == 1) {
                if ($nilai_v['fisika_p'] < 90 || $nilai_v['matematika_p'] < 90) {
                    session()->setFlashdata('message', '<div class="alert alert-danger my-2" role="alert">D7. Pendaftaran gagal, nilai semester V Fisika atau Matematika < 90.</div>');
                    return redirect()->to('/daftar');
                }
            } else {
                if ($nilai_v['matematika_p'] < 90 || $nilai_v['keahlian_p'] < 90) {
                    session()->setFlashdata('message', '<div class="alert alert-danger my-2" role="alert">D8. Pendaftaran gagal, nilai semester V  Matematika atau P.Keahlian < 90.</div>');
                    return redirect()->to('/daftar');
                }
            }
        }
        //Daftar
        $db = db_connect();
        $querynomor = 'SELECT * FROM pendaftar WHERE gelombang = ' . $this->request->getVar('idgel') . ' ORDER BY nomor DESC LIMIT 1';
        $datanomor = $db->query($querynomor)->getRowArray();
        $db->close();

        $tahun = (date('y'));

        if (empty($datanomor)) {
            $midno = '0000';
            $nomorfix = '1';
        } else {
            $nomorsebelumnya = substr($datanomor['nomor'], 3, 7);
            $nomor_int = (int)$nomorsebelumnya;
            $panjang = strlen($nomor_int);
            if ($panjang == 1) {
                $midno = '0000';
                if ($nomor_int == 9) {
                    $midno = '000';
                }
            } elseif ($panjang == 2) {
                $midno = '000';
                if ($nomor_int == 99) {
                    $midno = '00';
                }
            } elseif ($panjang == 3) {
                $midno = '00';
                if ($nomor_int == 999) {
                    $midno = '0';
                }
            } elseif ($panjang == 4) {
                $midno = '0';
                if ($nomor_int == 9999) {
                    $midno = '';
                }
            } else {
                $midno = '';
            }
            $nomorfix = $nomor_int + 1;
        }

        $nomordaftar = $tahun . $kodegel . $midno . $nomorfix;

        $datadaftar = [
            'akun' => $this->aid,
            'gelombang' => $idgel,
            'nomor' => $nomordaftar,
            'prodi1' => $pilihan1,
            'prodi2' => $pilihan2,
            'status' => 1
        ];

        $this->PendaftarModel->save($datadaftar);
        $dataupdate = [
            'is_lock' => 1
        ];
        $this->AkunModel->update($this->aid, $dataupdate);
        session()->setFlashdata('message', '<div class="alert alert-success my-2" role="alert">Pendaftaran berhasil</div>');
        return redirect()->to('/daftar');
        // try {
        // } catch (\Throwable $th) {
        //     session()->setFlashdata('message', '<div class="alert alert-danger my-2" role="alert">Pendaftaran gagal, silahkan ulangi buat pendaftaran!</div>');
        //     return redirect()->to('/daftar');
        // }
    }
}
