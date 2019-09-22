<?php
require_once('config.php');
require_once('function.php');

if (isset($_POST["tambah"])) {
    if (tambahTransaksi($_POST) > 0) {
        echo "<script>
                alert('konfirmasi pembayaran berhasil, silahkan cek email untuk melanjutkan pembayaran');
              </script>";
        echo "<script>document.location='index.php';</script>";
    } else {
        echo mysqli_error($conn);
    }
}
