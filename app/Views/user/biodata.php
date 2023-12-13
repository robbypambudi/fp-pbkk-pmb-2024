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
            <?php if (session()->getFlashdata('message')) : ?>
                <?= session()->getFlashdata('message'); ?>
            <?php endif; ?>
            <h2>Biodata</h2>
            <form method="POST" action="biodata/save">
                <div class="form-group row mb-1">
                    <label for="nama" class="col-sm-3 col-form-label">Nama Lengkap<span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control <?= ($validation->getError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= $akun['nama']; ?>" required>
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label for="nik" class="col-sm-3 col-form-label">NIK<span class="text-danger">*</span></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control <?= ($validation->getError('nik')) ? 'is-invalid' : ''; ?>" id="nik" name="nik" value="<?= $akun['nik']; ?>" required>
                        <div class="invalid-feedback">
                            <?= $validation->getError('nik'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label for="tmp_lahir" class="col-sm-3 col-form-label">Tempat Lahir<span class="text-danger">*</span></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control <?= ($validation->getError('tmp_lahir')) ? 'is-invalid' : ''; ?>" id="tmp_lahir" name="tmp_lahir" value="<?= $akun['tmp_lahir']; ?>" required>
                        <div class=" invalid-feedback">
                            <?= $validation->getError('tmp_lahir'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label for="tgl_lahir" class="col-sm-3 col-form-label">Tanggal Lahir<span class="text-danger">*</span></label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control <?= ($validation->getError('tgl_lahir')) ? 'is-invalid' : ''; ?>" name="tgl_lahir" id="tgl_lahir" value="<?= $akun['tgl_lahir']; ?>" required>
                        <div class="invalid-feedback">
                            <?= $validation->getError('tgl_lahir'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label for="kelamin" class="col-sm-3 col-form-label">Jenis Kelamin<span class="text-danger">*</span></label>
                    <div class="col-sm-3">
                        <select id="kelamin" name="kelamin" class="form-control form-select <?= ($validation->getError('kelamin')) ? 'is-invalid' : ''; ?>" required>
                            <option selected value="">--- Pilih ---</option>
                            <option <?= ($akun['kelamin'] == 'L') ? 'selected' : ''; ?> value="L">Laki-laki</option>
                            <option <?= ($akun['kelamin'] == 'P') ? 'selected' : ''; ?> value="P">Perempuan</option>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('kelamin'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label for="agama" class="col-sm-3 col-form-label">Agama<span class="text-danger">*</span></label>
                    <div class="col-sm-4">
                        <select id="agama" name="agama" class="form-control form-select <?= ($validation->getError('agama')) ? 'is-invalid' : ''; ?>" required>
                            <option selected value="">--- Pilih ---</option>
                            <?php foreach ($agama as $a) : ?>
                                <option <?= ($a['id'] == $akun['agama']) ? 'selected' : ''; ?> value="<?= $a['id'] ?>"><?= $a['agama']; ?></option>
                            <?php endforeach ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('agama'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label for="alamat" class="col-sm-3 col-form-label">Alamat<span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control <?= ($validation->getError('alamat')) ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" value="<?= $akun['alamat']; ?>" required placeholder="Jalan, Perumahan, No, RT, RW, Dusun, Desa/Kelurahan">
                        <div class="invalid-feedback">
                            <?= $validation->getError('alamat'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label for="alamat_provinsi" class="col-sm-2 col-form-label offset-sm-1">Provinsi<span class="text-danger">*</span></label>
                    <div class="col-sm-5">
                        <select id="alamat_provinsi" name="alamat_provinsi" class="form-control form-select <?= ($validation->getError('alamat_provinsi')) ? 'is-invalid' : ''; ?>" required onchange="CariAlamatKabupaten(this.options[this.selectedIndex]);" onload="halo();">
                            <option value="">--- Pilih ---</option>
                            <?php foreach ($provinsi as $prov) : ?>
                                <option <?= ($prov['id'] == $akun['alamat_provinsi']) ? 'selected' : ''; ?> value="<?= $prov['id'] ?>"><?= $prov['name']; ?></option>
                            <?php endforeach ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('alamat_provinsi'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label for="alamat_kabupaten" class="col-sm-2 col-form-label offset-sm-1">Kabupaten/Kota<span class="text-danger">*</span></label>
                    <div class="col-sm-5">
                        <select id="alamat_kabupaten" name="alamat_kabupaten" class="form-control form-select <?= ($validation->getError('alamat_kabupaten')) ? 'is-invalid' : ''; ?>" required onchange="CariAlamatKecamatan(this.options[this.selectedIndex]);">
                            <option selected value="">--- Pilih ---</option>
                            <?= $kabupaten ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('alamat_kabupaten'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label for="alamat_kecamatan" class="col-sm-2 col-form-label offset-sm-1">Kecamatan<span class="text-danger">*</span></label>
                    <div class="col-sm-5">
                        <select id="alamat_kecamatan" name="alamat_kecamatan" class="form-control form-select <?= ($validation->getError('alamat_kecamatan')) ? 'is-invalid' : ''; ?>" required>
                            <option selected value="">--- Pilih ---</option>
                            <?= $kecamatan ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('alamat_kecamatan'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label for="kode_pos" class="col-sm-2 col-form-label offset-sm-1">Kode Pos<span class="text-danger">*</span></label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control <?= ($validation->getError('kode_pos')) ? 'is-invalid' : ''; ?>" id="kode_pos" name="kode_pos" value="<?= $akun['kode_pos']; ?>" required>
                        <div class="invalid-feedback">
                            <?= $validation->getError('kode_pos'); ?>
                        </div>
                    </div>
                </div>
                <hr>
                <h2>Data Diri</h2>
                <div class="form-group row mb-1">
                    <label for="iq" class="col-sm-3 col-form-label">Score IQ<span class="text-danger">*</span></label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control <?= ($validation->getError('iq')) ? 'is-invalid' : ''; ?>" id="iq" name="iq" value="<?= $akun['iq']; ?>" maxlength="3" required>
                        <div class="invalid-feedback">
                            <?= $validation->getError('iq'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label for="tinggi_badan" class="col-sm-3 col-form-label">Tinggi Badan<span class="text-danger">*</span></label>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <input type="text" class="form-control <?= ($validation->getError('tinggi_badan')) ? 'is-invalid' : ''; ?>" id="tinggi_badan" name="tinggi_badan" value="<?= $akun['tinggi_badan']; ?>" maxlength="3" required>
                            <span class="input-group-text" id="inputGroupPrepend2">Cm</span>
                            <div class="invalid-feedback">
                                <?= $validation->getError('tinggi_badan'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label for="berat_badan" class="col-sm-3 col-form-label">Berat Badan<span class="text-danger">*</span></label>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <input type="text" class="form-control <?= ($validation->getError('berat_badan')) ? 'is-invalid' : ''; ?>" id="berat_badan" name="berat_badan" value="<?= $akun['berat_badan']; ?>" maxlength="3" required>
                            <span class="input-group-text" id="inputGroupPrepend2">Kg</span>
                            <div class="invalid-feedback">
                                <?= $validation->getError('berat_badan'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label for="golongan_darah" class="col-sm-3 col-form-label">Golongan Darah<span class="text-danger">*</span></label>
                    <div class="col-sm-3">
                        <select id="golongan_darah" name="golongan_darah" class="form-control form-select <?= ($validation->getError('golongan_darah')) ? 'is-invalid' : ''; ?>" required>
                            <option selected value="">--- Pilih ---</option>
                            <option <?= ($akun['golongan_darah'] == 'A') ? 'selected' : ''; ?> value="A">A</option>
                            <option <?= ($akun['golongan_darah'] == 'B') ? 'selected' : ''; ?> value="B">B</option>
                            <option <?= ($akun['golongan_darah'] == 'AB') ? 'selected' : ''; ?> value="AB">AB</option>
                            <option <?= ($akun['golongan_darah'] == 'O') ? 'selected' : ''; ?> value="O">O</option>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('golongan_darah'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label for="riwayat_penyakit" class="col-sm-3 col-form-label">Riwayat Penyakit</label>
                    <div class="col-sm-5">
                        <textarea cols="70" rows="3" class="<?= ($validation->getError('riwayat_penyakit')) ? 'is-invalid' : ''; ?>" id="riwayat_penyakit" name="riwayat_penyakit" maxlength="256" placeholder="Isikan riwayat penyakit yang pernah diderita beserta tahun sembuh, gunakan koma(,) jika lebih dari satu. Contoh: Nama penyakit(2020)&#10;Jika tidak ada tidak perlu diisi, atau dapat diisi dengan -."><?= $akun['riwayat_penyakit']; ?></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('riwayat_penyakit'); ?>
                        </div>
                    </div>
                </div>
                <hr>
                <h2>Kontak</h2>
                <div class="form-group row mb-1">
                    <label for="email" class="col-sm-3 col-form-label">Email<span class="text-danger">*</span></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control is-valid" id="email" name="email" value="<?= $akun['email']; ?>" readonly>
                        <div class="valid-feedback">
                            Email menjadi username, dan tidak bisa di update.
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label for="telp" class="col-sm-3 col-form-label">Nomor Telepon<span class="text-danger">*</span></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control <?= ($validation->getError('telp')) ? 'is-invalid' : ''; ?>" id="telp" name="telp" value="<?= $akun['telp']; ?>" required>
                        <div class="invalid-feedback">
                            <?= $validation->getError('telp'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label for="hp" class="col-sm-3 col-form-label">Nomor HP<span class="text-danger">*</span></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control <?= ($validation->getError('hp')) ? 'is-invalid' : ''; ?>" id="hp" name="hp" value="<?= $akun['hp']; ?>" required>
                        <div class="invalid-feedback">
                            <?= $validation->getError('hp'); ?>
                        </div>
                    </div>
                </div>
                <hr>
                <h2>Data Ukuran</h2>
                <div class="form-group row mb-1">
                    <label for="baju_seragam" class="col-sm-3 col-form-label">Baju Seragam<span class="text-danger">*</span></label>
                    <div class="col-sm-2">
                        <select class="form-control form-select <?= ($validation->getError('baju_seragam')) ? 'is-invalid' : ''; ?>" name="baju_seragam" id="baju_seragam" required>
                            <option value="">-- Pilih --</option>
                            <?php foreach ($ukuranbaju as $ub) : ?>
                                <option <?= ($ub['ukuran'] == $akun['baju_seragam']) ? 'selected' : ''; ?> value="<?= $ub['ukuran']; ?>"><?= $ub['ukuran']; ?></option>
                            <?php endforeach ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('baju_seragam'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label for="baju_olahraga" class="col-sm-3 col-form-label">Baju Olahraga<span class="text-danger">*</span></label>
                    <div class="col-sm-2">
                        <select class="form-control form-select <?= ($validation->getError('baju_olahraga')) ? 'is-invalid' : ''; ?>" name="baju_olahraga" id="baju_seragam" required>
                            <option value="">-- Pilih --</option>
                            <?php foreach ($ukuranbaju as $ub) : ?>
                                <option <?= ($ub['ukuran'] == $akun['baju_olahraga']) ? 'selected' : ''; ?> value="<?= $ub['ukuran']; ?>"><?= $ub['ukuran']; ?></option>
                            <?php endforeach ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('baju_olahraga'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label for="sepatu_sekolah" class="col-sm-3 col-form-label">Sepatu Sekolah<span class="text-danger">*</span></label>
                    <div class="col-sm-2">
                        <select class="form-control form-select <?= ($validation->getError('sepatu_sekolah')) ? 'is-invalid' : ''; ?>" name="sepatu_sekolah" id="baju_seragam" required>
                            <option value="">-- Pilih --</option>
                            <?php foreach ($ukuransepatu as $us) : ?>
                                <option <?= ($us['ukuran'] == $akun['sepatu_sekolah']) ? 'selected' : ''; ?> value="<?= $us['ukuran']; ?>"><?= $us['ukuran']; ?></option>
                            <?php endforeach ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('sepatu_sekolah'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label for="sepatu_olahraga" class="col-sm-3 col-form-label">Sepatu Olahraga<span class="text-danger">*</span></label>
                    <div class="col-sm-2">
                        <select class="form-control form-select <?= ($validation->getError('sepatu_olahraga')) ? 'is-invalid' : ''; ?>" name="sepatu_olahraga" id="sepatu_olahraga" required>
                            <option value="">-- Pilih --</option>
                            <?php foreach ($ukuransepatu as $us) : ?>
                                <option <?= ($us['ukuran'] == $akun['sepatu_olahraga']) ? 'selected' : ''; ?> value="<?= $us['ukuran']; ?>"><?= $us['ukuran']; ?></option>
                            <?php endforeach ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('sepatu_olahraga'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label for="lingkar_kepala" class="col-sm-3 col-form-label">Lingkar Kepala<span class="text-danger">*</span></label>
                    <div class="col-sm-2">
                        <select class="form-control form-select <?= ($validation->getError('lingkar_kepala')) ? 'is-invalid' : ''; ?>" name="lingkar_kepala" id="lingkar_kepala" required>
                            <option value="">-- Pilih --</option>
                            <?php foreach ($ukurankepala as $uk) : ?>
                                <option <?= ($uk['ukuran'] == $akun['lingkar_kepala']) ? 'selected' : ''; ?> value="<?= $uk['ukuran']; ?>"><?= $uk['ukuran']; ?></option>
                            <?php endforeach ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('lingkar_kepala'); ?>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-group row my-3">
                    <div class="offset-sm-3">
                        <button class="btn btn-primary" type="submit">Simpan Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <div class="card text-white bg-secondary my-3 py-4 text-center">
        <div class="card-body">
            <p class="text-white m-0">Bergabung di Universitas Pertahanan RI dan menjadi Kader Intelektual Bela Negara.</p>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>