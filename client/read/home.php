<?php
include('/xampp/htdocs/web/db/connection.php');

function readHome()
{
    global $conn;
    $query = "SELECT r.*, p.nama, p.profile FROM rekrutmen r INNER JOIN perusahaan p ON r.perusahaan = p.id";
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

function search($kategori, $pekerjaan)
{
    global $conn;
    if (isset($kategori) && !isset($pekerjaan)) {
        $query = "SELECT r.*, p.nama, p.profile FROM rekrutmen r INNER JOIN perusahaan p ON r.perusahaan = p.id WHERE r.kategori = $kategori";
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
    } else if (isset($kategori) && isset($pekerjaan)) {
        $query = "SELECT r.*, p.nama, p.profile FROM rekrutmen r INNER JOIN perusahaan p ON r.perusahaan = p.id WHERE r.kategori = $kategori AND r.pekerjaan = " . "'" . $pekerjaan . "'" . "";
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
    } else {
        $query = "SELECT r.*, p.nama, p.profile FROM rekrutmen r INNER JOIN perusahaan p ON r.perusahaan = p.id";
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
}

function getDetail($id)
{
    global $conn;
    $query = "SELECT r.id, r.perusahaan, r.pekerjaan, r.kategori, r.deskripsi, p.nama, p.no, p.alamat, p.profile FROM rekrutmen r 
    INNER JOIN perusahaan p ON r.perusahaan = p.id 
    WHERE r.id = $id";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_assoc($result);
}

function validate($rekrutmen, $pelamar)
{
    global $conn;
    $query = "SELECT * FROM pengajuan WHERE rekrutmen = $rekrutmen AND pelamar = $pelamar";
    mysqli_query($conn, $query);
    if (mysqli_affected_rows($conn) > 0) {
        return false;
    } else {
        return true;
    }
}

function pengajuan($rekrutmen, $pelamar)
{
    global $conn;
    if (validate($rekrutmen, $pelamar)) {
        $query = "INSERT INTO pengajuan VALUES (
        '',
        '$rekrutmen',
        '$pelamar',
        '0'
    )";
        mysqli_query($conn, $query);
        header('Location: ProfilUser.php');
    } else {
        echo "<script> alert('Tidak bisa melamar lebih dari 1 dari lamaran yang sama !'); document.location.href = 'home.php'; </script>";
    }
}
