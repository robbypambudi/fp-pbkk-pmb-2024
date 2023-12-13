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
            <?php if (session()->getFlashdata('message')) {
                echo session()->getFlashdata('message');
            } ?>
            <?php if (empty($gelombang)) : ?>
                <div class="alert alert-info" role="alert">
                    Saat ini tidak ada penerimaan mahasiswa baru atau periode penerimaan belum mulai/sudah selesai.<br>
                    Silahkan upload dokumen administrasi dalam kurun waktu penerimaan dibuka.
                </div>
            <?php else : ?>
                <div class="alert alert-info" role="alert">
                    <h4>Upload dokumen administrasi</h4>
                </div>
                <ul>
                    <li>File maksimal berukuran <span class="badge bg-info text-wrap">1 Mb</span></li>
                    <li>File hanya diijinkan dengan ektensi <span class="badge bg-info text-wrap">.jpg</span>, <span class="badge bg-info text-wrap">.jpeg</span> dan <span class="badge bg-info text-wrap">.png</span></li>
                    <li>Untuk melakukan pergantian, silahkan upload ulang</li>
                    <li>Bagi calon mahasiswa yang belum memiliki BPJS dan NPWP, silahkan upload dengan pernyataan berikut (substansi menyesuaikan). <a href="<?= base_url(); ?>/share/surat-pernyataan-tanpa-npwp.pdf" target="_blank" rel="noopener noreferrer">Download disini</a></li>
                    <li>Format surat ijin orang tua/wali. <a href="<?= base_url(); ?>/share/surat-ijin-orang-tua.pdf" target="_blank" rel="noopener noreferrer">Download disini</a></li>
                </ul>
                <hr>
                <?php if (!empty($validation->getError('file'))) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $validation->getError('file'); ?>
                    </div>
                <?php endif; ?>
                <?php $i = 1; ?>
                <?php foreach ($syarat_administrasi as $sa) : ?>
                    <div class="mb-3 row">
                        <?php
                        $db = db_connect();
                        $query = 'SELECT * FROM akun_administrasi WHERE akun = ' . $aid . ' AND gelombang = ' . $gelombang['id'] . ' AND jenis_administrasi = ' . $sa['id'] . '';
                        $file = $db->query($query)->getrowArray();
                        $db->close();
                        $path = '/uploads/file/';
                        ?>
                        <label class="col-sm-1 col-form-label"><?= $i; ?></label>
                        <label class="col-sm-4 col-form-label"><?= $sa['syarat']; ?></label>
                        <div class="col-sm-4">
                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#FileModal<?= $sa['id']; ?>">
                                <img width="100px" src="<?= base_url(); ?><?= (isset($file['file']) ? $path .= $file['file'] : '/img/nofile.png'); ?>" class="img-thumbnail">
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="FileModal<?= $sa['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <form method="POST" action="uploadadm/save" enctype="multipart/form-data">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"><?= $sa['syarat']; ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <?php $path2 = '/uploads/file/'; ?>
                                                <embed src="<?= base_url(); ?><?= (isset($file['file']) ? ($path2 .= $file['file']) : '/img/nofile.png'); ?>" width="100%">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <img class="col-sm-1" src="<?= base_url(); ?><?= (isset($file['file']) ? '/img/check-circle.svg' : '/img/x-square.svg'); ?>" alt="Bootstrap" width="32" height="32">
                    </div>
                    <div class="mb-row">
                        <div class="offset-sm-1">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $sa['id']; ?>">
                                Pilih file dan upload
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal<?= $sa['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form method="POST" action="uploadadm/save" enctype="multipart/form-data">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"><?= $sa['syarat']; ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <input id="jenisfile" name="jenisfile" type="hidden" value="<?= $sa['id']; ?>">
                                                <input type="file" class="form-control" id="file" name="file">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Upload</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            <?php endif; ?>
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