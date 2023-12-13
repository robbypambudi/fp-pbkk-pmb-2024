<?php

namespace App\Controllers;

use App\Models\KabupatenModel;
use App\Models\KecamatanModel;
use App\Models\SekolahBidangKeahlianModel;
use App\Models\SekolahKompetensiKeahlianModel;
use App\Models\SekolahProgramKeahlianModel;

class Cari extends BaseController
{
    protected $KabupatenModel;
    protected $KecamatanModel;
    protected $SekolahBidangKeahlianModel;
    protected $SekolahKompetensiKeahlianModel;
    protected $SekolahProgramKeahlianModel;

    public function __construct()
    {
        $this->is_loged_in();
        $this->KabupatenModel = new KabupatenModel();
        $this->KecamatanModel = new KecamatanModel();
        $this->SekolahKompetensiKeahlianModel = new SekolahKompetensiKeahlianModel();
        $this->SekolahBidangKeahlianModel = new SekolahBidangKeahlianModel();
        $this->SekolahProgramKeahlianModel = new SekolahProgramKeahlianModel();
    }

    public function index()
    {
        echo "403 Forbidden!";
    }

    public function kabupaten()
    {
        // if (!$this->request->isAJAX()) {
        //     echo 'Request tidak dapat di proses';
        // } else {
        $prov = $this->request->getVar("prov");
        // list kabupaten with where(province_id = $prov) and order by name asceding
        $list_kabupaten = $this->KabupatenModel->where('province_id', $prov)->orderBy('name', 'ASC')->findAll();


        if ($list_kabupaten) {
            echo '<option value="">-- Pilih --</option>';

            foreach ($list_kabupaten as $lk) {

                echo '<option value="' . $lk["id"] . '">' . $lk["name"] . '</option>';
            }
        }
    }
    public function kecamatan()
    {
        $kec = $this->request->getVar("kec");
        // create list_kecamatan with where(regency_id) and order by name asceding 
        $list_kecamatan = $this->KecamatanModel->where('regency_id', $kec)->orderBy('name', 'ASC')->findAll();

        if ($list_kecamatan) {
            echo '<option value="">-- Pilih --</option>';
            foreach ($list_kecamatan as $lk) {

                echo '<option value="' . $lk["id"] . '">' . $lk["name"] . '</option>';
            }
        }
    }

    public function bidang()
    {
        $bidang = $this->request->getVar("bidang");
        $list_jurusan = $this->SekolahBidangKeahlianModel->where('jenis_sekolah', $bidang)->orderBy('bidang_keahlian', 'ASC')->findAll();

        if ($list_jurusan) {
            echo '<option value="">-- Pilih --</option>';
            foreach ($list_jurusan as $lj) {
                echo '<option value="' . $lj["id"] . '">' . $lj["bidang_keahlian"] . '</option>';
            }
        }
    }
    public function program()
    {
        $program = $this->request->getVar("program");
        $list_program = $this->SekolahProgramKeahlianModel->where('bidang_keahlian', $program)->orderBy('program_keahlian', 'ASC')->findAll();

        if ($list_program) {
            echo '<option value="">-- Pilih --</option>';
            foreach ($list_program as $lp) {
                echo '<option value="' . $lp["id"] . '">' . $lp["program_keahlian"] . '</option>';
            }
        }
    }
    public function kompetensi()
    {
        $kompetensi = $this->request->getVar("kompetensi");
        $list_kompetensi = $this->SekolahKompetensiKeahlianModel->where('program_keahlian', $kompetensi)->orderBy('kompetensi_keahlian', 'ASC')->findALL();

        if ($list_kompetensi) {
            echo '<option value="">-- Pilih --</option>';
            foreach ($list_kompetensi as $lk) {
                echo '<option value="' . $lk["id"] . '">' . $lk["kompetensi_keahlian"] . '</option>';
            }
        }
    }
}
