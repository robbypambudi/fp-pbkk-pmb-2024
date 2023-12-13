<?php

namespace App\Models;

use CodeIgniter\Model;

class SekolahBidangKeahlianModel extends Model
{
    protected $table = 'sekolah_bidang_keahlian';
    protected $allowedFields = ['jenis_sekolah', 'bidang_keahlian'];
}
