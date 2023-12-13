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
            <?= (session()->getFlashdata('message')) ? session()->getFlashdata('message') : ""; ?>
            <h2>Data Orang Tua/Wali</h2>
            <hr>
            <form method="POST" action="ortu/save">
                <?= csrf_field(); ?>
                <h4>Ayah</h4>
                <div class="form-group row my-1">
                    <label for="ayah_nik" class="col-sm-3 col-form-label">NIK<span class="text-danger">*</span></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control <?= ($validation->getError('ayah_nik')) ? 'is-invalid' : ''; ?>" id="ayah_nik" name="ayah_nik" value="<?= (isset($akun['ayah_nik'])) ? $akun['ayah_nik'] : '' ?>" minlength="16" maxlength="16" required placeholder="Masukkan 16 digit NIK ayah">
                        <div class="invalid-feedback">
                            <?= $validation->getError('ayah_nik'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row my-1">
                    <label for="ayah_nama" class="col-sm-3 col-form-label">Nama Lengkap<span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control <?= ($validation->getError('ayah_nama')) ? 'is-invalid' : ''; ?>" id="ayah_nama" name="ayah_nama" value="<?= (isset($akun['ayah_nama'])) ? $akun['ayah_nama'] : ''; ?>" required>
                        <div class="invalid-feedback">
                            <?= $validation->getError('ayah_nama'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row my-1">
                    <label for="ayah_tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir<span class="text-danger">*</span></label>
                    <div class="col-sm-3">
                        <input type="date" class="form-control <?= ($validation->getError('ayah_tanggal_lahir')) ? 'is-invalid' : ''; ?>" id="ayah_tanggal_lahir" name="ayah_tanggal_lahir" value="<?= (isset($akun['ayah_tanggal_lahir'])) ? $akun['ayah_tanggal_lahir'] : ''; ?>" required>
                        <div class="invalid-feedback">
                            <?= $validation->getError('ayah_tanggal_lahir'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row my-1">
                    <label for="ayah_pendidikan" class="col-sm-3 col-form-label">Pendidikan<span class="text-danger">*</span></label>
                    <div class="col-sm-4">
                        <select class="form-control form-select <?= ($validation->getError('ayah_pendidikan')) ? 'is-invalid' : ''; ?>" name="ayah_pendidikan" id="ayah_pendidikan" required>
                            <option value="">-- Pilih --</option>
                            <?php foreach ($pendidikan as $pd) : ?>
                                <option <?= ($pd['id'] == (isset($akun['ayah_pendidikan']) ? $akun['ayah_pendidikan'] : '')) ? 'selected' : ''; ?> value="<?= $pd['id']; ?>"><?= $pd['pendidikan']; ?></option>
                            <?php endforeach ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('ayah_pendidikan'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row my-1">
                    <label for="ayah_pekerjaan" class="col-sm-3 col-form-label">Pekerjaan<span class="text-danger">*</span></label>
                    <div class="col-sm-4">
                        <select class="form-control form-select <?= ($validation->getError('ayah_pekerjaan')) ? 'is-invalid' : ''; ?>" name="ayah_pekerjaan" id="ayah_pekerjaan" required>
                            <option value="">-- Pilih --</option>
                            <?php foreach ($pekerjaan as $pk) : ?>
                                <option <?= ($pk['id'] == (isset($akun['ayah_pekerjaan']) ? $akun['ayah_pekerjaan'] : '')) ? 'selected' : ''; ?> value="<?= $pk['id']; ?>"><?= $pk['pekerjaan']; ?></option>
                            <?php endforeach ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('ayah_pekerjaan'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row my-1">
                    <label for="ayah_jabatan" class="col-sm-3 col-form-label">Jabatan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control <?= ($validation->getError('ayah_jabatan')) ? 'is-invalid' : ''; ?>" id="ayah_jabatan" name="ayah_jabatan" value="<?= (isset($akun['ayah_jabatan'])) ? $akun['ayah_jabatan'] : ''; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('ayah_jabatan'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row my-1">
                    <label for="ayah_penghasilan" class="col-sm-3 col-form-label">Penghasilan<span class="text-danger">*</span></label>
                    <div class="col-sm-4">
                        <select class="form-control form-select <?= ($validation->getError('ayah_penghasilan')) ? 'is-invalid' : ''; ?>" name="ayah_penghasilan" id="ayah_penghasilan" required>
                            <option value="">-- Pilih --</option>
                            <?php foreach ($penghasilan as $ph) : ?>
                                <option <?= ($ph['id'] == (isset($akun['ayah_penghasilan']) ? $akun['ayah_penghasilan'] : '')) ? 'selected' : ''; ?> value="<?= $ph['id']; ?>"><?= $ph['penghasilan']; ?></option>
                            <?php endforeach ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('ayah_penghasilan'); ?>
                        </div>
                    </div>
                </div>
                <hr>
                <h4>Ibu</h4>
                <div class="form-group row my-1">
                    <label for="ibu_nik" class="col-sm-3 col-form-label">NIK<span class="text-danger">*</span></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control <?= ($validation->getError('ibu_nik')) ? 'is-invalid' : ''; ?>" id="ibu_nik" name="ibu_nik" value="<?= (isset($akun['ibu_nik'])) ? $akun['ibu_nik'] : '' ?>" minlength="16" maxlength="16" required>
                        <div class="invalid-feedback">
                            <?= $validation->getError('ibu_nik'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row my-1">
                    <label for="ibu_nama" class="col-sm-3 col-form-label">Nama Lengkap<span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control <?= ($validation->getError('ibu_nama')) ? 'is-invalid' : ''; ?>" id="ibu_nama" name="ibu_nama" value="<?= (isset($akun['ibu_nama'])) ? $akun['ibu_nama'] : '' ?>" required>
                        <div class="invalid-feedback">
                            <?= $validation->getError('ibu_nama'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row my-1">
                    <label for="ibu_tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir<span class="text-danger">*</span></label>
                    <div class="col-sm-3">
                        <input type="date" class="form-control <?= ($validation->getError('ibu_tanggal_lahir')) ? 'is-invalid' : ''; ?>" id="ibu_tanggal_lahir" name="ibu_tanggal_lahir" value="<?= (isset($akun['ibu_tanggal_lahir'])) ? $akun['ibu_tanggal_lahir'] : '' ?>" required>
                        <div class="invalid-feedback">
                            <?= $validation->getError('ibu_tanggal_lahir'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row my-1">
                    <label for="ibu_pendidikan" class="col-sm-3 col-form-label">Pendidikan<span class="text-danger">*</span></label>
                    <div class="col-sm-4">
                        <select class="form-control form-select <?= ($validation->getError('ibu_pendidikan')) ? 'is-invalid' : ''; ?>" name="ibu_pendidikan" id="ibu_pendidikan" required>
                            <option value="">-Pilih-</option>
                            <?php foreach ($pendidikan as $pd) : ?>
                                <option <?= ($pd['id'] == (isset($akun['ibu_pendidikan']) ? $akun['ibu_pendidikan'] : '')) ? 'selected' : ''; ?> value="<?= $pd['id']; ?>"><?= $pd['pendidikan']; ?></option>
                            <?php endforeach ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('ibu_pendidikan'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row my-1">
                    <label for="ibu_pekerjaan" class="col-sm-3 col-form-label">Pekerjaan<span class="text-danger">*</span></label>
                    <div class="col-sm-4">
                        <select class="form-control form-select <?= ($validation->getError('ibu_pekerjaan')) ? 'is-invalid' : ''; ?>" name="ibu_pekerjaan" id="ibu_pekerjaan" required>
                            <option value="">-Pilih-</option>
                            <?php foreach ($pekerjaan as $pk) : ?>
                                <option <?= ($pk['id'] == (isset($akun['ibu_pekerjaan']) ? $akun['ibu_pekerjaan'] : '')) ? 'selected' : ''; ?> value="<?= $pk['id']; ?>"><?= $pk['pekerjaan']; ?></option>
                            <?php endforeach ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('ibu_pekerjaan'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row my-1">
                    <label for="ibu_jabatan" class="col-sm-3 col-form-label">Jabatan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control <?= ($validation->getError('ibu_jabatan')) ? 'is-invalid' : ''; ?>" id="ibu_jabatan" name="ibu_jabatan" value="<?= (isset($akun['ibu_jabatan'])) ? $akun['ibu_jabatan'] : '' ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('ibu_jabatan'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row my-1">
                    <label for="ibu_penghasilan" class="col-sm-3 col-form-label">Penghasilan<span class="text-danger">*</span></label>
                    <div class="col-sm-4">
                        <select class="form-control form-select <?= ($validation->getError('ibu_penghasilan')) ? 'is-invalid' : ''; ?>" name="ibu_penghasilan" id="ibu_penghasilan" required>
                            <option value="">-Pilih-</option>
                            <?php foreach ($penghasilan as $ph) : ?>
                                <option <?= ($ph['id'] == (isset($akun['ibu_penghasilan']) ? $akun['ibu_penghasilan'] : '')) ? 'selected' : ''; ?> value="<?= $ph['id']; ?>"><?= $ph['penghasilan']; ?></option>
                            <?php endforeach ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('ibu_penghasilan'); ?>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-group row my-1">
                    <label for="telp_ortu" class="col-sm-3 col-form-label">Nomor Telp Ayah/Ibu<span class="text-danger">*</span></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control <?= ($validation->getError('telp_ortu')) ? 'is-invalid' : ''; ?>" id="telp_ortu" name="telp_ortu" value="<?= (isset($akun['telp_ortu'])) ? $akun['telp_ortu'] : '' ?>" required>
                        <div class="invalid-feedback">
                            <?= $validation->getError('telp_ortu'); ?>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-group row my-1">
                    <h4 class="col-sm-3">Wali</h4>
                    <div class="col-sm-9">
                        <div class="alert alert-info" role="alert">
                            Silahkan masukkan data wali jika ada, biarkan kosong jika tidak ada.
                        </div>
                    </div>
                </div>
                <div class="form-group row my-1">
                    <label for="wali_nama" class="col-sm-3 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control <?= ($validation->getError('wali_nama')) ? 'is-invalid' : ''; ?>" id="wali_nama" name="wali_nama" value="<?= (isset($akun['wali_nama'])) ? $akun['wali_nama'] : '' ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('wali_nama'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row my-1">
                    <label for="wali_tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-3">
                        <input type="date" class="form-control <?= ($validation->getError('wali_tanggal_lahir')) ? 'is-invalid' : ''; ?>" id="wali_tanggal_lahir" name="wali_tanggal_lahir" value="<?= (isset($akun['wali_tanggal_lahir'])) ? $akun['wali_tanggal_lahir'] : '' ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('wali_tanggal_lahir'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row my-1">
                    <label for="wali_pendidikan" class="col-sm-3 col-form-label">Pendidikan</label>
                    <div class="col-sm-4">
                        <select class="form-control form-select <?= ($validation->getError('wali_pendidikan')) ? 'is-invalid' : ''; ?>" name="wali_pendidikan" id="wali_pendidikan">
                            <option value="">-Pilih-</option>
                            <?php foreach ($pendidikan as $pd) : ?>
                                <option <?= ($pd['id'] == (isset($akun['wali_pendidikan']) ? $akun['wali_pendidikan'] : '')) ? 'selected' : ''; ?> value="<?= $pd['id']; ?>"><?= $pd['pendidikan']; ?></option>
                            <?php endforeach ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('wali_pendidikan'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row my-1">
                    <label for="wali_pekerjaan" class="col-sm-3 col-form-label">Pekerjaan</label>
                    <div class="col-sm-4">
                        <select class="form-control form-select <?= ($validation->getError('ayah_nik')) ? 'is-invalid' : ''; ?>" name="wali_pekerjaan" id="wali_pekerjaan">
                            <option value="">-Pilih-</option>
                            <?php foreach ($pekerjaan as $pk) : ?>
                                <option <?= ($pk['id'] == (isset($akun['wali_pekerjaan']) ? $akun['wali_pekerjaan'] : '')) ? 'selected' : ''; ?> value="<?= $pk['id']; ?>"><?= $pk['pekerjaan']; ?></option>
                            <?php endforeach ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('wali_pekerjaan'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row my-1">
                    <label for="wali_jabatan" class="col-sm-3 col-form-label">Jabatan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control <?= ($validation->getError('wali_jabatan')) ? 'is-invalid' : ''; ?>" id="wali_jabatan" name="wali_jabatan" value="<?= (isset($akun['wali_jabatan'])) ? $akun['wali_jabatan'] : '' ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('wali_jabatan'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row my-1">
                    <label for="wali_penghasilan" class="col-sm-3 col-form-label">Penghasilan</label>
                    <div class="col-sm-4">
                        <select class="form-control form-select <?= ($validation->getError('wali_penghasilan')) ? 'is-invalid' : ''; ?>" name="wali_penghasilan" id="wali_penghasilan">
                            <option value="">-Pilih-</option>
                            <?php foreach ($penghasilan as $ph) : ?>
                                <option <?= ($ph['id'] == (isset($akun['wali_penghasilan']) ? $akun['wali_penghasilan'] : '')) ? 'selected' : ''; ?> value="<?= $ph['id']; ?>"><?= $ph['penghasilan']; ?></option>
                            <?php endforeach ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('wali_penghasilan'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row my-1">
                    <label for="hubungan_wali" class="col-sm-3 col-form-label">Hubungan</label>
                    <div class="col-sm-4">
                        <select class="form-control form-select <?= ($validation->getError('hubungan_wali')) ? 'is-invalid' : ''; ?>" name="hubungan_wali" id="hubungan_wali">
                            <option value="">-Pilih-</option>
                            <?php foreach ($hubunganwali as $hb) : ?>
                                <option <?= ($hb['id'] == (isset($akun['hubungan_wali']) ? $akun['hubungan_wali'] : '')) ? 'selected' : ''; ?> value="<?= $hb['id']; ?>"><?= $hb['hubungan']; ?></option>
                            <?php endforeach ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('hubungan_wali'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row my-4">
                    <div class="offset-sm-3">
                        <button type="submit" class="btn btn-info ">Simpan Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Call to Action Well -->
    <div class="card text-white bg-secondary my-3 py-4 text-center">
        <div class="card-body">
            <p class="text-white m-0">Bergabung di Universitas Pertahanan RI dan menjadi Kader Intelektual Bela Negara.</p>
            <p>Page rendered in {elapsed_time} seconds</p>
            <p>Environment: <?= ENVIRONMENT ?></p>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>