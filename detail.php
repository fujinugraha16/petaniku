<?php
session_start();
require 'config.php';
require 'function.php';

if ($_POST['barang_id']) {
    $id = $_POST['barang_id'];
    // mengambil data berdasarkan id
    // dan menampilkan data ke dalam form modal bootstrap
    $id_user = $_SESSION['id'];
    $sql = "SELECT * FROM barang WHERE id = $id";
    $row = query($sql);
    foreach ($row as $barang) { ?>

        <!-- MEMBUAT FORM -->
        <form action="transaksi.php" method="post">
            <div class="row">
                <div class="col-6">
                    <div class="card" style="width: 222px;">
                        <img class="card-img-top" src="img/<?= $barang['gambar']; ?>" height="148" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title"><?= $barang['nama_barang']; ?></h4>
                            <h6 class="card-subtitle mb-2 text-muted mt-3"><?= $barang['nama_pemilik']; ?></h6>
                            <p class="card-text"><?= $barang['tempat']; ?></p>
                            <h4 class="card-subtitle mb-2 text-muted mt-4">Rp. <?= number_format($barang['harga']); ?>/Kg</h5>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <input type="hidden" name="id_user" value="<?= $id_user; ?>">
                    <input type="hidden" name="id_barang" value="<?= $barang['id']; ?>">
                    <input type="hidden" name="harga" value="<?= $barang['harga']; ?>">
                    <div class="form-group">
                        <label for="jumlah">Jumlah dalam Kg</label>
                        <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="0" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" rows="4" name="alamat" id="alamat" required></textarea>
                        <input type="hidden" class="form-control" id="status" name="status" value="Belum dibayar">
                    </div>
                    <button class="btn btn-primary" type="submit" name="tambah">Konfirmasi Pembayaran</button>
                </div>
            </div>


        </form>

    <?php }
}
$conn->close();
?>