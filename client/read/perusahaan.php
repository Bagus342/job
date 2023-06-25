<?php
include('/xampp/htdocs/web/db/connection.php');
function read()
{
    global $conn;
    $user = $_SESSION['user']['id'];
    $query = "SELECT P.*, U.email FROM perusahaan P INNER JOIN user U ON U.id = '$user'";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_assoc($result);
}
