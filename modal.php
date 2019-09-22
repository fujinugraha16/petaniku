<!-- Modal -->

<!-- Login Modal -->
<div class="modal" tabindex="-1" role="dialog" id="loginModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title ml-5 mt-3">LOGIN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php require 'login.php'; ?>
                <?php if (isset($error)) : ?>
                    <script>
                        Swal.fire({
                            type: 'error',
                            title: 'Gagal',
                            text: 'Username/Password salah!',
                        });
                    </script>
                <?php elseif (isset($_SESSION['login'])) : ?>
                    <script>
                        $(document).ready(function() {
                            $('button.login').text('Logout');
                            $('button.login').attr('data-target', '#logoutModal');
                        });
                    </script>
                <?php endif; ?>
                <form action="" method="post" class="mb-3">
                    <div class="row px-5">
                        <div class="col">
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-primary" name="login" id="login">Login</button>
                            <p class="text-center mt-3">Belum punya akun? <a href="#" class="card-link" data-toggle="modal" data-target="#daftarModal" data-dismiss="modal">Daftar</a>
                            </p>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- akhir login Modal -->

<!-- daftar Modal -->
<div class="modal" tabindex="-1" role="dialog" id="daftarModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title ml-5 mt-3">DAFTAR</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php require_once('registrasi.php'); ?>
                <form action="" method="post" class="mb-3">
                    <div class="row px-5">
                        <div class="col">
                            <div class="form-group">
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="password1" name="password1" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="password1" name="password2" placeholder="Ulangi Password">
                            </div>
                            <button type="submit" class="btn btn-primary" name="register">Daftar</button>
                            <p class="text-center mt-3">Sudah punya akun? <a href="#" class="card-link" data-toggle="modal" data-target="#loginModal" data-dismiss="modal">Login</a>
                            </p>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


<!-- Modal Logout -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutModalLabel">Logout</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Apakah anda yakin untuk keluar dari aplikasi?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <a class="btn btn-primary" href="logout.php">Logout</a>
            </div>
        </div>
    </div>
</div>
<!-- akhir logout Modal -->

<!-- transaksi modal -->

<div class="modal" tabindex="-1" role="dialog" id="transaksiModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title ml-5 mt-3">Transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="isidata"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#transaksiModal').on('show.bs.modal', function(e) {
            var id_user = <?= $_SESSION['id']; ?>;
            var barang_id = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type: 'post',
                url: 'detail.php',
                data: 'barang_id=' + barang_id,
                success: function(data) {
                    $('.isidata').html(data); //menampilkan data ke dalam modal
                }
            });
        });
    });
</script>
<!-- akhir transaksi modal -->