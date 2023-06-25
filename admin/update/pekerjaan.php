<?php
require('/xampp/htdocs/web/db/connection.php');

function validateUpdate($id, $nama)
{
    global $conn;
    $query = "SELECT * FROM pekerjaan WHERE nama = '$nama'";
    $result = mysqli_fetch_assoc(mysqli_query($conn, $query));
    if ($result["nama"] == $nama && $result["id"] == $id) {
        return true;
    } else if ($result["nama"] == $nama) {
        return false;
    }
}

function update($id, $nama, $kategori)
{
    global $conn;
    if (validateUpdate($id, $nama)) {
        $query = "UPDATE pekerjaan SET 
                nama = '$nama',
                kategori = '$kategori'
                WHERE id = '$id'
            ";
        mysqli_query($conn, $query);
        if (mysqli_error($conn) == null) {
            echo "<script> alert('Data berhasil diupdate !'); document.location.href = 'pekerjaan.php'; </script>";
        } else {
            print(mysqli_error($conn));
        }
    } else {
        echo "<script> alert('Data telah terdaftar !'); document.location.href = 'pekerjaan.php'; </script>";
    }
}
