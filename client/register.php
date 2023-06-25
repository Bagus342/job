<?php
require('create/register.php');
if (isset($_POST['submit'])) {
    $user = create($_POST['email'], $_POST['password'], $_POST['role']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login&Register</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <input type="checkbox" id="check">
        <div class="login form">
            <header>form registrasi</header>
            <form action="" method="post">
                <input type="text" name="email" placeholder="masukan email" required>
                <input type="password" name="password" placeholder="masukan password" required>
                <select id="disabledSelect" class="form-select" name="role" required>
                    <option value="" selected disabled>Daftar Sebagai</option>
                    <option value="pelamar">Pelamar</option>
                    <option value="perusahaan">Perusahaan</option>
                </select>
                <input type="submit" class="button" name="submit" value="Daftar">

            </form>
            <div class="signup">
                <span class="signup">sudah punya akun?
                    <a href="login.php" for="check">Login</a>
                </span>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>