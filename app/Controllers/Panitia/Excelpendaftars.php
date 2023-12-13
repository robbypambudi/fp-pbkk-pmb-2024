<?php

namespace App\Controllers\Panitia;

use App\Controllers\BaseController;

use App\Models\PendaftarModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Excelpendaftars extends BaseController
{
    protected $PendaftarModel;
    protected $db;


    public function __construct()
    {
        $this->is_loged_as_panitia();
        $this->PendaftarModel = new PendaftarModel();
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $db = \Config\Database::connect();
        // $query = 'select * from akun a, pendaftar b, akun_sekolah c where a.id = b.akun and a.id = c.akun';
        // $pendaftar = $db->query($query)->getResultArray();
        $builder = $db->table('akun')
            ->join('akun_orang_tua', 'akun.id = akun_orang_tua.akun', 'inner')
            ->join('akun_sekolah', 'akun.id = akun_sekolah.akun', 'inner')
            ->join('pendaftar', 'akun.id = pendaftar.akun', 'inner');
        $data_pendaftar = $builder->get()->getResultArray();
        // dd($data_pendaftar);

        $spreadsheet = new Spreadsheet();

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Email')
            ->setCellValue('B1', 'Nama')
            ->setCellValue('C1', 'NIK')
            ->setCellValue('D1', 'Tempat Lahir')
            ->setCellValue('E1', 'Tanggal Lahir')
            ->setCellValue('F1', 'Kelamin')
            ->setCellValue('G1', 'Agama')
            ->setCellValue('H1', 'Alamat')
            ->setCellValue('I1', 'Kecamatan')
            ->setCellValue('J1', 'Kabupaten/Kota')
            ->setCellValue('K1', 'Provinsi')
            ->setCellValue('L1', 'Kode Pos')
            ->setCellValue('M1', 'IQ')
            ->setCellValue('N1', 'Tinggi Badan')
            ->setCellValue('O1', 'Berat Badan')
            ->setCellValue('P1', 'Golongan Darah')
            ->setCellValue('Q1', 'Riwayat Penyakit')
            ->setCellValue('R1', 'Telp')
            ->setCellValue('S1', 'HP')
            ->setCellValue('T1', 'Ukuran Baju Seragam')
            ->setCellValue('U1', 'Ukuran Baju Olahraga')
            ->setCellValue('V1', 'Ukuran Sepatu Sekolah')
            ->setCellValue('W1', 'Ukuran Sepatu Olahraga')
            ->setCellValue('X1', 'Ukuran Lingkar Kepala')
            ->setCellValue('Y1', 'Foto')
            ->setCellValue('Z1', 'Nama Ayah')
            ->setCellValue('AA1', 'NIK Ayah')
            ->setCellValue('AB1', 'Tanggal Lahir Ayah')
            ->setCellValue('AC1', 'Pendidikan Ayah')
            ->setCellValue('AD1', 'Pekerjaan Ayah')
            ->setCellValue('AE1', 'Jabatan Ayah')
            ->setCellValue('AF1', 'Penghasilan Ayah')
            ->setCellValue('AG1', 'Nama Ibu')
            ->setCellValue('AH1', 'NIK Ibu')
            ->setCellValue('AI1', 'Tanggal Lahir Ibu')
            ->setCellValue('AJ1', 'Pendidikan Ibu')
            ->setCellValue('AK1', 'Pekerjaan Ibu')
            ->setCellValue('AL1', 'Jabatan Ibu')
            ->setCellValue('AM1', 'Penghasilan Ibu')
            ->setCellValue('AN1', 'Telp Orang Tua')
            ->setCellValue('AO1', 'Nama Wali')
            ->setCellValue('AP1', 'Tanggal Lahir Wali')
            ->setCellValue('AQ1', 'Pendidikan Wali')
            ->setCellValue('AR1', 'Pekerjaan Wali')
            ->setCellValue('AS1', 'Jabatan Wali')
            ->setCellValue('AT1', 'Penghasilan Wali')
            ->setCellValue('AU1', 'Hubungan Wali')
            ->setCellValue('AV1', 'Sekolah Asal')
            ->setCellValue('AW1', 'Alamat Sekolah')
            ->setCellValue('AX1', 'Kecamatan')
            ->setCellValue('AY1', 'Kabupaten')
            ->setCellValue('AZ1', 'Provinsi')
            ->setCellValue('BA1', 'Telp Sekolah')
            ->setCellValue('BB1', 'Status Sekolah')
            ->setCellValue('BC1', 'Jenis Sekolah')
            ->setCellValue('BD1', 'Akreditasi Sekolah')
            ->setCellValue('BE1', 'Bidang Keahlian')
            ->setCellValue('BF1', 'Program Keahlian')
            ->setCellValue('BG1', 'Kompetensi Keahlian')
            ->setCellValue('BH1', 'Tahun Lulus')
            ->setCellValue('BI1', 'NISN')
            ->setCellValue('BJ1', 'Rerata Nilai Semester 1')
            ->setCellValue('BK1', 'Rerata Nilai Semester 2')
            ->setCellValue('BL1', 'Rerata Nilai Semester 3')
            ->setCellValue('BM1', 'Rerata Nilai Semester 4')
            ->setCellValue('BN1', 'Rerata Nilai Semester 5')
            ->setCellValue('BO1', 'Matematika P Semester 5')
            ->setCellValue('BP1', 'Matematika K Semester 5')
            ->setCellValue('BQ1', 'Biologi P Semester 5')
            ->setCellValue('BR1', 'Biologi K Semester 5')
            ->setCellValue('BS1', 'Fisika P Semester 5')
            ->setCellValue('BT1', 'Fisika K Semester 5')
            ->setCellValue('BU1', 'Kimia P Semester 5')
            ->setCellValue('BV1', 'Fisika K Semester 5')
            ->setCellValue('BW1', 'B. Inggris P Semester 5')
            ->setCellValue('BX1', 'B. Inggris K Semester 5')
            ->setCellValue('BY1', 'B. Indonesia P Semester 5')
            ->setCellValue('BZ1', 'B. Indonesia K Semester 5')
            ->setCellValue('CA1', 'Keahlian P Semester 5')
            ->setCellValue('CB1', 'Keahlian K Semester 5')
            ->setCellValue('CC1', 'Ekonomi P Semester 5')
            ->setCellValue('CD1', 'Ekonomi K Semester 5')
            ->setCellValue('CE1', 'Geografi P Semester 5')
            ->setCellValue('CF1', 'Geografi K Semester 5')
            ->setCellValue('CG1', 'B. Asing P Semester 5')
            ->setCellValue('CH1', 'B. Asing K Semester 5')
            ->setCellValue('CI1', 'Gelombang')
            ->setCellValue('CJ1', 'Nomor Daftar')
            ->setCellValue('CK1', 'Prodi I')
            ->setCellValue('CL1', 'Prodi II');

        $column = 2;
        // tulis data mobil ke cell
        $db = db_connect();
        foreach ($data_pendaftar as $dp) {
            // $alamat = $db->query("SELECT d.name AS kecamatan, r.name AS kabupaten, p.name AS provinsi FROM districts d, regencies r, provinces p WHERE d.regency_id = r.id AND r.province_id = p.id AND d.id = " . $dp['alamat_kecamatan'] . "")->getResultArray();
            $agama = $db->query("SELECT agama FROM agama WHERE id = " . $dp['agama'] . "")->getRowArray();
            $alamat = $db->query("SELECT d.name AS kecamatan, r.name AS kabupaten, p.name AS provinsi FROM districts d, regencies r, provinces p WHERE d.regency_id = r.id AND r.province_id = p.id AND d.id = " . $dp['alamat_kecamatan'] . "")->getRowArray();
            $alamat_sekolah = $db->query("SELECT d.name AS kecamatan, r.name AS kabupaten, p.name AS provinsi FROM districts d, regencies r, provinces p WHERE d.regency_id = r.id AND r.province_id = p.id AND d.id = " . $dp['sekolah_kecamatan'] . "")->getRowArray();
            $keahlian = $db->query("SELECT kk.kompetensi_keahlian AS kompetensi, pk.program_keahlian AS program, bk.bidang_keahlian AS bidang FROM sekolah_kompetensi_keahlian kk, sekolah_program_keahlian pk, sekolah_bidang_keahlian bk WHERE kk.program_keahlian = pk.id AND pk.bidang_keahlian = bk.id AND kk.id = " . $dp['sekolah_kompetensi_keahlian'] . "")->getRowArray();
            $nilai = $db->query("SELECT * FROM akun_nilai WHERE akun = " . $dp['akun'] . " ORDER BY semester")->getResultArray();
            $url = 'https://penerimaan.idu.ac.id/uploads/rapor/';
            // $url = base_url('/uploads/rapor/');
            $t = '"';
            // dd($nilai);
            $prodi1 = $db->query("SELECT program_studi FROM program_studi WHERE id = " . $dp['prodi1'] . "")->getRowArray();
            $prodi2 = $db->query("SELECT program_studi FROM program_studi WHERE id = " . $dp['prodi2'] . "")->getRowArray();

            // dd($prodi1);
            // $kecamatan = $alamat[0]['kecamatan'];
            // $kecamatan = $alamat['kecamatan'];
            // dd($kecamatan);
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $column, $dp['email'])
                ->setCellValue('B' . $column, $dp['nama'])
                ->setCellValue('C' . $column, $dp['nik'])
                ->setCellValue('D' . $column, $dp['tmp_lahir'])
                ->setCellValue('E' . $column, $dp['tgl_lahir'])
                ->setCellValue('F' . $column, $dp['kelamin'])
                ->setCellValue('G' . $column, $agama['agama'])
                ->setCellValue('H' . $column, $dp['alamat'])
                ->setCellValue('I' . $column, $alamat['kecamatan'])
                ->setCellValue('J' . $column, $alamat['kabupaten'])
                ->setCellValue('K' . $column, $alamat['provinsi'])
                ->setCellValue('L' . $column, $dp['kode_pos'])
                ->setCellValue('M' . $column, $dp['iq'])
                ->setCellValue('N' . $column, $dp['tinggi_badan'])
                ->setCellValue('O' . $column, $dp['berat_badan'])
                ->setCellValue('P' . $column, $dp['golongan_darah'])
                ->setCellValue('Q' . $column, $dp['riwayat_penyakit'])
                ->setCellValue('R' . $column, $dp['telp'])
                ->setCellValue('S' . $column, $dp['hp'])
                ->setCellValue('T' . $column, $dp['baju_seragam'])
                ->setCellValue('U' . $column, $dp['baju_olahraga'])
                ->setCellValue('V' . $column, $dp['sepatu_sekolah'])
                ->setCellValue('W' . $column, $dp['sepatu_olahraga'])
                ->setCellValue('X' . $column, $dp['lingkar_kepala'])
                ->setCellValue('Y' . $column, $dp['photo'])
                ->setCellValue('Z' . $column, $dp['ayah_nama'])
                ->setCellValue('AA' . $column, $dp['ayah_nik'])
                ->setCellValue('AB' . $column, $dp['ayah_tanggal_lahir'])
                ->setCellValue('AC' . $column, $dp['ayah_pendidikan'])
                ->setCellValue('AD' . $column, $dp['ayah_pekerjaan'])
                ->setCellValue('AE' . $column, $dp['ayah_jabatan'])
                ->setCellValue('AF' . $column, $dp['ayah_penghasilan'])
                ->setCellValue('AG' . $column, $dp['ibu_nama'])
                ->setCellValue('AH' . $column, $dp['ibu_nik'])
                ->setCellValue('AI' . $column, $dp['ibu_tanggal_lahir'])
                ->setCellValue('AJ' . $column, $dp['ibu_pendidikan'])
                ->setCellValue('AK' . $column, $dp['ibu_pekerjaan'])
                ->setCellValue('AL' . $column, $dp['ibu_jabatan'])
                ->setCellValue('AM' . $column, $dp['ibu_penghasilan'])
                ->setCellValue('AN' . $column, $dp['telp_ortu'])
                ->setCellValue('AO' . $column, $dp['wali_nama'])
                ->setCellValue('AP' . $column, $dp['wali_tanggal_lahir'])
                ->setCellValue('AQ' . $column, $dp['wali_pendidikan'])
                ->setCellValue('AR' . $column, $dp['wali_pekerjaan'])
                ->setCellValue('AS' . $column, $dp['wali_jabatan'])
                ->setCellValue('AT' . $column, $dp['wali_penghasilan'])
                ->setCellValue('AU' . $column, $dp['hubungan_wali'])
                ->setCellValue('AV' . $column, $dp['sekolah_nama'])
                ->setCellValue('AW' . $column, $dp['sekolah_alamat'])
                ->setCellValue('AX' . $column, $alamat_sekolah['kecamatan'])
                ->setCellValue('AY' . $column, $alamat_sekolah['kabupaten'])
                ->setCellValue('AZ' . $column, $alamat_sekolah['provinsi'])
                ->setCellValue('BA' . $column, $dp['sekolah_telp'])
                ->setCellValue('BB' . $column, $dp['sekolah_status'])
                ->setCellValue('BC' . $column, ($dp['sekolah_jenis'] == 1 ? 'SMA/MA' : 'SMK'))
                ->setCellValue('BD' . $column, $dp['sekolah_akreditasi'])
                ->setCellValue('BE' . $column, $keahlian['bidang'])
                ->setCellValue('BF' . $column, $keahlian['program'])
                ->setCellValue('BG' . $column, $keahlian['kompetensi'])
                ->setCellValue('BH' . $column, $dp['tahun_lulus_sekolah'])
                ->setCellValue('BI' . $column, $dp['nisn'])
                ->setCellValue('BJ' . $column, '=Hyperlink(' . $t . $url . $nilai[0]['file'] . $t . ', ' . $nilai[0]['rata_semester'] . ')')
                ->setCellValue('BK' . $column, '=Hyperlink(' . $t . $url . $nilai[1]['file'] . $t . ', ' . $nilai[1]['rata_semester'] . ')')
                ->setCellValue('BL' . $column, '=Hyperlink(' . $t . $url . $nilai[2]['file'] . $t . ', ' . $nilai[2]['rata_semester'] . ')')
                ->setCellValue('BM' . $column, '=Hyperlink(' . $t . $url . $nilai[3]['file'] . $t . ', ' . $nilai[3]['rata_semester'] . ')')
                ->setCellValue('BN' . $column, '=Hyperlink(' . $t . $url . $nilai[4]['file'] . $t . ', ' . $nilai[4]['rata_semester'] . ')')
                ->setCellValue('BO' . $column, $nilai[4]['matematika_p'])
                ->setCellValue('BP' . $column, $nilai[4]['matematika_k'])
                ->setCellValue('BQ' . $column, $nilai[4]['biologi_p'])
                ->setCellValue('BR' . $column, $nilai[4]['biologi_k'])
                ->setCellValue('BS' . $column, $nilai[4]['fisika_p'])
                ->setCellValue('BT' . $column, $nilai[4]['fisika_k'])
                ->setCellValue('BU' . $column, $nilai[4]['kimia_p'])
                ->setCellValue('BV' . $column, $nilai[4]['kimia_k'])
                ->setCellValue('BW' . $column, $nilai[4]['inggris_p'])
                ->setCellValue('BX' . $column, $nilai[4]['inggris_k'])
                ->setCellValue('BY' . $column, $nilai[4]['indonesia_p'])
                ->setCellValue('BZ' . $column, $nilai[4]['indonesia_k'])
                ->setCellValue('CA' . $column, $nilai[4]['keahlian_p'])
                ->setCellValue('CB' . $column, $nilai[4]['keahlian_k'])
                ->setCellValue('CC' . $column, $nilai[4]['ekonomi_p'])
                ->setCellValue('CD' . $column, $nilai[4]['ekonomi_k'])
                ->setCellValue('CE' . $column, $nilai[4]['geografi_p'])
                ->setCellValue('CF' . $column, $nilai[4]['geografi_k'])
                ->setCellValue('CG' . $column, $nilai[4]['b_asing_p'])
                ->setCellValue('CH' . $column, $nilai[4]['b_asing_k'])

                ->setCellValue('CI' . $column, $dp['gelombang'])
                ->setCellValue('CJ' . $column, $dp['nomor'])
                ->setCellValue('CK' . $column, $prodi1['program_studi'])
                ->setCellValue('CL' . $column, $prodi2['program_studi']);
            $column++;
        }
        $db->close();
        // tulis dalam format .xlsx
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Data Pendaftar';

        // Redirect hasil generate xlsx ke web client
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
