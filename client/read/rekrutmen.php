<?php
include('/xampp/htdocs/web/db/connection.php');
function getLamaran()
{
    global $conn;
    $user = $_SESSION['user']['id'];
    $query = "SELECT id, pekerjaan FROM `rekrutmen` WHERE perusahaan in (SELECT id from perusahaan where user = $user)";
    $result = mysqli_query($conn, $query);
    $rows = [];
    if ($result == null) {
        $rows[] = [];
    } else {
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
    }
    return $rows;
}

function getDetail($id)
{
    global $conn;
    $query = "SELECT r.pekerjaan, r.deskripsi, kategori.nama as kategori FROM rekrutmen r INNER JOIN kategori ON r.kategori = kategori.id WHERE r.id = $id";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_assoc($result);
}
