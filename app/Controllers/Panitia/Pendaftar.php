<?php

namespace App\Controllers\Panitia;

use App\Controllers\BaseController;

use App\Models\PendaftarModel;
use App\Models\ProvinsiModel;

class Pendaftar extends BaseController
{
    protected $PendaftarModel;
    protected $ProvinsiModel;

    public function __construct()
    {
        $this->is_loged_as_panitia();
        $this->PendaftarModel = new PendaftarModel();
        $this->ProvinsiModel = new ProvinsiModel();
        $pager = \Config\Services::pager();
    }

    public function index()
    {
        $CurrentPage = $this->request->getVar('page_pendaftar') ? $this->request->getVar('page_pendaftar') : 1;

        $data_provinsi = $this->ProvinsiModel->findAll();

        $nomor = $this->request->getVar('keyword');
        $provinsi = $this->request->getVar('provinsi_sekolah');

        if ($nomor) {
            // $pendaftar = $this->PendaftarModel->GetDataPendaftarByKeyword($nomor, $provinsi)->paginate(25);
            $this->db->select('*');
            $this->db->from('pendaftar');
            $this->db->join('akun', 'akun.id = pendaftar.akun');
            $this->db->join('akun_sekolah', 'akun_sekolah.akun = pendaftar.akun');
            $this->db->where('nomor', $nomor);
            $pendaftar = $this->db->get();
        } else {
            //$pendaftar = $this->PendaftarModel;
            $pendaftar = $this->PendaftarModel->GetDataPendaftar()->paginate(25, 'pendaftar');
        }

        $data = [
            'title' => 'Panitia - Pendaftar',
            'pendaftar' => $pendaftar,
            'pager' => $this->PendaftarModel->pager,
            'CurrentPage' => $CurrentPage,
            'data_provinsi' => $data_provinsi
        ];
        return view('panitia/pendaftar', $data);
    }

    // public function index()
    // {
    //     $CurrentPage = $this->request->getVar('page_pendaftar') ? $this->request->getVar('page_pendaftar') : 1;

    //     $data_provinsi = $this->ProvinsiModel->findAll();

    //     $nomor = $this->request->getVar('keyword');
    //     $provinsi = $this->request->getVar('provinsi_sekolah');

    //     if ($nomor) {
    //         // $pendaftar = $this->PendaftarModel->cari($keyword);
    //         $pendaftar = $this->PendaftarModel->GetDataPendaftarByKeyword($nomor, $provinsi);
    //         // $db = db_connect();
    //         // $query = "select * from akun a, pendaftar b, akun_sekolah c where a.id = b.akun and a.id = c.akun and b.nomor = '$nomor' and c.sekolah_provinsi = $provinsi";
    //         // dd($query);
    //         // $pendaftar = $db->query($query);
    //         // $db->close();
    //         // dd($pendaftar);
    //     } else {
    //         //$pendaftar = $this->PendaftarModel;
    //         $pendaftar = $this->PendaftarModel->GetDataPendaftar();
    //     }

    //     $data = [
    //         'title' => 'Panitia - Pendaftar',
    //         'pendaftar' => $pendaftar->paginate(25, 'pendaftar'),
    //         'pager' => $this->PendaftarModel->pager,
    //         'CurrentPage' => $CurrentPage,
    //         'data_provinsi' => $data_provinsi
    //     ];
    //     return view('panitia/pendaftar', $data);
    // }
}
