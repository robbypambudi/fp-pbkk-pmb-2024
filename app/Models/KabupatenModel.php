<?php

namespace App\Models;

use CodeIgniter\Model;

class KabupatenModel extends Model
{
    protected $table = 'regencies';
    protected $allowedFields = ['province_id', 'name'];
}
