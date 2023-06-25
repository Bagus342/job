<?php
require('/xampp/htdocs/web/db/connection.php');

$id = $_GET["id"];
$query = "DELETE FROM rekrutmen where id = '$id'";
mysqli_multi_query($conn, $query);
if (mysqli_affected_rows($conn) > 0) {
    print(mysqli_error($conn));
    echo "<script> alert('Data berhasil dihapus !'); document.location.href = '../profilPerusahaan.php' </script>";
} else {
    echo "<script> alert('Data gagal dihapus !'); </script>";
    print(mysqli_error($conn));
}
