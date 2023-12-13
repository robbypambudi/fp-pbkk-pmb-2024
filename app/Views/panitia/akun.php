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
                    <h3>DataTable</h3>
                    <p class="text-subtitle text-muted">For user to check accounts</p>
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
            <form action="">
                <div class="input-group mb-3">
                    <input id="keyword" name="keyword" type="text" class="form-control" placeholder="Cari akun dalam database" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2">Cari</button>
                </div>
            </form>
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
                                <th>Email</th>
                                <th>Kelamin</th>
                                <th>Aktif</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1 + (25 * ($CurrentPage - 1)); ?>
                            <?php foreach ($akun as $a) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $a['nama']; ?></td>
                                    <td><?= $a['email']; ?></td>
                                    <td><?= $a['kelamin']; ?></td>
                                    <td><?= $a['active']; ?></td>
                                    <td><a href="#">Detail</td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?= $pager->links('akun', 'pager'); ?>
                </div>
            </div>

        </section>
    </div>
</div>

<?= $this->endSection(); ?>