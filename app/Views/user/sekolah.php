<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container my-3">
    <div class="row">
        <H3>Dashboard Calon Kadet Mahasiswa</H3>
        <hr>
        <!-- Left Side -->
        <?= $this->include('layout/user-left-sidebar'); ?>

        <!-- Contents -->
        <div class="col-9">
            <div class="alert alert-info" role="alert">
                <h4>Data Sekolah Asal dan Data Nilai</h4>
            </div>
            <?php if (session()->getFlashdata('message')) {
                echo session()->getFlashdata('message');
            } ?>
            <ul class="nav nav-tabs mb-3">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="sekolah">
                        <h4>Sekolah Asal</h4>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="nilai">
                        <h4>Data Nilai</h4>
                    </a>
                </li>
            </ul>
            <form method="POST" action="Sekolah/save">
                <div class="form-group row mb-1">
                    <label for="sekolah_nama" class="col-sm-3 col-form-label">Nama Sekolah<span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control <?= ($validation->getError('sekolah_nama')) ? 'is-invalid' : '' ?>" id="sekolah_nama" name="sekolah_nama" value="<?= isset($akun_sekolah['sekolah_nama']) ? $akun_sekolah['sekolah_nama'] : ''; ?>" required>
                        <div class="invalid-feedback">
                            <?= $validation->getError('sekolah_nama'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label for="sekolah_alamat" class="col-sm-3 col-form-label">Alamat Sekolah<span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control <?= ($validation->getError('sekolah_alamat')) ? 'is-invalid' : '' ?>" id="sekolah_alamat" name="sekolah_alamat" value="<?= isset($akun_sekolah['sekolah_alamat']) ? $akun_sekolah['sekolah_alamat'] : ''; ?>" required>
                        <div class="invalid-feedback">
                            <?= $validation->getError('sekolah_alamat'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label for="sekolah_provinsi" class="offset-sm-1 col-sm-2 col-form-label">Provinsi<span class="text-danger">*</span></label>
                    <div class="col-sm-4">
                        <select id="sekolah_provinsi" name="sekolah_provinsi" class="form-control form-select <?= ($validation->getError('sekolah_provinsi')) ? 'is-invalid' : '' ?>" required onchange="CariAlamatKabupaten(this.options[this.selectedIndex]);">
                            <option selected value="">-- Pilih --</option>
                            <?php foreach ($provinsi as $prov) : ?>
                                <option <?= ($prov['id'] == (isset($akun_sekolah['sekolah_provinsi']) ? $akun_sekolah['sekolah_provinsi'] : '')) ? 'selected' : ''; ?> value="<?= $prov['id']; ?>"><?= $prov['name']; ?></option>
                            <?php endforeach ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('sekolah_provinsi'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label for="sekolah_kabupaten" class="offset-sm-1 col-sm-2 col-form-label">Kabupaten/Kota<span class="text-danger">*</span></label>
                    <div class="col-sm-4">
                        <select name="sekolah_kabupaten" id="alamat_kabupaten" class="form-control form-select <?= ($validation->getError('sekolah_kabupaten')) ? 'is-invalid' : '' ?>" onchange="CariAlamatKecamatan(this.options[this.selectedIndex])" required>
                            <option value="">-- Pilih --</option>
                            <?php if (isset($kabkec['idkab'])) : ?>
                                <option selected value="<?= $kabkec['idkab']; ?>"><?= $kabkec['kab'] ?></option>
                            <?php endif; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('sekolah_kabupaten'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label for="sekolah_kecamatan" class="offset-sm-1 col-sm-2 col-form-label">Kecamatan<span class="text-danger">*</span></label>
                    <div class="col-sm-4">
                        <select name="sekolah_kecamatan" id="alamat_kecamatan" class="form-control form-select <?= ($validation->getError('sekolah_kecamatan')) ? 'is-invalid' : '' ?>" required>
                            <option value="">-- Pilih --</option>
                            <?php if (isset($kabkec['idkab'])) : ?>
                                <option selected value="<?= $kabkec['idkec']; ?>"><?= $kabkec['kec'] ?></option>
                            <?php endif; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('sekolah_kecamatan'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label for="sekolah_status" class="col-sm-3 col-form-label">Status Sekolah<span class="text-danger">*</span></label>
                    <div class="col-sm-2">
                        <select class="form-control form-select <?= ($validation->getError('sekolah_status')) ? 'is-invalid' : '' ?>" name="sekolah_status" id="sekolah_status">
                            <option value="">-- Pilih --</option>
                            <option value="Negeri" <?= (isset($akun_sekolah['sekolah_status']) ? ($akun_sekolah['sekolah_status'] == 'Negeri' ? 'Selected' : '') : ''); ?>>Negeri</option>
                            <option value="Swasta" <?= (isset($akun_sekolah['sekolah_status']) ? ($akun_sekolah['sekolah_status'] == 'Swasta' ? 'Selected' : '') : ''); ?>>Swasta</option>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('sekolah_status'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label for="sekolah_jenis" class="col-sm-3 col-form-label">Jenis Sekolah<span class="text-danger">*</span></label>
                    <div class="col-sm-2">
                        <select class="form-control form-select <?= ($validation->getError('sekolah_jenis')) ? 'is-invalid' : '' ?>" name="sekolah_jenis" id="sekolah_jenis" onchange="CariBidangKeahlihan(this.options[this.selectedIndex])" require>
                            <option value="">-- Pilih --</option>
                            <option value="1" <?= (isset($akun_sekolah['sekolah_jenis']) ? ($akun_sekolah['sekolah_jenis'] == 1 ? 'Selected' : '') : ''); ?>>SMA/MA</option>
                            <option value="2" <?= (isset($akun_sekolah['sekolah_jenis']) ? ($akun_sekolah['sekolah_jenis'] == 2 ? 'Selected' : '') : ''); ?>>SMK</option>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('sekolah_jenis'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label for="sekolah_akreditasi" class="col-sm-3 col-form-label">Akreditasi Sekolah<span class="text-danger">*</span></label>
                    <div class="col-sm-2">
                        <select class="form-control form-select <?= ($validation->getError('sekolah_akreditasi')) ? 'is-invalid' : '' ?>" name="sekolah_akreditasi" id="sekolah_akreditasi">
                            <option value="">-- Pilih --</option>
                            <option value="A" <?= (isset($akun_sekolah['sekolah_akreditasi']) ? ($akun_sekolah['sekolah_akreditasi'] == 'A' ? 'Selected' : '') : ''); ?>>A</option>
                            <option value="B" <?= (isset($akun_sekolah['sekolah_akreditasi']) ? ($akun_sekolah['sekolah_akreditasi'] == 'B' ? 'Selected' : '') : ''); ?>>B</option>
                            <option value="C" <?= (isset($akun_sekolah['sekolah_akreditasi']) ? ($akun_sekolah['sekolah_akreditasi'] == 'C' ? 'Selected' : '') : ''); ?>>C</option>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('sekolah_akreditasi'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label for="sekolah_telp" class="col-sm-3 col-form-label">Nomor Telp Sekolah<span class="text-danger">*</span></label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control <?= ($validation->getError('sekolah_telp')) ? 'is-invalid' : '' ?>" id="sekolah_telp" name="sekolah_telp" value="<?= isset($akun_sekolah['sekolah_telp']) ? $akun_sekolah['sekolah_telp'] : '';  ?>" required>
                        <div class="invalid-feedback">
                            <?= $validation->getError('sekolah_telp'); ?>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-group row mb-1">
                    <label for="tahun_lulus_sekolah" class="col-sm-3 col-form-label">Tahun Lulus<span class="text-danger">*</span></label>
                    <div class="col-sm-2">
                        <select class="form-control form-select <?= ($validation->getError('tahun_lulus_sekolah')) ? 'is-invalid' : '' ?>" name="tahun_lulus_sekolah" id="tahun_lulus_sekolah">
                            <option value="">-- Pilih --</option>
                            <option <?= (isset($akun_sekolah['tahun_lulus_sekolah'])) ? ($akun_sekolah['tahun_lulus_sekolah'] == 2021 ? 'selected' : '') : '' ?> value="2021">2021</option>
                            <option <?= (isset($akun_sekolah['tahun_lulus_sekolah'])) ? ($akun_sekolah['tahun_lulus_sekolah'] == 2022 ? 'selected' : '') : '' ?> value="2022">2022</option>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('tahun_lulus_sekolah'); ?>
                        </div>
                    </div>
                    <label for="tahun" class="col-sm-7 col-form-label">
                        PMB TA <?= date('Y'); ?> hanya diperuntukkan lulusan tahun <?= date('Y') - 1; ?> dan <?= date('Y'); ?>.
                    </label>
                </div>
                <div class="form-group row mb-1">
                    <label for="bidang_keahlian" class="col-sm-3 col-form-label">Bidang Keahlian<span class="text-danger">*</span></label>
                    <div class="col-sm-4">
                        <select class="form-control form-select" id="bidang_keahlian" name="bidang_keahlian" onchange="CariProgramKeahlihan(this.options[this.selectedIndex]);" <?= ($validation->getError("bidang_keahlian")) ? "is-invalid" : ""; ?>required>
                            <option value="">-- Pilih --</option>
                            <?php if (isset($dik['idbk'])) : ?>
                                <option selected value="<?= $dik['idbk']; ?>"><?= $dik['bidang_keahlian'] ?></option>
                            <?php endif; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError("bidang_keahlian"); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label for="program_keahlian" class="col-sm-3 col-form-label">Program Keahlian<span class="text-danger">*</span></label>
                    <div class="col-sm-4">
                        <select class="form-control form-select" id="program_keahlian" name="program_keahlian" onchange="CariKompetensiKeahlian(this.options[this.selectedIndex]);" <?= ($validation->getError("program_keahlian")) ? "is-invalid" : ""; ?>required>
                            <option value="">-- Pilih --</option>
                            <?php if (isset($dik['idpk'])) : ?>
                                <option selected value="<?= $dik['idpk']; ?>"><?= $dik['program_keahlian'] ?></option>
                            <?php endif; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError("program_keahlian"); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label for="kompetensi_keahlian" class="col-sm-3 col-form-label">Kompetensi Keahlian<span class="text-danger">*</span></label>
                    <div class="col-sm-4">
                        <select class="form-control form-select" id="kompetensi_keahlian" name="kompetensi_keahlian" <?= ($validation->getError("kompetensi_keahlian")) ? "is-invalid" : ""; ?>required>
                            <option value="">-- Pilih --</option>
                            <?php if (isset($dik['idkk'])) : ?>
                                <option selected value="<?= $dik['idkk']; ?>"><?= $dik['kompetensi_keahlian'] ?></option>
                            <?php endif; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError("kompetensi_keahlian"); ?>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-1">
                    <label for="nisn" class="col-sm-3 col-form-label">NISN<span class="text-danger">*</span></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control <?= ($validation->getError('nisn')) ? 'is-invalid' : '' ?>" id="nisn" name="nisn" value="<?= isset($akun_sekolah['nisn']) ? $akun_sekolah['nisn'] : ''; ?>" required>
                        <div class="invalid-feedback">
                            <?= $validation->getError('nisn'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row my-3">
                    <div class="offset-sm-3">
                        <button type="submit" class="btn btn-info ">Simpan Data Sekolah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Call to Action Well -->
    <div class="card text-white bg-secondary my-3 py-4 text-center">
        <div class="card-body">
            <p class="text-white m-0">Bergabung di Universitas Pertahanan RI dan menjadi Kader Intelektual Bela Negara.</p>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>