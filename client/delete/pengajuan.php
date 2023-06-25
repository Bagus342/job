<?php
include('/xampp/htdocs/web/db/connection.php');

$id = $_GET["id"];
$query = "DELETE FROM pengajuan where id = '$id'";
mysqli_multi_query($conn, $query);
if (mysqli_affected_rows($conn) > 0) {
    echo "<script> alert('Data berhasil dihapus !'); document.location.href = '../profilUser.php' </script>";
} else {
    echo "<script> alert('Data gagal dihapus !'); </script>";
    print(mysqli_error($conn));
}
