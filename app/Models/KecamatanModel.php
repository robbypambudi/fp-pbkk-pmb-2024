<?php

namespace App\Models;

use CodeIgniter\Model;

class KecamatanModel extends Model
{
    protected $table = 'districts';
    protected $allowedFields = ['regency_id', 'name'];
}
