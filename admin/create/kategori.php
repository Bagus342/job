<?php
include('/xampp/htdocs/web/db/connection.php');

function validate($param)
{
    global $conn;
    $query = "SELECT * FROM kategori WHERE nama = '$param'";
    mysqli_query($conn, $query);
    if (mysqli_affected_rows($conn) == 0) {
        return true;
    }
}

function create($nama)
{
    global $conn;
    if (validate($nama)) {
        $query = "INSERT INTO kategori VALUES (
            '',
            '$nama'
        )";
        mysqli_query($conn, $query);
        header('Location: kategori.php');
    } else {
        echo "<script> alert('Akun telah terdaftar !'); document.location.href = 'kategori.php'; </script>";
    }
}
