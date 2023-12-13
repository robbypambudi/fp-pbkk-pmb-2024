<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container my-3">
	<div class="row">
		<!-- Left Side -->
		<div class="col-10">
			<h4>Masukkan Password Baru</h4>
			<hr>
			<?php if (session()->getFlashdata('message')) {
				echo session()->getFlashdata('message');
			} ?>
			<form method="POST" action="/forgotpassword/change">
				<?= csrf_field(); ?>
				<div class="mb-2 row">
					<label for="password1" class="col-sm-2 col-form-label">Password</label>
					<div class="col-sm-6">
						<input type="text" class="form-control <?= ($validation->getError('email')) ? 'is-invalid' : ''; ?>" name="password1" id="password1" value="<?= old('email'); ?>">
						<div class="invalid-feedback">
							<?= $validation->getError('password1'); ?>
						</div>
					</div>
				</div>
				<div class="mb-3 row">
					<label for="password2" class="col-sm-2 col-form-label">Konfirmasi Password</label>
					<div class="col-sm-6">
						<input type="password" class="form-control <?= ($validation->getError('password')) ? 'is-invalid' : ''; ?>" name="password2" id="password2">
						<div class="invalid-feedback">
							<?= $validation->getError('password2'); ?>
						</div>
					</div>
				</div>
				<div class="mb-3 row">
					<div class="offset-sm-2 col-sm-4">
						<div class="g-recaptcha" data-sitekey="<?= env('SITEKEY') ?>"></div>
					</div>
				</div>
				<button class="btn btn-success offset-sm-2 w-25" type="submit">Ubah</button>
			</form>
		</div>

		<!-- Right Side -->
		<div class="col-6 mt-5">
		</div>
	</div>
</div>

<?= $this->endSection(); ?>