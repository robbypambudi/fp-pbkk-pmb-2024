<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container my-3">
	<div class="row">
		<H3>Ubah Password</H3>
		<hr>
		<!-- Left Side -->
		<?= $this->include('layout/user-left-sidebar'); ?>

		<!-- Contents -->
		<div class="col-9">
			<?php if (session()->getFlashdata('message')) {
				echo session()->getFlashdata('message');
			} ?>
			<form method="POST" action="changepassword/process">
				<?= csrf_field(); ?>
				<div class="mb-1 row">
					<label for="current-password" class="col-sm-3 col-form-label">Password Lama</label>
					<div class="col-sm-6">
						<input type="password" class="form-control <?= ($validation->getError('current-password')) ? 'is-invalid' : ''; ?>" id="current-password" name="current-password">
						<div class="invalid-feedback">
							<?= $validation->getError('current-password'); ?>
						</div>
					</div>
				</div>
				<div class="mb-2 row">
					<label for="new-password" class="col-sm-3 col-form-label">Password Baru</label>
					<div class="col-sm-6">
						<input type="password" class="form-control <?= ($validation->getError('new-password')) ? 'is-invalid' : ''; ?>" id="new-password" name="new-password">
						<div class="invalid-feedback">
							<?= $validation->getError('new-password'); ?>
						</div>
					</div>
				</div>
				<div class="mb-3 row">
					<label for="confirm-password" class="col-sm-3 col-form-label">Konfirmasi Password Baru</label>
					<div class="col-sm-6">
						<input type="password" class="form-control <?= ($validation->getError('confirm-password')) ? 'is-invalid' : ''; ?>" id="confirm-password" name="confirm-password">
						<div class="invalid-feedback">
							<?= $validation->getError('confirm-password'); ?>
						</div>
					</div>
				</div>
				<div class="mb-3 row offset-sm-3">
					<div class="g-recaptcha " data-sitekey="<?= env('SITEKEY') ?>"></div>
				</div>
				<div class="mb-3 row offset-sm-3">
					<button class="btn btn-success " style="width: 20%;" type="submit">Ubah</button>
				</div>
			</form>
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