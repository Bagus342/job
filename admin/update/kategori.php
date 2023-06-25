<?php
require('/xampp/htdocs/web/db/connection.php');

function validateUpdate($id, $nama)
{
    global $conn;
    $query = "SELECT * FROM kategori WHERE nama = '$nama'";
    $result = mysqli_fetch_assoc(mysqli_query($conn, $query));
    if ($result["nama"] == $nama && $result["id"] == $id) {
        return true;
    } else if ($result["nama"] == $nama) {
        return false;
    }
}

function update($id, $nama)
{
    global $conn;
    if (validateUpdate($id, $nama)) {
        $query = "UPDATE kategori SET 
                nama = '$nama'
                WHERE id = '$id'
            ";
        mysqli_query($conn, $query);
        if (mysqli_error($conn) == null) {
            echo "<script> alert('Data berhasil diupdate !'); document.location.href = 'kategori.php'; </script>";
        } else {
            print(mysqli_error($conn));
        }
    } else {
        echo "<script> alert('Data telah terdaftar !'); document.location.href = 'kategori.php'; </script>";
    }
}
