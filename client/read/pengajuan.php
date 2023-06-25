<?php
include('/xampp/htdocs/web/db/connection.php');
function getPengajuan()
{
    global $conn;
    $id = $_GET['id'];
    $query = "SELECT p.id as id, p.status, user.email, pelamar.* FROM pengajuan p 
    RIGHT JOIN pelamar ON p.pelamar = pelamar.user 
    RIGHT JOIN user ON p.pelamar = user.id
    WHERE p.rekrutmen = $id";
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

function apply($id) {
    global $conn;
    $query = "UPDATE INTO pengajuan SET status = '1' WHERE id = '$id'";
    mysqli_query($conn, $query);
    header('Location: DetailLamaran.php');
}