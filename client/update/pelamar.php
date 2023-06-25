<?php
include('/xampp/htdocs/web/db/connection.php');
function upload($img)
{
    $namaFile = $img['name'];
    $tmp_name = $img['tmp_name'];
    $split = explode('.', $namaFile);
    $ekstensi = strtolower(end($split));
    $uniq = uniqid() . '.' . $ekstensi;
    move_uploaded_file($tmp_name, 'img/img/' . $uniq);

    return $uniq;
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

function update($user, $email, $password, $nama, $alamat, $no, $jenjang, $sekolah, $kota, $tgl)
{
    global $conn;
    if (validateUpdate($user, $email)) {
        $_FILES['ijazah']['error'] == 4 ? $ijazah = getData($user)['ijazah'] : $ijazah = upload($_FILES['ijazah']);
        $_FILES['ktp']['error'] == 4 ? $ktp = getData($user)['ktp'] : $ktp = upload($_FILES['ktp']);
        $_FILES['cv']['error'] == 4 ? $cv = getData($user)['cv'] : $cv = upload($_FILES['cv']);
        $_FILES['profile']['error'] == 4 ? $profile = getData($user)['profil'] : $profile = upload($_FILES['profile']);
        $split = explode('/', $tgl);
        strlen($tgl) == 0 ? $new = "0000-00-00" : $new = $split[2] . '-' . $split[1] . '-' . $split[0];
        $jenjang === "" && $sekolah === "" ?  $pendidikan = $jenjang . $sekolah : $pendidikan = $jenjang . " - " . $sekolah;
        $query = "UPDATE pelamar P INNER JOIN user U ON U.id = '$user' SET 
            U.email = '$email',
            U.password = '$password',
            P.profil = '$profile',
            P.nama = '$nama',
            P.alamat = '$alamat',
            P.no = '$no',
            P.jenjang = '$pendidikan',
            P.kota = '$kota',
            P.tgl = '$new',
            P.ijazah = '$ijazah',
            P.ktp = '$ktp',
            P.cv = '$cv'
        ";
        $result =  mysqli_query($conn, $query);
        getUser($user);
        header('Location: profilUser.php');
    } else {
        echo "<script> alert('email telah terdaftar !'); document.location.href = 'EditProfil.php'; </script>";
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
    $query = "SELECT * FROM pelamar WHERE user = '$user'";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_assoc($result);
}

function getJenjang($user)
{
    global $conn;
    $query = "SELECT * FROM pelamar WHERE user = '$user'";
    $result = mysqli_query($conn, $query);
    $jenjang = mysqli_fetch_assoc($result);
    if (strlen($jenjang["jenjang"]) == 0) {
        return array("jenjang" => "", "asal" => "");
    } else {
        $split = explode(' - ', $jenjang['jenjang']);
        $data = array("jenjang" => $split[0], "asal" => $split[1]);
        return $data;
    }
}

function getTgl($user)
{
    global $conn;
    $query = "SELECT * FROM pelamar WHERE user = '$user'";
    $result = mysqli_fetch_assoc(mysqli_query($conn, $query));
    $tgl = explode('-', $result['tgl']);
    $tgl[0] == '0000' ? $split = "" : $split = $tgl[2] . '/' . $tgl[1] . '/' . $tgl[0];
    return $split;
}
