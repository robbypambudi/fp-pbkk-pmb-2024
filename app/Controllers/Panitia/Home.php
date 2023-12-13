<?php

namespace App\Controllers\Panitia;

use App\Controllers\BaseController;

use App\Models\AkunModel;

class Home extends BaseController
{
    protected $AkunModel;

    public function __construct()
    {
        $this->is_loged_as_panitia();
        $this->AkunModel = new AkunModel();
    }

    public function index()
    {
        $db = db_connect();
        $akun = $db->query('select id from akun')->getNumRows();
        $aktif = $db->query('select id from akun where active = 1')->getNumRows();
        $jumlah_pendaftar = $db->query('select * from pendaftar where gelombang = 2')->getNumRows();
        $data_prodi = $db->query('SELECT ps.id, ps.program_studi FROM gelombang_prodi gp, program_studi ps WHERE gp.prodi = ps.id AND gp.gelombang = 2 ORDER by ps.id')->getResultArray();
        $provinsi = $db->query('SELECT * FROM provinces ORDER by id')->getResultArray();
        $db->close();
        $data = [
            'title' => 'Beranda',
            'akun' => $akun,
            'aktif' => $aktif,
            'jumlah_pendaftar' => $jumlah_pendaftar,
            'data_prodi' => $data_prodi,
            'provinsi' => $provinsi
        ];
        return view('panitia/home', $data);
    }
}
