<?php
include("/xampp/htdocs/web/db/connection.php");

function read()
{
    global $conn;
    $query = "SELECT pengajuan.id, pengajuan.status, rekrutmen.pekerjaan, perusahaan.nama as perusahaan, pelamar.nama FROM pengajuan
    INNER JOIN rekrutmen ON pengajuan.rekrutmen = rekrutmen.id
    INNER JOIN perusahaan ON rekrutmen.perusahaan = perusahaan.id
    INNER JOIN pelamar ON pengajuan.pelamar = pelamar.user
    ";
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
