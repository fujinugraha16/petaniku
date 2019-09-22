<?php
session_start();
$_SESSION = [];
session_unset();
session_destroy();

$login = false;
echo "<script>alert('logout berhasil');</script>";
echo "<script>document.location='index.php';</script>";

exit;
