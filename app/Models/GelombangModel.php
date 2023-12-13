<?php

namespace App\Models;

use CodeIgniter\Model;

class GelombangModel extends Model
{
    protected $table = 'gelombang';
    protected $allowedFields = ['kode', 'gelombang', 'mulai', 'selesai', 'tahun', 'deskripsi', 'jadwal'];
}
