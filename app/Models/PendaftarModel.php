<?php

namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Model;

class PendaftarModel extends Model
{
    protected $table = 'pendaftar';
    protected $allowedFields = ['akun', 'gelombang', 'nomor', 'prodi1', 'prodi2', 'status'];
    protected $useTimestamps = 'true';

    public function cari($nomor)
    {
        return $this->table('pendaftar')->where('nomor', $nomor)->get;
    }

    public function GetDataPendaftar()
    {
        $query = $this->table('pendaftar')->join('akun', 'akun.id = pendaftar.akun');
        return $query;
    }

    public function GetDataPendaftarByKeyword($nomor, $provinsi)
    {
        $where = [
            'nomor' => $nomor,
            'akun_sekolah.sekolah_provinsi' => $provinsi
        ];
        $query = $this->table('pendaftar')
            ->join('akun', 'akun.id = pendaftar.akun')
            // ->join('akun_sekolah', 'akun_sekolah.akun = pendaftar.akun')
            ->where($where);
        // ->where('pendaftar.nomor', $nomor);
        // ->where('akun_sekolah.sekolah_provinsi', $provinsi);
        // ->where($where);
        return $query;
    }

    public function ExcelPendaftar()
    {
        return $this->select('*')->from('pendaftar')->join('akun', 'akun.id = pendaftar.akun')->get;
    }
}
