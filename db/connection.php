<?php
$server_name = "localhost";
$username = "root";
$password = "";
$db = "job";

$conn = new mysqli($server_name, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed : " . $conn->connect_error);
}
// echo "Connection Successfully";
