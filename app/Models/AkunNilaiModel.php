<?php

namespace App\Models;

use CodeIgniter\Model;

class AkunNilaiModel extends Model
{
    protected $table = 'akun_nilai';
    protected $allowedFields = ['akun', 'semester', 'rata_semester', 'matematika_p', 'matematika_k', 'biologi_p', 'biologi_k', 'fisika_p', 'fisika_k', 'kimia_p', 'kimia_k', 'inggris_p', 'inggris_k', 'indonesia_p', 'indonesia_k', 'keahlian_p', 'keahlian_k', 'ekonomi_p', 'ekonomi_k', 'geografi_p', 'geografi_k', 'b_asing_p', 'b_asing_k', 'file'];
}
