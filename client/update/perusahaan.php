<?php
include('/xampp/htdocs/web/db/connection.php');
function upload($img)
{
    if (gettype($img) != 'string') {
        $namaFile = $img['name'];
        $tmp_name = $img['tmp_name'];
        $split = explode('.', $namaFile);
        $ekstensi = strtolower(end($split));
        $uniq = uniqid() . '.' . $ekstensi;
        move_uploaded_file($tmp_name, 'img/img/' . $uniq);

        return $uniq;
    } else {
        return $img;
    }
}

function validateUpdate($id, $email)
{
    global $conn;
    $query = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_fetch_assoc(mysqli_query($conn, $query));
    if ($result == null) {
        return true;
    } else if ($result["email"] == $email && $result["id"] == $id) {
        return true;
    } else {
        return false;
    }
}

function update($user, $email, $password, $nama, $alamat, $no, $profile)
{
    global $conn;
    if (validateUpdate($user, $email)) {
        $img = upload($profile);
        $query = "UPDATE perusahaan P INNER JOIN user U ON U.id = '$user' SET 
            U.email = '$email',
            U.password = '$password',
            P.profile = '$img',
            P.nama = '$nama',
            P.alamat = '$alamat',
            P.no = '$no'
        ";
        mysqli_query($conn, $query);
        getUser($user);
        header('Location: profilPerusahaan.php');
    } else {
        echo "<script> alert('email telah terdaftar !'); document.location.href = 'EditProfilPerusahaan.php'; </script>";
    }
}

function getUser($id)
{
    global $conn;
    $query = "SELECT * FROM user WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    $_SESSION['user'] = mysqli_fetch_assoc($result);
}

function getData($user)
{
    global $conn;
    $query = "SELECT * FROM perusahaan WHERE user = '$user'";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_assoc($result);
}
