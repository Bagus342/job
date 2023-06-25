<?php
include('/xampp/htdocs/web/db/connection.php');
function read()
{
    global $conn;
    $user = $_SESSION['user']['id'];
    $query = "SELECT P.*, U.email FROM pelamar P INNER JOIN user U ON U.id = '$user'";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_assoc($result);
}

function getPengajuan()
{
    global $conn;
    $user = $_SESSION['user']['id'];
    $query = "SELECT p.*, r.pekerjaan as nama FROM pengajuan p INNER JOIN rekrutmen r ON p.rekrutmen = r.id WHERE pelamar = $user";
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
