<?= $this->extend('panitia/layout/template'); ?>

<?= $this->section('content'); ?>

<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <h3>Profile Statistics</h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon purple">
                                            <i class="iconly-boldShow"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Jumlah Akun</h6>
                                        <h6 class="font-extrabold mb-0"><?= $akun; ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon blue">
                                            <i class="iconly-boldProfile"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Jumlah Akun Aktif</h6>
                                        <h6 class="font-extrabold mb-0"><?= $aktif; ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon green">
                                            <i class="iconly-boldAdd-User"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Jumlah Pendaftar</h6>
                                        <h6 class="font-extrabold mb-0"><?= $jumlah_pendaftar; ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-5">
                        <div class="card">
                            <div class="card-header">
                                <h4>Rekap Data Pendaftar</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Program Studi</th>
                                            <th>Pilihan 1</th>
                                            <th>Pilihan 2</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php $db = db_connect(); ?>
                                        <?php foreach ($data_prodi as $dp) : ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $dp['program_studi']; ?></td>
                                                <?php
                                                $jumlah_prodi1 = $db->query("select * from pendaftar where prodi1 = " . $dp['id'] . "")->getNumRows();
                                                ?>
                                                <td><?= $jumlah_prodi1; ?></td>
                                                <?php
                                                $jumlah_prodi2 = $db->query("select * from pendaftar where prodi2 = " . $dp['id'] . "")->getNumRows();
                                                ?>
                                                <td><?= $jumlah_prodi2; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                        <?php $db->close(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="card">
                            <div class="card-header">
                                <h4>Rekap Data Provinsi dari Pendaftar</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Provinsi</th>
                                            <th>Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php $db = db_connect(); ?>
                                        <?php foreach ($provinsi as $p) : ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $p['name']; ?></td>
                                                <?php
                                                $jumlah_provinsi = $db->query("select b.id from akun a, pendaftar b, akun_sekolah c where a.id = b.akun and a.id = c.akun and b.gelombang = 2 and c.sekolah_provinsi = " . $p['id'] . "")->getNumRows();
                                                ?>
                                                <td><?= $jumlah_provinsi; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                        <?php $db->close(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="card">
                            <div class="card-header">
                                <h4>Rekap Kelamin Pendaftar</h4>
                            </div>
                            <div class="card-body">
                                <!-- <div id="chart-visitors-profile"></div> -->
                                <table>
                                    <tbody>
                                        <?php
                                        $db = db_connect();
                                        $laki = $db->query("select p.id from akun a, pendaftar p where a.id = p.akun and p.gelombang = 2 and kelamin = 'L'")->getNumRows();
                                        $db->close();
                                        ?>
                                        <tr>
                                            <td>Laki-Laki</td>
                                            <td>:</td>
                                            <td><?= $laki; ?></td>
                                        </tr>
                                        <?php
                                        $db = db_connect();
                                        $perempuan = $db->query("select p.id from akun a, pendaftar p where a.id = p.akun and p.gelombang = 2 and kelamin = 'P'")->getNumRows();
                                        $db->close();
                                        ?>
                                        <tr>
                                            <td>Perempuan</td>
                                            <td>:</td>
                                            <td><?= $perempuan; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Pendaftar</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-profile-visit"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-xl-4">
                        <div class="card">
                            <div class="card-header">
                                <h4>Profile Visit</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="d-flex align-items-center">
                                            <svg class="bi text-primary" width="32" height="32" fill="blue" style="width:10px">
                                                <use xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill" />
                                            </svg>
                                            <h5 class="mb-0 ms-3">Europe</h5>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <h5 class="mb-0">862</h5>
                                    </div>
                                    <div class="col-12">
                                        <div id="chart-europe"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="d-flex align-items-center">
                                            <svg class="bi text-success" width="32" height="32" fill="blue" style="width:10px">
                                                <use xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill" />
                                            </svg>
                                            <h5 class="mb-0 ms-3">America</h5>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <h5 class="mb-0">375</h5>
                                    </div>
                                    <div class="col-12">
                                        <div id="chart-america"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="d-flex align-items-center">
                                            <svg class="bi text-danger" width="32" height="32" fill="blue" style="width:10px">
                                                <use xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill" />
                                            </svg>
                                            <h5 class="mb-0 ms-3">Indonesia</h5>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <h5 class="mb-0">1025</h5>
                                    </div>
                                    <div class="col-12">
                                        <div id="chart-indonesia"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-8">
                        <div class="card">
                            <div class="card-header">
                                <h4>Latest Comments</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-lg">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Comment</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="col-3">
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar avatar-md">
                                                            <img src="assets/images/faces/5.jpg">
                                                        </div>
                                                        <p class="font-bold ms-3 mb-0">Si Cantik</p>
                                                    </div>
                                                </td>
                                                <td class="col-auto">
                                                    <p class=" mb-0">Congratulations on your graduation!</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="col-3">
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar avatar-md">
                                                            <img src="assets/images/faces/2.jpg">
                                                        </div>
                                                        <p class="font-bold ms-3 mb-0">Si Ganteng</p>
                                                    </div>
                                                </td>
                                                <td class="col-auto">
                                                    <p class=" mb-0">Wow amazing design! Can you make another
                                                        tutorial for
                                                        this design?</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="row">
            <div class="col-12 col-lg-3">
                <div class="card">
                    <div class="card-body py-4 px-5">
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl">
                                <img src="assets/images/faces/1.jpg" alt="Face 1">
                            </div>
                            <div class="ms-3 name">
                                <h5 class="font-bold">John Duck</h5>
                                <h6 class="text-muted mb-0">@johnducky</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<?= $this->endSection(); ?>