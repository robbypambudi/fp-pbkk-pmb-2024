<?php
namespace App\Models;

use CodeIgniter\Model;

class SekolahProgramKeahlianModel extends Model
{
    protected $table = 'sekolah_program_keahlian';
    protected $allowedFields = ['bidang_keahlian', 'program_keahlian'];
}