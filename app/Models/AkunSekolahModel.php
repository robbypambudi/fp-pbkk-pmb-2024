<?php

namespace App\Models;

use CodeIgniter\Model;

class AkunSekolahModel extends Model {
    protected $table = 'akun_sekolah';
    protected $allowedFields = ['akun', 'nisn', 'sekolah_nama', 'sekolah_alamat', 'sekolah_kecamatan', 'sekolah_kabupaten', 'sekolah_provinsi','sekolah_telp', 'sekolah_status', 'sekolah_jenis', 'sekolah_akreditasi', 'sekolah_bidang_keahlian', 'sekolah_program_keahlian', 'sekolah_kompetensi_keahlian', 'tahun_lulus_sekolah'];

}