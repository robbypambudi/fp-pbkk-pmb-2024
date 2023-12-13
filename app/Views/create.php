<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container my-2">
	<h1>Buat Akun</h1>
	<hr>
	<?php if (session()->getFlashdata('message')) : ?>
		<div class="alert alert-info" role="alert">
			<?= session()->getFlashdata('message'); ?>
		</div>
	<?php endif; ?>
	<h3>Identitas</h3>
	<form method="POST" action="create/save">
		<?= csrf_field(); ?>
		<div class="my-2 mb-1 row">
			<label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
			<div class="col-sm-6">
				<input type="text" class="form-control <?= ($validation->getError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= old('nama'); ?>" placeholder="Sesuai akta kelahiran/ijaza terakhir dan tanpa gelar">
				<div class="invalid-feedback">
					<?= $validation->getError('nama'); ?>
				</div>
			</div>
		</div>
		<h3 class="my-3">Kontak</h3>
		<div class="mb-1 row">
			<label for="email" class="col-sm-2 col-form-label">Email</label>
			<div class="col-sm-6">
				<input type="text" class="form-control <?= ($validation->getError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= old('email'); ?>" placeholder="Pastikan email yang digunakan aktif">
				<div class="invalid-feedback">
					<?= $validation->getError('email'); ?>
				</div>
			</div>
		</div>
		<div class="mb-1 row">
			<label for="password" class="col-sm-2 col-form-label">Password</label>
			<div class="col-sm-6">
				<input type="password" class="form-control <?= ($validation->getError('password')) ? 'is-invalid' : ''; ?>" id="password" name="password">
				<div class="invalid-feedback">
					<?= $validation->getError('password'); ?>
				</div>
			</div>
		</div>
		<div class="mb-1 row">
			<label for="confirm-password" class="col-sm-2 col-form-label">Konfirmasi Password</label>
			<div class="col-sm-6">
				<input type="password" class="form-control <?= ($validation->getError('confirm-password')) ? 'is-invalid' : ''; ?>" id="confirm-password" name="confirm-password">
				<div class="invalid-feedback">
					<?= $validation->getError('confirm-password'); ?>
				</div>
			</div>
		</div>
		<div class="mb-3 row">
			<div class="col-sm-6 offset-sm-2">
				<div class="g-recaptcha" data-sitekey="<?= env('SITEKEY') ?>"></div>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-6 offset-sm-2">
				<button class="btn btn-success col-3" type="submit">Buat Akun</button>
			</div>
		</div>
	</form>
</div>

<?= $this->endSection(); ?>