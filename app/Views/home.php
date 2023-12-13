<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
	<!-- Heading Row -->
	<?php if (session()->getFlashdata('message')) {
		echo session()->getFlashdata('message');
	} ?>
	<div class="row align-items-center my-3">
		<div class="col-lg-7">
			<img class="img-fluid rounded mb-4 mb-lg-0" src="<?= base_url(); ?>/img/unhan.png" alt="">
		</div>
		<!-- /.col-lg-8 -->
		<div class="col-lg-5">
			<h2 class="font-weight-light">Penerimaan Mahasiswa Baru</h2>
			<p>Universitas Pertahanan RI memberikan beasiswa kepada putra putri terbaik bangsa.</p>
			<a class="btn btn-primary" href="create">Buat Akun</a>
		</div>
		<!-- /.col-md-4 -->
	</div>
	<!-- /.row -->

	<div class="alert alert-primary" role="alert">
		<h4 class="alert-heading">Pengumuman</h4>
	</div>

	<div class="alert alert-info" role="alert">
		<p>Daftar nama peserta lolos Tes Potensi Skolastik (TPS), <i>Test of English As A Foreign Language</i> (TOEFL) dan Pemeriksaan Psikologi Seleksi Penerimaan Mahasiswa Baru Program D-3 Fakultas Logistik Militer Unhan RI TA. 2022/2023.</p>
		<a class="btn btn-primary" href="http://cloud.idu.ac.id/index.php/s/aEQH9RN923pNFW8" target="_blank">Link</a>
	</div>

	<div class="alert alert-danger" role="alert">
		<p>Jadwal kedatangan peserta tes offline calon Kadet Mahasiswa S1 Unhan RI yang semula tanggal 1 Juni 2022 diubah menjadi tanggal 2 Juni 2022.</p>
	</div>
	<div class="alert alert-info" role="alert">
		<p>Pendaftaran online Program Vokasi/D3 TA. 2022/2023 mulai tanggal 1 Mei s.d 5 Juni 2022</p>
	</div>

	<div class="alert alert-info" role="alert">
		<!-- <p>Penerimaan Kadet Unhan RI TA 2022/2023.</p> -->
		<p>Daftar nama peserta lolos Tes Potensi Skolastik (TPS), <i>Test of English As A Foreign Language</i> (TOEFL) dan Pemeriksaan Psikologi Seleksi Penerimaan Mahasiswa Baru Program Sarjana (S-1) Unhan RI TA. 2022/2023.</p>
		<a class="btn btn-primary" href="http://cloud.idu.ac.id/index.php/s/JLfosdSwQDxFLm5" target="_blank">Link</a>
	</div>

	<!-- Call to Action Well -->
	<div class="card text-white bg-secondary my-3 py-4 text-center">
		<div class="card-body">
			<p class="text-white m-0">Bergabung di Universitas Pertahanan dan menjadi Kader Intelektual Bela Negara.</p>
		</div>
	</div>
</div>
<?= $this->endSection(); ?>