<?php
include('/xampp/htdocs/web/db/connection.php');
session_start();

function check()
{
    if (!isset($_SESSION["user"])) {
        header('Location: index.php');
    }
}

function login($email, $password)
{
    global $conn;
    $query = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if ($password === $row["password"]) {
            if ($row["role"] == 'admin') {
                $_SESSION["user"] = $row;
                header('Location: ../admin/index.php');
            } else if ($row["role"] == 'pelamar') {
                $_SESSION["user"] = $row;
                header('Location: home.php');
            } else {
                $_SESSION["user"] = $row;
                header('Location: home.php');
            }
        } else {
            echo "<script> alert('Password salah !'); document.location.href = 'login.php'; </script>";
        }
    } else {
        echo "<script> alert('Username salah !'); document.location.href = 'login.php'; </script>";
    }
}
