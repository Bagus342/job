<?php
require('/xampp/htdocs/web/db/connection.php');

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

function update($email, $password, $role, $id)
{
    global $conn;
    if (validateUpdate($id, $email)) {
        $query = "UPDATE user SET 
                email = '$email',
                password = '$password',
                role = '$role'
                WHERE id = '$id'
            ";
        mysqli_query($conn, $query);
        if (mysqli_error($conn) == null) {
            echo "<script> alert('Data berhasil diupdate !'); document.location.href = 'user.php'; </script>";
        } else {
            print(mysqli_error($conn));
        }
    } else {
        echo "<script> alert('Akun telah terdaftar !'); document.location.href = 'user.php'; </script>";
    }
}
