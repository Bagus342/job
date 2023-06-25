<?php
include('/xampp/htdocs/web/db/connection.php');

function upload($img)
{
    if (gettype($img) != 'string') {
        $namaFile = $img['name'];
        $tmp_name = $img['tmp_name'];
        $split = explode('.', $namaFile);
        $ekstensi = strtolower(end($split));
        $uniq = uniqid() . '.' . $ekstensi;
        move_uploaded_file($tmp_name, 'img/img/' . $uniq);

        return $uniq;
    } else {
        return $img;
    }
}

function create($user, $nama, $alamat, $no, $jenjang, $kota, $tgl)
{
    global $conn;
    $ijazah = upload($_FILES['ijazah']);
    $ktp = upload($_FILES['ktp']);
    $ktp = upload($_FILES['ktp']);
    $cv = upload($_FILES['cv']);
    $profile = upload($_FILES['profile']);
    $split = explode('/', $tgl);
    $new = $split[2] . '-' . $split[1] . '-' . $split[0];
    $query = "INSERT INTO pelamar VALUES (
            '',
            '$user',
            '$nama',
            '$no',
            '$alamat',
            '$jenjang',
            '$kota',
            '$new',
            '$ijazah',
            '$ktp',
            '$cv',
            '$profile'
        )";
    mysqli_query($conn, $query);
    header('Location: pelamar.php');
}
