<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container my-3">
	<div class="row">
		<div class="col-6">
			<h4>Lupa Password</h4>
			<hr>
			<?php if (session()->getFlashdata('message')) {
				echo session()->getFlashdata('message');
			} ?>
			<form method="POST" action="/forgotpassword/reset">
				<div class="mb-3 row">
					<label for="email" class="col-sm-2 col-form-label">Email</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="email" id="email">
					</div>
				</div>
				<div class="mb-3 row">
					<div class="offset-sm-2 col-sm-4">
						<div class="g-recaptcha" data-sitekey="<?= env('SITEKEY') ?>"></div>
						<div class="error"><strong><?= session('msg') ?></strong></div>
					</div>
				</div>
				<button class="btn btn-success offset-sm-2" type="submit">Reset Password</button>
			</form>
		</div>
		<div class="col-6 my-4">
			Masukkan email untuk melakukan reset password.
		</div>
	</div>
</div>

<?= $this->endSection(); ?>