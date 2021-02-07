<?php
require 'function.php';
$karyawan = mysqli_query($conn, "SELECT * FROM datakaryawan");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Karyawan</title>
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

        <table class="table table-striped mt-4 align-middle">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Gender</th>
                    <th>Keahlian</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php $i = 1 ?>
            <?php foreach ($karyawan as $row) : ?>
                <tr>
                    <td><?= $i; ?></th>
                    <td><?= $row['nik']; ?></th>
                    <td><?= $row['nama']; ?></th>
                    <td><?= $row['alamat']; ?></th>
                    <td><?= $row['email']; ?></th>
                    <td><?= $row['tempatlahir']; ?></th>
                    <td><?= $row['tgllahir']; ?></th>
                    <td><?= $row['gender']; ?></th>
                    <td><?= $row['keahlian']; ?></th>
                    <td>
                        <a href="ubah.php?nik=<?= $row["nik"]; ?>">Ubah</a>
                        <a href="hapus.php?nik=<?= $row["nik"]; ?>">Hapus</a>
                    </td>
                </tr>
                <?php $i++ ?>
            <?php endforeach; ?>
        </table>
    </div>
</body>

</html>