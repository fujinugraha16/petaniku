<?php
require_once('config.php');
// function query
function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// function registrasi
function registrasi($data)
{
    global $conn;

    $nama = htmlspecialchars($data["nama"]);
    $email = strtolower(stripslashes($data["email"]));
    $password1 = mysqli_real_escape_string($conn, $data["password1"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek username sudah atau belum ada
    $hasil = mysqli_query($conn, "SELECT email FROM user WHERE email = '$email'");
    if (mysqli_fetch_assoc($hasil)) {
        echo "<script>
                alert('gagal, username sudah terdaftar!');
              </script> ";

        return false;
    }

    // cek konfirmasi password
    if ($password1 !== $password2) {
        echo "<script>
                alert('konfirmasi password tidak sesuai');
              </script>";

        return false;
    }

    // enkripsi password
    $password1 = password_hash($password1, PASSWORD_DEFAULT);

    // tambahkan userbaru ke database

    mysqli_query($conn, "INSERT INTO user VALUES('', '$nama', '$email', '$password1')");

    return mysqli_affected_rows($conn);
}

function tambahTransaksi($data)
{
    global $conn;

    $id_barang = $data['id_barang'];
    $id_user = $data['id_user'];
    $jumlah = $data['jumlah'];
    $alamat = $data['alamat'];
    $harga_total = $data['harga'] * $jumlah;
    $status = $data['status'];

    $query = "INSERT INTO transaksi (`id_barang`, `id_user`, `jumlah_barang`, `alamat_tujuan`,`harga_total`, `status`) VALUES
                  ($id_barang, $id_user, $jumlah,'$alamat',$harga_total, '$status')
                ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
