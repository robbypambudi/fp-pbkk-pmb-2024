<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Mazer Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/app.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/pages/auth.css">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <!-- <div class="auth-logo">
                        <a href="index.html"><img src="<?= base_url() ?>/img/unhan.png" alt="Logo"></a>
                    </div> -->
                    <h1 class="auth-title">Log in.</h1>
                    <?php if (session()->getFlashdata('message')) {
                        echo session()->getFlashdata('message');
                    } ?>
                    <form method="POST" action="/panitia/login/proses">
                        <?= csrf_field(); ?>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input id="email" name="email" type="text" class="form-control form-control-xl <?= ($validation->getError('email')) ? 'is-invalid' : ''; ?>" placeholder="Email">
                            <div class="invalid-feedback">
                                <?= $validation->getError('email'); ?>
                            </div>
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input id="password" name="password" type="password" class="form-control form-control-xl <?= ($validation->getError('password')) ? 'is-invalid' : ''; ?>" placeholder="Password">
                            <div class="invalid-feedback">
                                <?= $validation->getError('password'); ?>
                            </div>
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>
</body>

</html>