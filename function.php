<?php
$conn = mysqli_connect("localhost", "root", "", "dbedit");
// function query($query)
// {
//     global $conn;
//     $result = mysqli_query($conn, $query);
//     $rows = [];
//     while ($row = mysqli_fetch_assoc($result)) {
//         $rows[] = $row;
//     }
//     return $rows;
// }

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    return $row;
}


function tambah($data)
{
    global $conn;

    $nik = $data['nik'];
    $nama = $data['nama'];
    $alamat = $data['alamat'];
    $email = $data['email'];
    $tempatlahir = $data['tempatlahir'];
    $tgllahir = $data['tgllahir'];
    $gender = $data['gender'];
    $keahlian = implode(',', $data['keahlian']);

    $query = "INSERT INTO datakaryawan
            VALUES('$nik','$nama','$alamat','$email','$tempatlahir','$tgllahir','$gender','$keahlian')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapus($nik)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM datakaryawan WHERE nik = '$nik'");
    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;
    $nik = $data['nik'];
    $nama = $data['nama'];
    $alamat = $data['alamat'];
    $email = $data['email'];
    $tempatlahir = $data['tempatlahir'];
    $tgllahir = $data['tgllahir'];
    $gender = $data['gender'];
    $keahlian = implode(',', $data['keahlian']);
    $query = "UPDATE datakaryawan SET nama = '$nama', alamat = '$alamat', email = '$email',tempatlahir = '$tempatlahir',tgllahir = '$tgllahir',gender = '$gender',keahlian = '$keahlian'
    WHERE nik = '$nik'";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
