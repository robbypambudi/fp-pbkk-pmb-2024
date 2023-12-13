<?php

namespace App\Models;

use CodeIgniter\Model;

class SekolahKompetensiKeahlianModel extends Model
{
    protected $table = 'sekolah_kompetensi_keahlian';
    protected $allowedFields = ['program_keahlian', 'kompetensi_keahlian'];
}
