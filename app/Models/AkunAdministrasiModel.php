<?php

namespace App\Models;

use CodeIgniter\Model;

class AkunAdministrasiModel extends Model
{
    protected $table = 'akun_administrasi';
    protected $allowedFields = ['akun', 'gelombang', 'jenis_administrasi', 'file'];
}
