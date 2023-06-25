<?php
include('/xampp/htdocs/web/db/connection.php');

function validate($param)
{
    global $conn;
    $query = "SELECT * FROM user WHERE email = '$param'";
    mysqli_query($conn, $query);
    if (mysqli_affected_rows($conn) == 0) {
        var_dump(mysqli_affected_rows($conn));
        return true;
    }
}

function create($email, $password, $role)
{
    global $conn;
    if (validate($email)) {
        $query = "INSERT INTO user VALUES (
            '',
            '$email',
            '$password',
            '$role'
        )";
        mysqli_query($conn, $query);
        afterCreate($email, $role);
    } else {
        echo "<script> alert('Akun telah terdaftar !'); document.location.href = 'register.php'; </script>";
    }
}

function afterCreate($email, $role)
{
    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");
    $id = mysqli_fetch_assoc($result)['id'];
    if ($role === 'pelamar') {
        $query = "INSERT INTO pelamar VALUES (
            '',
            '$id',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            ''
        )";
        mysqli_query($conn, $query);
        header('Location: login.php');
        exit;
    }
    $query = "INSERT INTO perusahaan VALUES (
        '',
        '$id',
        '',
        '',
        '',
        ''
    )";
    mysqli_query($conn, $query);
    header('Location: login.php');
}
