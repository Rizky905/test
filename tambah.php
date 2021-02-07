<?php
require 'function.php';

$datakaryawan = query("SELECT nik FROM datakaryawan ORDER BY nik DESC");
$urut = substr($datakaryawan['nik'], 5, 5);
$tambah = (int)$urut + 1;
$bulan = date('m');
$tahun = date('y');
if (strlen($tambah) == 1) {
    $format = "K" . $tahun . $bulan . "0000" . $tambah;
} else if (strlen($tambah) == 2) {
    $format = "K" . $tahun . $bulan . "000" . $tambah;
} else if (strlen($tambah) == 3) {
    $format = "K" . $tahun . $bulan . "00" . $tambah;
} else {
    $format = "K" . $tahun . $bulan . $tambah;
}

if (isset($_POST["submit"])) {
    if (tambah($_POST) > 0) {
        echo "<script>alert('Data berhasil ditambah.');
        window.location='index.php';</script>";
    } else {
        die("Query gagal dijalankan: " . mysqli_errno($conn) .
            " - " . mysqli_error($conn));
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Tambah data</title>
</head>

<body>
    <div class="container-lg">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.php">HOME</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" href="index.php">Data Karyawan <span class="sr-only"></span></a>
                    <a class="nav-link" href="tambah.php">Tambah Data</a>
                </div>
            </div>
        </nav>

        <h1 class="mt-4">Tambah data karawan</h1>

        <form method="POST" enctype="multipart/form-data">
            <section class="base">
                <div class="form-group mt-5">
                    <label for="nama">NIK</label>
                    <input type="text" class="form-control" name="nik" id="nik" value="<?= $format; ?> " readonly />
                </div>
                <div class="form-group mt-3">
                    <label for="nama">Nama Karyawan</label>
                    <input type="text" class="form-control" name="nama" id="nama" require />
                </div>
                <div class="form-group mt-3">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" name="alamat" id="alamat" require />
                </div>
                <div class="form-group mt-3">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" id="email" require />
                </div>
                <div class="form-group mt-3">
                    <label for="tempatlahir">Tempat Lahir</label>
                    <input type="text" class="form-control" name="tempatlahir" id="tempatlahir" require />
                </div>
                <div class="form-group mt-3">
                    <label for="tanggallahir">Tanggal Lahir</label>
                    <input type="text" class="form-control" name="tgllahir" id="tgllahir" placeholder="yyyy-mm-dd" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" require />
                </div>
                <!-- <div class="form-group mt-2">
                    <label for="skill">Gender</label>
                    <input type="text" class="form-control" name="gender" id="gender" />
                </div> -->
                <div class="form-group mt-3">
                    <label for="skill">Gender</label>
                    <select name="gender" id="gender" class="form-select mt-2 " aria-label="Default select example">
                        <label for="gender">Gender</label>
                        <option selected>Pilih gender</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-group mt-3">
                    <label for="keahlian">Keahlian</label>
                </div>
                <tr>
                    <td>
                        <input type="checkbox" name="keahlian[]" value="java"> java<br />
                        <input type="checkbox" name="keahlian[]" value="css"> css<br />
                        <input type="checkbox" name="keahlian[]" value="kotlin"> kotlin<br />
                    </td>
                </tr>
                <div class="text-center mt-4">
                    <button class="btn btn-dark" type="submit" name="submit">Simpan</button>
                </div>
            </section>
        </form>
    </div>
</body>

</html>