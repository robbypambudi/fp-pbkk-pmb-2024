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
                    <a class="nav-link" aria-current="page" href="sekolah">
                        <h4>Sekolah Asal</h4>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="nilai">
                        <h4>Data Nilai</h4>
                    </a>
                </li>
            </ul>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Tambah Data Nilai
            </button>

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form method="POST" action="nilai/save" enctype="multipart/form-data">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Nilai</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-2 row">
                                    <label for="semester" class="col-sm-4 col-form-label">Semester</label>
                                    <div class="col-sm-3">
                                        <select id="semester" name="semester" class="form-select" aria-label="Default select example" required>
                                            <option value="" selected>-- Pilih --</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="rata_semester" class="col-sm-4 col-form-label">Nilai rata-rata rapor semester</label>
                                    <div class="col-sm-3">
                                        <input id="rata_semester" name="rata_semester" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <hr>

                                <div class="mb-2 row">
                                    <label for="matematika" class="offset-sm-4 col-sm-4 col-form-label">Pengetahuan</label>
                                    <div class="col-sm-4">
                                        <label for="matematika" class="col-form-label">Keterampilan</label>
                                    </div>
                                </div>

                                <div class="mb-2 row">
                                    <label for="matematika" class="col-sm-4 col-form-label">Matematika</label>
                                    <div class="col-sm-4">
                                        <input id="matematika_p" name="matematika_p" type="text" class="form-control" required>
                                    </div>
                                    <div class="col-sm-4">
                                        <input id="matematika_k" name="matematika_k" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <?php if ($sekolah['sekolah_jenis'] == 1) : ?>
                                    <!-- SMA -->
                                    <?php if ($sekolah['sekolah_bidang_keahlian'] == 1) : ?>
                                        <!-- SMA IPA -->
                                        <div class="mb-2 row">
                                            <label for="biologi" class="col-sm-4 col-form-label">Biologi</label>
                                            <div class="col-sm-4">
                                                <input id="biologi_p" name="biologi_p" type="text" class="form-control" required>
                                            </div>
                                            <div class="col-sm-4">
                                                <input id="biologi_k" name="biologi_k" type="text" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="mb-2 row">
                                            <label for="fisika" class="col-sm-4 col-form-label">Fisika</label>
                                            <div class="col-sm-4">
                                                <input id="fisika_p" name="fisika_p" type="text" class="form-control" required>
                                            </div>
                                            <div class="col-sm-4">
                                                <input id="fisika_k" name="fisika_k" type="text" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="mb-2 row">
                                            <label for="kimia" class="col-sm-4 col-form-label">Kimia</label>
                                            <div class="col-sm-4">
                                                <input id="kimia_p" name="kimia_p" type="text" class="form-control" required>
                                            </div>
                                            <div class="col-sm-4">
                                                <input id="kimia_k" name="kimia_k" type="text" class="form-control" required>
                                            </div>
                                        </div>
                                    <?php elseif ($sekolah['sekolah_bidang_keahlian'] == 2) : ?>
                                        <!-- SMA IPS -->
                                        <div class="mb-2 row">
                                            <label for="inggris" class="col-sm-4 col-form-label">Bahasa Inggris</label>
                                            <div class="col-sm-4">
                                                <input id="inggris_p" name="inggris_p" type="text" class="form-control" required>
                                            </div>
                                            <div class="col-sm-4">
                                                <input id="inggris_k" name="inggris_k" type="text" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="mb-2 row">
                                            <label for="ekonomi" class="col-sm-4 col-form-label">Ekonomi</label>
                                            <div class="col-sm-4">
                                                <input id="ekonomi_p" name="ekonomi_p" type="text" class="form-control" required>
                                            </div>
                                            <div class="col-sm-4">
                                                <input id="ekonomi_k" name="ekonomi_k" type="text" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="mb-2 row">
                                            <label for="geografi" class="col-sm-4 col-form-label">Geografi</label>
                                            <div class="col-sm-4">
                                                <input id="geografi_p" name="geografi_p" type="text" class="form-control" required>
                                            </div>
                                            <div class="col-sm-4">
                                                <input id="geografi_k" name="geografi_k" type="text" class="form-control" required>
                                            </div>
                                        </div>
                                    <?php else : ?>
                                        <!-- SMA Bahasa -->
                                        <div class="mb-2 row">
                                            <label for="inggris" class="col-sm-4 col-form-label">Bahasa Inggris</label>
                                            <div class="col-sm-4">
                                                <input id="inggris_p" name="inggris_p" type="text" class="form-control" required>
                                            </div>
                                            <div class="col-sm-4">
                                                <input id="inggris_k" name="inggris_k" type="text" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="mb-2 row">
                                            <label for="indonesia" class="col-sm-4 col-form-label">Bahasa Indonesia</label>
                                            <div class="col-sm-4">
                                                <input id="indonesia_p" name="indonesia_p" type="text" class="form-control" required>
                                            </div>
                                            <div class="col-sm-4">
                                                <input id="indonesia_k" name="indonesia_k" type="text" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="mb-2 row">
                                            <label for="asing" class="col-sm-4 col-form-label">Bahasa Asing Lainnya</label>
                                            <div class="col-sm-4">
                                                <input id="b_asing_p" name="b_asing_p" type="text" class="form-control" required>
                                            </div>
                                            <div class="col-sm-4">
                                                <input id="b_asing_k" name="b_asing_k" type="text" class="form-control" required>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php else : ?>
                                    <div class="mb-2 row">
                                        <label for="inggris" class="col-sm-4 col-form-label">Bahasa Inggris</label>
                                        <div class="col-sm-4">
                                            <input id="inggris_p" name="inggris_p" type="text" class="form-control" required>
                                        </div>
                                        <div class="col-sm-4">
                                            <input id="inggris_k" name="inggris_k" type="text" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <label for="indonesia" class="col-sm-4 col-form-label">Bahasa Indonesia</label>
                                        <div class="col-sm-4">
                                            <input id="indonesia_p" name="indonesia_p" type="text" class="form-control" required>
                                        </div>
                                        <div class="col-sm-4">
                                            <input id="indonesia_k" name="indonesia_k" type="text" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <label for="keahlian" class="col-sm-4 col-form-label">Kompetensi Keahlian</label>
                                        <div class="col-sm-4">
                                            <input id="keahlian_p" name="keahlian_p" type="text" class="form-control" required>
                                        </div>
                                        <div class="col-sm-4">
                                            <input id="keahlian_k" name="keahlian_k" type="text" class="form-control" required>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <hr>
                                <div class="mb-2 row">
                                    <label for="file" class="col-sm-4 col-form-label">File scan rapor semester</label>
                                    <div class="col-sm-5">
                                        <input id="file" name="file" type="file" class="form-control" required>
                                    </div>
                                    <div class="col-sm-5 offset-sm-4">
                                        <ul>
                                            <li>File max 1 Mb</li>
                                            <li>File hanya diijinkan dengan ektensi <span class="badge bg-info text-wrap">.pdf</span>, <span class="badge bg-info text-wrap">.jpg</span>, <span class="badge bg-info text-wrap">.jpeg</span> dan <span class="badge bg-info text-wrap">.png</span></li>
                                            <li>File scan dalam kondisi tegak dan tidak terbalik atau miring</li>
                                            <li>Untuk file lebih dari satu lembar, silahkan digabungkan menjadi satu sebelum diunggah</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <?php if (empty($nilai)) : ?>
                <div class="alert alert-danger my-2" role="alert">
                    <h4>Tidak ada data nilai</h4>
                </div>
            <?php else : ?>
                <!-- Show SMA -->
                <?php if ($sekolah['sekolah_jenis'] == 1) : ?>
                    <!-- Show SMA IPA -->
                    <?php if ($sekolah['sekolah_bidang_keahlian'] == 1) : ?>
                        <table class="table table-hover">
                            <thead>
                                <tr class="align-middle">
                                    <th rowspan="2" scope="col">Semester</th>
                                    <th rowspan="2" scope="col">Nilai Rata</th>
                                    <th colspan="2" scope="col">Matematika</th>
                                    <th colspan="2" scope="col">Biologi</th>

                                    <th colspan="2" scope="col">Fisika</th>

                                    <th colspan="2" scope="col">Kimia</th>

                                    <th rowspan="2" scope="col">File</th>
                                    <th rowspan="2" scope="col">Aksi</th>
                                </tr>
                                <tr>
                                    <th scope="col">Peng</th>
                                    <th scope="col">Ket</th>
                                    <th scope="col">Peng</th>
                                    <th scope="col">Ket</th>
                                    <th scope="col">Peng</th>
                                    <th scope="col">Ket</th>
                                    <th scope="col">Peng</th>
                                    <th scope="col">Ket</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($nilai as $n) : ?>
                                    <tr class="align-middle">
                                        <td><?= $n['semester']; ?></td>
                                        <td><?= $n['rata_semester']; ?></td>
                                        <td><?= $n['matematika_p']; ?></td>
                                        <td><?= $n['matematika_k']; ?></td>
                                        <td><?= $n['biologi_p']; ?></td>
                                        <td><?= $n['biologi_k']; ?></td>
                                        <td><?= $n['fisika_p']; ?></td>
                                        <td><?= $n['fisika_k']; ?></td>
                                        <td><?= $n['kimia_p']; ?></td>
                                        <td><?= $n['kimia_k']; ?></td>
                                        <td>
                                            <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $n['id']; ?>">
                                                <img src="<?= base_url(); ?>/img/file-earmark.svg" alt="Bootstrap">
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal<?= $n['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-xl">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">File Rapor</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <embed src="<?= base_url(); ?>/uploads/rapor/<?= $n['file']; ?>" width="100%" height="600px">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <form action="/nilai/<?= $n['id']; ?>" method="POST">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button class="btn btn-danger" type="submit"><img src="<?= base_url(); ?>/img/trash.svg" alt="Bootstrap"></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                        <!-- Show SMA IPS -->
                    <?php elseif ($sekolah['sekolah_bidang_keahlian'] == 2) : ?>
                        <table class="table table-hover">
                            <thead>
                                <tr class="align-middle">
                                    <th rowspan="2" scope="col">Semester</th>
                                    <th rowspan="2" scope="col">Nilai Rata</th>
                                    <th colspan="2" scope="col">Matematika</th>
                                    <th colspan="2" scope="col">B. Inggris</th>

                                    <th colspan="2" scope="col">Ekonomi</th>

                                    <th colspan="2" scope="col">Geografi</th>

                                    <th rowspan="2" scope="col">File</th>
                                    <th rowspan="2" scope="col">Aksi</th>
                                </tr>
                                <tr>
                                    <th scope="col">Peng</th>
                                    <th scope="col">Ket</th>
                                    <th scope="col">Peng</th>
                                    <th scope="col">Ket</th>
                                    <th scope="col">Peng</th>
                                    <th scope="col">Ket</th>
                                    <th scope="col">Peng</th>
                                    <th scope="col">Ket</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($nilai as $n) : ?>
                                    <tr class="align-middle">
                                        <td><?= $n['semester']; ?></td>
                                        <td><?= $n['rata_semester']; ?></td>
                                        <td><?= $n['matematika_p']; ?></td>
                                        <td><?= $n['matematika_k']; ?></td>
                                        <td><?= $n['inggris_p']; ?></td>
                                        <td><?= $n['inggris_k']; ?></td>
                                        <td><?= $n['ekonomi_p']; ?></td>
                                        <td><?= $n['ekonomi_k']; ?></td>
                                        <td><?= $n['geografi_p']; ?></td>
                                        <td><?= $n['geografi_k']; ?></td>
                                        <td>
                                            <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $n['id']; ?>">
                                                <img src="<?= base_url(); ?>/img/file-earmark.svg" alt="Bootstrap">
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal<?= $n['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-xl">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">File Rapor</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <embed src="<?= base_url(); ?>/uploads/rapor/<?= $n['file']; ?>" width="100%" height="600px">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <form action="/nilai/<?= $n['id']; ?>" method="POST">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button class="btn btn-danger" type="submit"><img src="<?= base_url(); ?>/img/trash.svg" alt="Bootstrap"></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    <?php else : ?>
                        <!-- Show SMA Bahasa -->
                        <table class="table table-hover">
                            <thead>
                                <tr class="align-middle">
                                    <th rowspan="2" scope="col">Semester</th>
                                    <th rowspan="2" scope="col">Nilai Rata</th>
                                    <th colspan="2" scope="col">Matematika</th>
                                    <th colspan="2" scope="col">B. Inggris</th>
                                    <th colspan="2" scope="col">B. Indonesia</th>
                                    <th colspan="2" scope="col">B. Asing Lainnya</th>
                                    <th rowspan="2" scope="col">File</th>
                                    <th rowspan="2" scope="col">Aksi</th>
                                </tr>
                                <tr>
                                    <th scope="col">Peng</th>
                                    <th scope="col">Ket</th>
                                    <th scope="col">Peng</th>
                                    <th scope="col">Ket</th>
                                    <th scope="col">Peng</th>
                                    <th scope="col">Ket</th>
                                    <th scope="col">Peng</th>
                                    <th scope="col">Ket</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($nilai as $n) : ?>
                                    <tr class="align-middle">
                                        <td><?= $n['semester']; ?></td>
                                        <td><?= $n['rata_semester']; ?></td>
                                        <td><?= $n['matematika_p']; ?></td>
                                        <td><?= $n['matematika_k']; ?></td>
                                        <td><?= $n['inggris_p']; ?></td>
                                        <td><?= $n['inggris_k']; ?></td>
                                        <td><?= $n['indonesia_p']; ?></td>
                                        <td><?= $n['indonesia_k']; ?></td>
                                        <td><?= $n['b_asing_p']; ?></td>
                                        <td><?= $n['b_asing_k']; ?></td>
                                        <td>
                                            <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $n['id']; ?>">
                                                <img src="<?= base_url(); ?>/img/file-earmark.svg" alt="Bootstrap">
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal<?= $n['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-xl">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">File Rapor</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <embed src="<?= base_url(); ?>/uploads/rapor/<?= $n['file']; ?>" width="100%" height="600px">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <form action="/nilai/<?= $n['id']; ?>" method="POST">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button class="btn btn-danger" type="submit"><img src="<?= base_url(); ?>/img/trash.svg" alt="Bootstrap"></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    <?php endif ?>
                <?php else : ?>
                    <!-- Show SMK -->
                    <table class="table table-hover">
                        <thead>
                            <tr class="align-middle">
                                <th rowspan="2" scope="col">Semester</th>
                                <th rowspan="2" scope="col">Nilai Rata</th>
                                <th colspan="2" scope="col">Matematika</th>
                                <th colspan="2" scope="col">B. Inggris</th>
                                <th colspan="2" scope="col">B. Indonesia</th>
                                <th colspan="2" scope="col">Keahlian</th>
                                <th rowspan="2" scope="col">File</th>
                                <th rowspan="2" scope="col">Aksi</th>
                            </tr>
                            <tr>
                                <th scope="col">Peng</th>
                                <th scope="col">Ket</th>
                                <th scope="col">Peng</th>
                                <th scope="col">Ket</th>
                                <th scope="col">Peng</th>
                                <th scope="col">Ket</th>
                                <th scope="col">Peng</th>
                                <th scope="col">Ket</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($nilai as $n) : ?>
                                <tr class="align-middle">
                                    <td><?= $n['semester']; ?></td>
                                    <td><?= $n['rata_semester']; ?></td>
                                    <td><?= $n['matematika_p']; ?></td>
                                    <td><?= $n['matematika_k']; ?></td>
                                    <td><?= $n['inggris_p']; ?></td>
                                    <td><?= $n['inggris_k']; ?></td>
                                    <td><?= $n['indonesia_p']; ?></td>
                                    <td><?= $n['indonesia_k']; ?></td>
                                    <td><?= $n['keahlian_p']; ?></td>
                                    <td><?= $n['keahlian_k']; ?></td>
                                    <td>
                                        <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $n['id']; ?>">
                                            <img src="<?= base_url(); ?>/img/file-earmark.svg" alt="Bootstrap">
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal<?= $n['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">File Rapor</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <embed src="<?= base_url(); ?>/uploads/rapor/<?= $n['file']; ?>" width="100%" height="600px">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <form action="/nilai/<?= $n['id']; ?>" method="POST">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn btn-danger" type="submit"><img src="<?= base_url(); ?>/img/trash.svg" alt="Bootstrap"></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>

    <!-- Call to Action Well -->
    <div class="card text-white bg-secondary my-3 py-4 text-center">
        <div class="card-body">
            <p class="text-white m-0">Bergabung di Institut Teknologi Sepuluh Nopember dan menjadi Kader Intelektual Bela Negara.</p>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>