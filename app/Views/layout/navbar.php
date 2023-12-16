<nav class="navbar navbar-expand-lg navbar-light " style="background-color:lightgrey">
    <div class="container">
        <a class="navbar-brand" href="/">PMB ITS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse d-flex" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/">Beranda</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="DropdownPersyaratan" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Persyaratan
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="DropdownPersyaratan">
                        <li><a class="dropdown-item" href="<?= base_url('persyaratan/d3'); ?>">D3</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('persyaratan'); ?>">S1</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('petunjuk'); ?>">Petunjuk Pendaftaran</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="DropdownJadwal" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Jadwal
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="DropdownJadwal">
                        <li><a class="dropdown-item" href="<?= base_url('jadwal/d3'); ?>">D3</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('jadwal'); ?>">S1</a></li>
                    </ul>
                </li>

                <?php if (session()->get('logged_in') == true) : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Hai, <?= session()->get('nama'); ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="<?= base_url('beranda'); ?>">Beranda</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('changepassword'); ?>">Ubah Password</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('auth/logout'); ?>">Logout</a></li>
                        </ul>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('login'); ?>">Login</a>
                    </li>
                <?php endif ?>
            </ul>
        </div>
    </div>
</nav>