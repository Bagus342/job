<?php
require('/xampp/htdocs/web/db/connection.php');

$id = $_GET["id"];
$query = "DELETE FROM pekerjaan WHERE id = '$id'";
mysqli_query($conn, $query);
if (mysqli_affected_rows($conn) > 0) {
    echo "<script> alert('Data berhasil dihapus !'); document.location.href = '../pekerjaan.php' </script>";
} else {
    echo "<script> alert('Data gagal dihapus !'); </script>";
    print(mysqli_affected_rows($conn));
}
