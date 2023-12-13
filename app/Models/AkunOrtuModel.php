<?php

namespace App\Models;

use CodeIgniter\Model;

class AkunOrtuModel extends Model
{
    protected $table = 'akun_orang_tua';
    protected $allowedFields = ['akun', 'ayah_nik', 'ayah_nama', 'ayah_tanggal_lahir', 'ayah_pendidikan', 'ayah_pekerjaan', 'ayah_jabatan', 'ayah_penghasilan', 'ibu_nik', 'ibu_nama', 'ibu_tanggal_lahir', 'ibu_pendidikan', 'ibu_pekerjaan', 'ibu_jabatan', 'ibu_penghasilan', 'telp_ortu', 'wali_nama', 'wali_tanggal_lahir', 'wali_pendidikan', 'wali_pekerjaan', 'wali_jabatan', 'wali_penghasilan', 'hubungan_wali'];
}
