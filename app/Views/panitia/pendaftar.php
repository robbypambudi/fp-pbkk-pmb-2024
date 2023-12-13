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
                    <h3>Data Pendaftar</h3>
                    <p class="text-subtitle text-muted">Detail dan verifikasi data pendaftar</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">DataTable</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <form method="POST" action="">
                                <div class="mb-1 row">
                                    <label for="staticEmail" class="col-sm-4 col-form-label">Nomor Daftar</label>
                                    <div class="col-sm-8">
                                        <input id="keyword" name="keyword" type="text" class="form-control" placeholder="" aria-label="Recipient's username" aria-describedby="button-addon2">
                                    </div>
                                </div>
                                <div class="mb-1 row">
                                    <label for="inputPassword" class="col-sm-4 col-form-label">Provinsi Sekolah Asal</label>
                                    <div class="col-sm-8">
                                        <select name="provinsi_sekolah" id="provinsi_sekolah" class="form-control">
                                            <option value="">Pilih Provinsi</option>
                                            <?php foreach ($data_provinsi as $dp) : ?>
                                                <option value="<?= $dp['id']; ?>"><?= $dp['name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-1 row">
                                    <div class="col-sm-8 offset-sm-4">
                                        <button class="btn btn-primary" type="submit" id="button-addon2">Cari</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-6">
                            <a href="excelpendaftars" target="blank" class="btn btn-primary">Export Excel</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    Simple Datatable
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Nomor</th>
                                <th>Pilihan 1</th>
                                <th>Pilihan 2</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1 + (25 * ($CurrentPage - 1)); ?>
                            <?php foreach ($pendaftar as $p) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $p['nama']; ?></td>
                                    <td><?= $p['nomor']; ?></td>
                                    <td><?= $p['prodi1']; ?></td>
                                    <td><?= $p['prodi2']; ?></td>
                                    <td><?= $p['status']; ?></td>
                                    <td><a href="/panitia/verifikasi?nomor=<?= $p['nomor']; ?>">Verifikasi</td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?= $pager->links('pendaftar', 'pager'); ?>
                </div>
            </div>

        </section>
    </div>
</div>

<?= $this->endSection(); ?>