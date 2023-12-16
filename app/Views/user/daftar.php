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
            <h3>Buat Pendaftaran</h3>
            <?php if (session()->getFlashdata('message')) {
                echo session()->getFlashdata('message');
            } ?>
            <div class="row">
                <div class="col-sm-12">
                    <?php if (empty($gelombang)) : ?>
                        <div class="alert alert-info" role="alert">
                            Saat ini tidak ada penerimaan mahasiswa baru atau periode penerimaan belum mulai/sudah selesai.
                        </div>
                    <?php else : ?>
                        <form method="POST" action="daftar/proses">
                            <?php foreach ($gelombang as $g) : ?>
                                <div class="alert alert-info" role="alert">
                                    <h4><?= $g['gelombang']; ?></h4>
                                    <!-- <hr>
                                    Pendaftaran online mulai <?= date('d-M-Y', strtotime($g['mulai'])); ?> sampai dengan <?= date('d-M-Y', strtotime($g['selesai'])); ?> Waktu Indonesia Barat (WIB) UTC+7 -->
                                </div>
                                <div class="row">
                                    <?php
                                    $idgelombang = $g['id'];
                                    $db = db_connect();
                                    $query = $db->query("select b.id, b.program_studi from gelombang_prodi a, program_studi b where gelombang = (" . $idgelombang . ") and a.prodi = b.id");
                                    $prodi_gelombang = $query->getResultArray();
                                    $db->close();
                                    ?>
                                    <input type="hidden" id="idgel" name="idgel" value="<?= $g['id']; ?>">
                                    <input type="hidden" id="kodegel" name="kodegel" value="<?= $g['kode']; ?>">
                                    <?php if (empty($prodi_gelombang)) : ?>
                                        <div class="alert alert-info" role="alert">
                                            Tidak ada program studi di set.
                                        </div>
                                    <?php else : ?>
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Program Studi</th>
                                                    <th>Pilihan Ke-1</th>
                                                    <th>Pilihan Ke-2</th>
                                                    </th>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($prodi_gelombang as $pg) : ?>
                                                    <tr>
                                                        <td><?= $i; ?></td>
                                                        <td><?= $pg['program_studi']; ?></td>
                                                        <td>
                                                            <input class="form-check-input" type="radio" name="pilihan1" id="pilihan1" value="<?= $pg['id']; ?>">
                                                        </td>
                                                        <td>
                                                            <input class="form-check-input" type="radio" name="pilihan2" id="pilihan2" value="<?= $pg['id']; ?>">
                                                        </td>
                                                    </tr>
                                                    <?php $i++; ?>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                            <button id="buat-pendaftaran" name="buat-pendaftaran" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Buat Pendaftaran</button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Penting</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h4>Dengan ini menyatakan sebagai berikut:</h4>
                                            <ol>
                                                <li>Data yang masukkan adalah benar.</li>
                                                <li>Jika terdapat ketdaksesuaian data yang di upload dengan data asli, maka panitia akan mendiskualifikasi dari seleksi PMB.</li>
                                                <li>Tidak pernah tinggal kelas selama di SMA, SMK/setingkat.</li>
                                                <li>Mampu mengoperasikan komputer (aplikasi internet dan office).</li>
                                                <li>Bersedia ditempatkan di mana saja sebagai Kader Intelektual Bela Negara apabila sewaktu-waktu Negara membutuhkan.</li>
                                                <li>Bersedia menandatangani surat perjanjian kontrak mahasiswa dan surat pernyataan.</li>
                                                <li>Mendapat persetujuan orang tua/wali, bersedia tinggal di asrama dan sanggup mematuhi peraturan Universitas Pertahanan RI</li>
                                                <li>Bersedia untuk tidak menikah dan tidak hamil selama mengikuti pendidikan.</li>
                                                <li>Tidak sedang menerima beasiswa lain dan tidak akan menerima beasiswa lain selama mengikuti pendidikan.</li>
                                                <li>Jika pilihan prodi ke-1 dan ke-2 tidak terpenuhi, maka bersedia dipindahkan ke prodi yang ditentukan oleh ITS sesuai dengan kebutuhan</li>
                                                <li>Setelah saya memutuskan untuk melanjutkan buat pendaftaran, maka saya tidak diperbolehkan lagi update data</li>
                                            </ol>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="check-setuju" name="check-setuju" value="0" onclick="terms_changed(this)">
                                                <label class="form-check-label" for="check-setuju">
                                                    Saya telah membaca dan menyetujui seluruh isi pernyataan ini.
                                                </label>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                            <button id="lanjut-buat-pendaftaran" name="lanjut-buat-pendaftaran" type="submit" class="btn btn-primary">Lanjut Buat Pendaftaran</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    <?php endif; ?>
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