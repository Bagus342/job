<?php
include('/xampp/htdocs/web/db/connection.php');

function upload()
{
    $namaFile = $_FILES['profile']['name'];
    $error = $_FILES['profile']['error'];
    $tmp_name = $_FILES['profile']['tmp_name'];

    $default = ['jpg', 'jpeg', 'png'];
    $split = explode('.', $namaFile);
    $ekstensi = strtolower(end($split));
    if (!in_array($ekstensi, $default)) {
        echo "<script> alert('Data yang anda upload bukan gambar !'); </script>";
        return false;
    }
    $uniq = uniqid() . '.' . $ekstensi;
    move_uploaded_file($tmp_name, 'img/' . $uniq);

    return $uniq;
}

function create($user, $nama, $alamat, $no)
{
    global $conn;
    $img = upload();
    $query = "INSERT INTO perusahaan VALUES (
            '',
            '$user',
            '$img',
            '$nama',
            '$alamat',
            '$no'
        )";
    mysqli_query($conn, $query);
    header('Location: perusahaan.php');
}
