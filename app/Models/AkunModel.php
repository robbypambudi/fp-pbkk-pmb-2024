<?php

namespace App\Models;

use CodeIgniter\Model;

class AkunModel extends Model
{
    protected $table = 'akun';
    protected $allowedFields = ['email', 'password', 'nama', 'nik', 'tmp_lahir', 'tgl_lahir', 'kelamin', 'agama', 'alamat', 'alamat_kecamatan', 'alamat_kabupaten', 'alamat_provinsi', 'kode_pos', 'iq', 'tinggi_badan', 'berat_badan', 'golongan_darah', 'riwayat_penyakit', 'telp', 'hp', 'baju_seragam', 'baju_olahraga', 'sepatu_sekolah', 'sepatu_olahraga', 'lingkar_kepala', 'photo', 'is_lock', 'active'];
    protected $useTimestamps = 'true';

    public function cari($keyword)
    {
        // $builder = $this->table('akun');
        // $builder->like('nama', $keyword);
        // return $builder;
        return $this->table('akun')->like('nama', $keyword)->orderBy('nama');
    }

    public function jumlah_aktif()
    {
        $builder = $this->table('akun');
        $builder->selectCount('id');
        $query = $builder->get($builder);
        return $query;
    }
}
