<?php
session_start();
require 'function.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PetaniKu</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/sweetalert2.css">

    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <script src="js/anime.min.js"></script>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="img/logo-color.png" class="d-inline-block align-top" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="d-flex justify-content-end">
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-item nav-link active" href="#home">Home</a>
                        <a class="nav-item nav-link" href="#toko">Toko</a>
                        <a class="nav-item nav-link" href="#tentang">Tentang Kami</a>
                        <a class="nav-item nav-link" href="#kontak">Kontak</a>
                        <a class="nav-item nav-link" href="#"><button class="btn btn-outline-success my-2 my-sm-0 login" type="button" data-toggle="modal" data-target="#loginModal">Masuk</button></a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- akhir navbar -->

    <!-- jumbotron -->
    <div class="jumbotron jumbotron-fluid" id="home">
        <div class="container">
            <h1 class="display-3 ">Temukan hasil panen yang terbaik<br>
                hanya di <b>PetaniKu</b></h1>
            <p class="lead">Kami lebih dekat dengan anda tanpa perantara</p>
        </div>
    </div>
    <!-- akhir jumbotron -->

    <!-- toko -->
    <div class="container" id="toko">
        <div class="row mt-5 d-flex justify-content-center">
            <div class="col-4">
                <h3 class="font-weight-bold text-center">TOKO</h3>
                <div class="line"></div>
            </div>
        </div>

        <?php $query = "SELECT * FROM barang"; ?>
        <?php $rows = query($query); ?>
        <h5 class="mt-4 mb-4">Produk</h5>
        <div class="row ml-1">
            <?php foreach ($rows as $barang) : ?>
                <div class="col-3 mb-5">
                    <div class="card" style="width: 222px;">
                        <img class="card-img-top" src="img/<?= $barang['gambar']; ?>" height="148" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title"><?= $barang['nama_barang']; ?></h4>
                            <h6 class="card-subtitle mb-2 text-muted mt-3"><?= $barang['nama_pemilik']; ?></h6>
                            <p class="card-text"><?= $barang['tempat']; ?></p>
                            <h4 class="card-subtitle mb-2 text-muted mt-4">Rp. <?= number_format($barang['harga']); ?>/Kg</h5>
                                <?php
                                if (isset($_SESSION['login']) != true) {
                                    echo "<a href='#' type='button' class='btn btn-primary mt-2' data-toggle='modal' data-target='#loginModal' onclick='cekAlert();'>Order</a>";
                                } else {
                                    echo "<a href='#' type='button' class='btn btn-primary mt-2' data-toggle='modal' data-target='#transaksiModal' data-id=" . $barang['id'] . ">Order</a>";
                                } ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- <div class="row d-flex justify-content-end mt-5">
            <div class="col-1">
                <img src="img/arrow-left.svg" width="40" height="40" alt="">
            </div>
            <div class="col-1">
                <img src="img/arrow-right.svg" width="40" height="40" alt="">
            </div>
        </div> -->

    </div>
    <!-- akhir toko -->


    <!-- tentang -->
    <div class="about" id="tentang">
        <div class="container">
            <div class="row mt-5 d-flex justify-content-center">
                <div class="col-4">
                    <h3 class="font-weight-bold text-center">TENTANG KAMI</h3>
                    <div class="line"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-10">
                    <p class="lead"><b>PetaniKu</b> memiliki visi untuk meningkatkan kesejahtraan para petani dan menciptakan dampak positif dalam sektor pertanian melalui pemanfaatan teknologi informasi. Oleh karena itu, <b>PetaniKu</b> berdiri atas tiga pilar utama, yaitu: Pertanian, Teknologi, dan Dampak sosial.</p>
                    <p class="lead">Bersama <b>PetaniKu</b>, para petani lokal dapat menjual hasil panen mereka kepada para individu maupun Usaha Mikro, Kecil, dan Menengah (UMKM) di berbagai wilayah. <b>PetaniKu</b> bukan hanya sebuah platform e-commerce untuk produk hasil pertanian namun juga kemajuan pertanian untuk masa depan.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- akhir tentang -->

    <!-- kontak -->
    <div class="kontak" id="kontak">
        <div class="container">
            <div class="row mt-5 d-flex justify-content-center">
                <div class="col-4">
                    <h3 class="font-weight-bold text-center">KONTAK</h3>
                    <div class="line"></div>
                </div>
            </div>

            <div class="row d-flex justify-content-center">
                <div class="col-2 info">
                    <img src="img/logo.png" class="ml-3 mt-3 mb-3" alt="">
                    <p class="lead">Jl. Sindang Hurip, Kec. Tawang
                        Tasikmalaya, JawaBarat</p>
                    <p class="lead">petaniku@gmail.com</p>
                    <p class="lead">0812-3456-7890</p>
                </div>
                <div class="col-4 px-5 py-4">
                    <form action="" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="pesan" nama="pesan" rows="3" placeholder="Pesan"></textarea>
                        </div>
                        <button type="button" class="btn btn-primary kirim" onclick="">Kirim</button>
                    </form>
                </div>


            </div>
            <div class="row d-flex justify-content-center" id="footer">
                <div class="col-10">
                    <div class="row mt-2 d-flex justify-content-center">
                        <div class="col-1 ml-4">
                            <img src="img/fb.svg" id="fb" width="25" height="25" class="mt-2" alt="">
                        </div>
                        <div class="col-1">
                            <img src="img/ig.svg" id="ig" width="25" height="25" class="mt-2" alt="">
                        </div>
                    </div>

                    <div class="row d-flex justify-content-center mt-n2">
                        <div class="col-4">
                            <p class="lead text-center">Copyright &copy; FujiNugraha 2019</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- akhir kontak -->

    <!-- Modal -->
    <?php require_once 'modal.php'; ?>
    <!-- akhir modal -->

    <script src="js/script.js"></script>


</body>

</html>