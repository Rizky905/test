<?php
require "function.php";
$nik = $_GET['nik'];
if (hapus($nik) > 0) {
    echo "<script>alert('Data berhasil dihapus.');
        document.location='index.php';</script>";
}
