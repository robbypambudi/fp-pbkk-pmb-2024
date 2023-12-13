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
            <h3>Upload Foto</h3>
            <?php if (session()->getFlashdata('message')) {
                echo session()->getFlashdata('message');
            } ?>
            <div class="row">
                <div class="col-sm-5">
                    <div class="text-center">
                        <?php $path = '/uploads/img/'; ?>
                        <img src="<?= base_url(); ?><?= ($akun['photo'] !== 'default.png') ? $path .= $akun['photo'] : '/img/default.png'; ?>" class="img-thumbnail mx-auto" width="200px">
                    </div>
                    <form method="POST" action="pasfoto/upload" enctype="multipart/form-data">
                        <div class="form-group row my-3">
                            <label for="photo" class="col-sm-3 col-form-label">Pilih Foto<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control <?= ($validation->getError('photo')) ? 'is-invalid' : ''; ?>" id="photo" name="photo">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('photo'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row my-3">
                            <div class="col-sm-9 offset-sm-3">
                                <button class="btn btn-primary" type="submit">Upload</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-sm-5">
                    <ul>
                        <li>Pasfoto berwarna memakai seragam SMA dengan latar belakang putih</li>
                        <li>Pasfoto maksimal berukuran <span class="badge bg-info text-wrap">500 Kb</span></li>
                        <li>Pasfoto hanya diijinkan dengan ektensi <span class="badge bg-info text-wrap">.jpg</span>, <span class="badge bg-info text-wrap">.jpeg</span> dan <span class="badge bg-info text-wrap">.png</span></li>
                        <li>Pasfoto akan digunakan di lembar formulir dan lembar ujian</li>
                        <li>Untuk mengganti foto silahkan upload ulang</li>
                    </ul>
                </div>
            </div>
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