<?php
if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        echo "<script>
        Swal.fire({
            type: 'success',
            title: 'Daftar',
            text: 'Berhasil, Silahkan login!',
          });
              </script>";
    } else {
        echo mysqli_error($conn);
    }
}
