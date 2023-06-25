<?php
include("/xampp/htdocs/web/db/connection.php");

function pelamar()
{
    global $conn;
    $query = "SELECT * FROM pelamar";
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

function perusahaan()
{
    global $conn;
    $query = "SELECT * FROM perusahaan";
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

function rekrutmen()
{
    global $conn;
    $query = "SELECT * FROM rekrutmen";
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
