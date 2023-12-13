<?php

namespace App\Models;

use CodeIgniter\Model;

class TokenModel extends Model
{
    protected $table = 'token';
    protected $allowedFields = ['email', 'token'];
    protected $useTimestamps = 'true';
}
