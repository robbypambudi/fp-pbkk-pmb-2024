<?php

namespace App\Models;

use CodeIgniter\Model;

class GelombangProdiModel extends Model
{
    protected $table = 'gelombang_prodi';
    protected $allowedFields = ['gelombang', 'prodi', 'deskripsi'];
}
