<?= $this->extend('panitia/layout/template'); ?>

<?= $this->section('content'); ?>

<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Verifikasi Data Pendaftar</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/panitia">Panitia</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Verifikasi</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <!-- Data Diri -->
            <div class="row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Pendaftar</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-1 row">
                                <label for="staticEmail" class="col-sm-3 col-form-label">Nama</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $akun['nama']; ?>">
                                </div>
                            </div>
                            <div class="mb-1 row">
                                <label for="staticEmail" class="col-sm-3 col-form-label">NIK</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" value="<?= $akun['nik']; ?>">
                                </div>
                            </div>
                            <div class="mb-1 row">
                                <label for="staticEmail" class="col-sm-3 col-form-label">Tempat Tanggal Lahir</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" value="<?= $akun['tmp_lahir'] . ', ' . $akun['tgl_lahir']; ?>">
                                </div>
                            </div>
                            <div class="mb-1 row">
                                <label for="staticEmail" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" value="<?= ($akun['kelamin'] == 'L') ? 'Laki-laki' : 'Perempuan'; ?>">
                                </div>
                            </div>
                            <div class="mb-1 row">
                                <label for="staticEmail" class="col-sm-3 col-form-label">Agama</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" value="<?= $akun['agama']; ?>">
                                </div>
                            </div>
                            <div class="mb-1 row">
                                <label for="staticEmail" class="col-sm-3 col-form-label">Alamat</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $akun['alamat']; ?>">
                                </div>
                            </div>
                            <div class="mb-1 row">
                                <label for="staticEmail" class="col-sm-2 offset-sm-1 col-form-label">Kecamatan</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $akun['alamat_kecamatan']; ?>">
                                </div>
                            </div>
                            <div class="mb-1 row">
                                <label for="staticEmail" class="col-sm-2 offset-sm-1 col-form-label">Kabupaten/Kota</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $akun['alamat_kabupaten']; ?>">
                                </div>
                            </div>
                            <div class="mb-1 row">
                                <label for="staticEmail" class="col-sm-2 offset-sm-1 col-form-label">Provinsi</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $akun['alamat_provinsi']; ?>">
                                </div>
                            </div>
                            <div class="mb-1 row">
                                <label for="staticEmail" class="col-sm-3 col-form-label">Kode Pos</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" value="<?= $akun['kode_pos']; ?>">
                                </div>
                            </div>
                            <div class="mb-1 row">
                                <label for="staticEmail" class="col-sm-3 col-form-label">Telp</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="<?= $akun['telp']; ?>">
                                </div>
                            </div>
                            <div class="mb-1 row">
                                <label for="staticEmail" class="col-sm-3 col-form-label">HP</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="<?= $akun['hp']; ?>">
                                </div>
                            </div>
                            <hr>
                            <div class="mb-1 row">
                                <label for="staticEmail" class="col-sm-3 col-form-label">IQ</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" value="<?= $akun['iq']; ?>">
                                </div>
                            </div>
                            <div class="mb-1 row">
                                <label for="staticEmail" class="col-sm-3 col-form-label">Tinggi Badan</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" value="<?= $akun['tinggi_badan']; ?>">
                                </div>
                            </div>
                            <div class="mb-1 row">
                                <label for="staticEmail" class="col-sm-3 col-form-label">Berat Badan</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" value="<?= $akun['berat_badan']; ?>">
                                </div>
                            </div>
                            <div class="mb-1 row">
                                <label for="staticEmail" class="col-sm-3 col-form-label">Golongan Darah</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" value="<?= $akun['golongan_darah']; ?>">
                                </div>
                            </div>
                            <div class="mb-1 row">
                                <label for="staticEmail" class="col-sm-3 col-form-label">Riwayat Penyakit</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?= $akun['riwayat_penyakit']; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Foto -->
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Foto</h4>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <?php $path = '/uploads/img/'; ?>
                                <img src="<?= base_url(); ?><?= $path .= $akun['photo']; ?>" class="img-thumbnail mx-auto" width="70%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Sekolah Asal</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-7">
                                    <div class="mb-1 row">
                                        <label for="staticEmail" class="col-sm-3 col-form-label">Nama Sekolah</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="<?= $sekolah['sekolah_nama']; ?>">
                                        </div>
                                    </div>
                                    <div class="mb-1 row">
                                        <label for="staticEmail" class="col-sm-3 col-form-label">Alamat Sekolah</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="<?= $sekolah['sekolah_alamat']; ?>">
                                        </div>
                                    </div>
                                    <div class="mb-1 row">
                                        <label for="staticEmail" class="col-sm-2 offset-sm-1 col-form-label">Kecamatan</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="<?= $sekolah['sekolah_kecamatan']; ?>">
                                        </div>
                                    </div>
                                    <div class="mb-1 row">
                                        <label for="staticEmail" class="col-sm-2 offset-sm-1 col-form-label">Kab./Kota</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="<?= $sekolah['sekolah_kabupaten']; ?>">
                                        </div>
                                    </div>
                                    <div class="mb-1 row">
                                        <label for="staticEmail" class="col-sm-2 offset-sm-1 col-form-label">Provinsi</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="<?= $sekolah['sekolah_provinsi']; ?>">
                                        </div>
                                    </div>
                                    <div class="mb-1 row">
                                        <label for="staticEmail" class="col-sm-3 col-form-label">Telepon Sekolah</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="<?= $sekolah['sekolah_telp']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <!-- Sisi Kanan (Data Sekolah Asal) -->
                                <div class="col-5">
                                    <div class="mb-1 row">
                                        <label for="staticEmail" class="col-sm-3 col-form-label">Status Sekolah</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="<?= $sekolah['sekolah_status']; ?>">
                                        </div>
                                    </div>
                                    <div class="mb-1 row">
                                        <label for="staticEmail" class="col-sm-3 col-form-label">Jenis Sekolah</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="<?= $sekolah['sekolah_jenis']; ?>">
                                        </div>
                                    </div>
                                    <div class="mb-1 row">
                                        <label for="staticEmail" class="col-sm-3 col-form-label">Akreditasi</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="<?= $sekolah['sekolah_akreditasi']; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <h4>Data Nilai</h4>
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
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
</div>

<?= $this->endSection(); ?>