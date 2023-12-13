<?php

namespace App\Models;

use CodeIgniter\Model;

class GelombangSyaratAdminModel extends Model
{
    protected $table = 'gelombang_syarat_administrasi';
    protected $allowedFields = ['gelombang', 'syarat'];
}
