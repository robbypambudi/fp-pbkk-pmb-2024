<div class="col-3">
    <ul class="list-group">
        <li class="list-group-item list-group-item-action <?= ($title == 'Beranda') ? 'active' : ' ' ?>">
            <a class="<?= ($title == 'Beranda') ? 'link-light' : ' ' ?>" style="text-decoration:none;" href="beranda">Beranda</a>
        </li>
        <li class="list-group-item list-group-item-action <?= ($title == 'Biodata') ? 'active' : ' ' ?>">
            <a class="<?= ($title == 'Biodata') ? 'link-light' : ' ' ?>" style="text-decoration:none;" href="biodata">Data Diri</a>
        </li>
        <li class="list-group-item list-group-item-action <?= ($title == 'Pas Foto') ? 'active' : ' ' ?> ">
            <a class="<?= ($title == 'Pas Foto') ? 'link-light' : ' ' ?>" style="text-decoration:none;" href="pasfoto">Pas Foto</a>
        </li>
        <li class="list-group-item list-group-item-action <?= ($title == 'Orang Tua') ? 'active' : ' ' ?> ">
            <a class="<?= ($title == 'Orang Tua') ? 'link-light' : ' ' ?>" style="text-decoration:none;" href="ortu">Data Orang Tua</a>
        </li>
        <li class="list-group-item list-group-item-action <?= ($title == 'Sekolah Asal') ? 'active' : ' ' ?>">
            <a class="<?= ($title == 'Sekolah Asal') ? 'link-light' : ' ' ?>" style="text-decoration:none;" href="sekolah">Sekolah Asal</a>
        </li>
        <li class="list-group-item list-group-item-action <?= ($title == 'Upload Administrasi') ? 'active' : ' ' ?> ">
            <a class="<?= ($title == 'Upload Administrasi') ? 'link-light' : ' ' ?>" style="text-decoration:none;" href="uploadadm">Upload Administrasi</a>
        </li>
        <li class="list-group-item list-group-item-action <?= ($title == 'Buat Pendaftaran') ? 'active' : ' ' ?> ">
            <a class="<?= ($title == 'Buat Pendaftaran') ? 'link-light' : ' ' ?>" style="text-decoration:none;" href="daftar">Buat Pendaftaran</a>
        </li>
    </ul>
</div>