<?php
include('/xampp/htdocs/web/db/connection.php');

function create($deskripsi, $kategori, $pekerjaan)
{
    global $conn;
    $perusahaan = $_GET['perusahaan'];
    $query = "INSERT INTO rekrutmen VALUES (
            '',
            '$perusahaan',
            '$deskripsi',
            '$kategori',
            '$pekerjaan'
        )";
    mysqli_query($conn, $query);
    header('Location: ProfilPerusahaan.php');
}
