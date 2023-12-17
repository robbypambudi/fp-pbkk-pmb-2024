<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container my-3">
	<div class="row">
		<!-- Left Side -->
		<div class="col-6">
			<h4>Login</h4>
			<hr>
			<?php if (session()->getFlashdata('message')) {
				echo session()->getFlashdata('message');
			} ?>
			<form method="POST" action="login/process">
				<?= csrf_field(); ?>
				<div class="mb-2 row">
					<label for="email" class="col-sm-2 col-form-label">Email</label>
					<div class="col-sm-10">
						<input type="text" class="form-control <?= ($validation->getError('email')) ? 'is-invalid' : ''; ?>" name="email" id="email" value="<?= old('email'); ?>">
						<div class="invalid-feedback">
							<?= $validation->getError('email'); ?>
						</div>
					</div>
				</div>
				<div class="mb-3 row">
					<label for="password" class="col-sm-2 col-form-label">Password</label>
					<div class="col-sm-10">
						<input type="password" class="form-control <?= ($validation->getError('password')) ? 'is-invalid' : ''; ?>" name="password" id="password">
						<div class="invalid-feedback">
							<?= $validation->getError('password'); ?>
						</div>
					</div>
				</div>
				<div class="mb-3 row">
					<div class="offset-sm-2 col-sm-4">
						<div class="g-recaptcha" data-sitekey="<?= env('SITEKEY') ?>"></div>
					</div>
				</div>
				<button class="btn btn-success offset-sm-2 w-25" type="submit">Login</button>
				<a class="text-secondary mr-3" style="margin-left: 25px;" href="forgotpassword">Lupa Password</a>
			</form>
		</div>

		<!-- Right Side -->
		<div class="col-6 mt-5">
			<ul>
				<li>Pastikan alamat aplikasi PMB ITS benar di https://sipmaba.its.ac.id</li>
				<li>Jaga kerahasiaan email dan password anda.</li>
				<li>Jika belum mempunyai akun silahkan membuat akun terlebih dahulu</li>
			</ul>
			<a class="mt-3 btn btn-info col-3" style="margin-left: 25px "href="create">Buat Akun</a>
		</div>
	</div>
</div>

<?= $this->endSection(); ?>