<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container my-3">
	<div class="row">
		<H3>Beranda Calon Mahasiswa</H3>
		<hr>
		<!-- Left Side -->
		<?= $this->include('layout/user-left-sidebar'); ?>

		<!-- Contents -->
		<div class="col-9">
			<?php if (empty($riwayat_daftar)) : ?>
				<div class="alert alert-info" role="alert">
					<h4>Belum ada riwayat pendaftaran</h4>
				</div>
				<p>Sebelum melakukan pendaftaran silahkan lengkapi data berikut:</p>
				<ol>
					<li>Datadiri</li>
					<li>Upload pasfoto</li>
					<li>Data orang tua</li>
					<li>Sekolah asal dan nilai</li>
					<li>Dokumen administrasi</li>
				</ol>
				<p>Jika mengalami kendala saat melakukan pendaftaran silahkan hubungi Panitia PMB ITS atau email <span class="badge bg-info text-wrap">support.pmb@tik.idu.ac.id</span></p>
			<?php else : ?>
				<?php if (session()->getFlashdata('message')) {
					echo session()->getFlashdata('message');
				} ?>
				<div class="alert alert-info" role="alert">
					<h4>Data Diri <a href=""><img src="/img/printer.svg"></a></h4>
				</div>
				<div class="row">
					<?php $path = '/uploads/img/'; ?>
					<img class="col-sm-2 img-thumbnail mx-auto" src="<?= base_url(); ?><?= ($akun['photo'] !== 'default.png') ? $path .= $akun['photo'] : '/img/default.png'; ?>">
					<div class="col-sm-8">
						<table class="table">
							<tbody>
								<tr>
									<td>Nama</td>
									<td><?= $akun['nama']; ?></td>
								</tr>
								<tr>
									<td>Email</td>
									<td><?= $akun['email']; ?></td>
								</tr>
								<tr>
									<td>TTL</td>
									<td><?= $akun['tmp_lahir'] . ', ' . $akun['tgl_lahir']; ?></td>
								</tr>
								<tr>
									<td>Asal Sekolah</td>
									<td><?= $sekolah['sekolah_nama']; ?></td>
								</tr>
								<tr>
									<td>Kompetensi Keahlian</td>
									<td><?= $kompetensi['kompetensi_keahlian']; ?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="alert alert-info my-2" role="alert">
					<h4>Riwayat Pendaftaran</h4>
				</div>
				<table class="table">
					<tbody>
						<?php $db = db_connect(); ?>
						<?php foreach ($riwayat_daftar as $rd) : ?>
							<tr class="table-primary">
								<td colspan="2" class="table-primary">
									<?php $gel = $db->query('SELECT gelombang FROM gelombang WHERE id = ' . $rd['gelombang'] . '')->getRowArray(); ?>
									<h6><?= $gel['gelombang']; ?></h6>
								</td>
								<td><img src="/img/printer.svg"></td>
							</tr>
							<tr>
								<td class="align-middle" rowspan="2">
									<h4>Nomor Daftar: <?= $rd['nomor']; ?></h4>
								</td>
								<td>Pilihan Ke-1</td>
								<?php $pil1 = $db->query('SELECT * FROM program_studi WHERE id = ' . $rd['prodi1'] . '')->getRowArray(); ?>
								<td><?= $pil1['program_studi']; ?></td>
							</tr>
							<tr>
								<td>Pilihan Ke-2</td>
								<?php $pil2 = $db->query('SELECT * FROM program_studi WHERE id = ' . $rd['prodi2'] . '')->getRowArray(); ?>
								<td><?= $pil2['program_studi']; ?></td>
							</tr>
							<tr>
								<?php $status = $db->query('SELECT * FROM status WHERE id = ' . $rd['status'] . '')->getRowArray(); ?>
								<td colspan="3">Status: <?= $status['status']; ?></td>
							</tr>
						<?php endforeach; ?>
						<?php $db->close(); ?>
					</tbody>
				</table>
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