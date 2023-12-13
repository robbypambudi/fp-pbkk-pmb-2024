<script>
    if (document.getElementById("lanjut-buat-pendaftaran")) {
        document.getElementById("lanjut-buat-pendaftaran").disabled = true;
    }

    function terms_changed(termsCheckBox) {
        if (termsCheckBox.checked) {
            document.getElementById("lanjut-buat-pendaftaran").disabled = false;
        } else {
            document.getElementById("lanjut-buat-pendaftaran").disabled = true;
        }
    }

    function CariAlamatKabupaten(dat) {
        const prov = $(dat).val();

        const data = {
            prov: prov,
        };

        $.ajax({
            type: "POST",
            url: "<?= base_url("cari/kabupaten") ?>",
            data: data,
            success: function(res) {
                $("#alamat_kabupaten").html(res);
            }
        });
    };

    function CariAlamatKecamatan(dat) {
        const kec = $(dat).val();
        const data = {
            kec: kec
        };
        $.ajax({
            type: "POST",
            url: "<?= base_url("cari/kecamatan") ?>",
            data: data,
            success: function(res) {
                $("#alamat_kecamatan").html(res);
            }
        });

    };

    function CariBidangKeahlihan(dat) {

        const bidang = $(dat).val();
        const data = {
            bidang: bidang
        };

        $.ajax({
            type: "POST",
            url: "<?= base_url("cari/bidang") ?>",
            data: data,
            success: function(res) {
                $("#bidang_keahlian").html(res);
            }
        });
    };

    function CariProgramKeahlihan(dat) {
        const program = $(dat).val();
        const data = {
            program: program
        };

        $.ajax({
            type: "POST",
            url: "<?= base_url("cari/program") ?>",
            data: data,
            success: function(res) {
                $("#program_keahlian").html(res);
            }
        });
    }


    function CariKompetensiKeahlian(dat) {
        const kompetensi = $(dat).val();
        const data = {
            kompetensi: kompetensi
        };
        $.ajax({
            type: "POST",
            url: "<?= base_url("cari/kompetensi") ?>",
            data: data,
            success: function(res) {
                $("#kompetensi_keahlian").html(res);
            }
        });
    }
</script>