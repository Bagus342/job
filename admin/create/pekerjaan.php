<?php
include('/xampp/htdocs/web/db/connection.php');

function validate($param)
{
    global $conn;
    $query = "SELECT * FROM pekerjaan WHERE nama = '$param'";
    mysqli_query($conn, $query);
    if (mysqli_affected_rows($conn) == 0) {
        return true;
    }
}

function create($nama, $kategori)
{
    global $conn;
    if (validate($nama)) {
        $query = "INSERT INTO pekerjaan VALUES (
            '',
            '$nama',
            '$kategori'
        )";
        mysqli_query($conn, $query);
        print(mysqli_error($conn));
        header('Location: pekerjaan.php');
    } else {
        echo "<script> alert('Data telah terdaftar !'); document.location.href = 'pekerjaan.php'; </script>";
    }
}
