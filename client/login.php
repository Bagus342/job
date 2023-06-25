<?php
require('session/session.php');
if (isset($_POST['submit'])) {
    login($_POST['email'], $_POST['password']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login&Register</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <input type="checkbox" id="check">
        <div class="login form">
            <header>form login</header>
            <form action="" method="post">
                <input type="text" name="email" placeholder="masukan email" required>
                <input type="password" name="password" placeholder="masukan password" required>
                <input type="submit" name="submit" value="login" class="button">
            </form>
            <div class="signup">
                <span class="signup">belum punya akun?
                    <a href="register.php" for="check">Daftar</a>
                </span>
            </div>
        </div>
    </div>
</body>

</html>