<?php

namespace App\Models\Panitia;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['email', 'password', 'name', 'role', 'active'];
    //protected $useTimestamps = 'true';
}
