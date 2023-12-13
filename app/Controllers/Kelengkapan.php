<?php

namespace App\Controllers;

use App\Models\AkunModel;
use App\Models\AgamaModel;
use App\Models\ProvinsiModel;
use App\Models\UkuranBajuModel;
use App\Models\UkuranSepatuModel;
use App\Models\UkuranKepalaModel;
use App\Models\PendidikanModel;

class User extends BaseController
{
    protected $AkunModel;
    protected $AgamaModel;
    protected $ProvinsiModel;
    protected $UkuranBajuModel;
    protected $UkuranSepatuModel;
    protected $UkuranKepalaModel;
    protected $PendidikanModel;

    public function __construct()
    {
        $this->is_loged_in();
        $this->AkunModel = new AkunModel();
        $this->AgamaModel = new AgamaModel();
        $this->ProvinsiModel = new ProvinsiModel();
        $this->UkuranBajuModel = new UkuranBajuModel();
        $this->UkuranSepatuModel = new UkuranSepatuModel();
        $this->UkuranKepalaModel = new UkuranKepalaModel();
        $this->PendidikanModel = new PendidikanModel();
    }
}
