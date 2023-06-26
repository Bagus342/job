<?php
require('session/session.php');
require('update/perusahaan.php');
check();
if (isset($_GET["logout"])) {
    session_unset();
    // session_destroy();
    check();
}
if (isset($_POST["submit"])) {
    if ($_FILES['profile']['error'] == 4) {
        var_dump(getData($_SESSION["user"]["id"])['profile']);
        update($_SESSION["user"]["id"], $_POST["email"], $_POST["password"], $_POST["nama"], $_POST["alamat"], $_POST["no"], getData($_SESSION["user"]["id"])['profile']);
    } else {
        update($_SESSION["user"]["id"], $_POST["email"], $_POST["password"], $_POST["nama"], $_POST["alamat"], $_POST["no"], $_FILES['profile']);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="css/editProfilPerusahaan.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Job Street</title>
</head>

<body>

    <!-- navbar starts  -->

    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <a class="navbar-brand" href="#"><span class="text-warning">Job</span>Street</a>
            <a href="home.php" style="background-color: transparent; border: none; margin: 0 0 0 52em; text-decoration: none; color: black;">Home</a>
            <div class="dropdown">
                <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person"></i>
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="<?php $_SESSION['user']['role'] == 'pelamar' ? print 'ProfilUser.php' : print 'ProfilPerusahaan.php' ?>">My Profil</a></li>
                    <li><a class="dropdown-item" href="profilUser.php?logout=true">Log Out</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- navbar ends -->

    <!-- content -->

    <div class="container">
        <div class="judul">
            <h1>Edit Profil Company</h1>
        </div>

        <div class="konten">
            <div class="profil">
                <form action="" method="post" enctype="multipart/form-data">
                    <img id="profile" style="cursor: pointer;" <?php getData($_SESSION['user']['id'])['profile'] === '' ? print 'src="img/img/default/Avatar.png"' : print 'src="img/img/' . getData($_SESSION['user']['id'])['profile'] . '"'  ?>>
                    <input style="display: none;" type="file" name="profile" id="upload">
            </div>
            <div class="biodata-user ">
                <div class="biodata">
                    <div class="info1"><label>Email</label></div>
                    <div class="info2"><input type="text" value="<?php print($_SESSION["user"]["email"]) ?>" name="email" class="form-control shadow-none" placeholder="Email"></div>
                </div>
                <div class="biodata">
                    <div class="info1"><label>Password</label></div>
                    <div class="info2"><input type="password" value="<?php print($_SESSION["user"]["password"]) ?>" name="password" class="form-control shadow-none" placeholder="Password"></div>
                </div>
                <div class="biodata">
                    <div class="info1"><label>Nama Perusahaan</label></div>
                    <div class="info2"><input type="text" value="<?php print(getData($_SESSION["user"]["id"])['nama']) ?>" name="nama" class="form-control shadow-none" placeholder="Nama Perusahaan"></div>
                </div>
                <div class="biodata">
                    <div class="info1"><label>Alamat</label></div>
                    <div class="info2"><input type="text" value="<?php print(getData($_SESSION["user"]["id"])['alamat']) ?>" name="alamat" class="form-control shadow-none" placeholder="Alamat"></label></div>
                </div>
                <div class="biodata">
                    <div class="info1"><label>No. Telpon</label></div>
                    <div class="info2"><input type="text" value="<?php print(getData($_SESSION["user"]["id"])['no']) ?>" name="no" class="form-control shadow-none" placeholder="No. Telpon"></label></div>
                </div>
                <div class="save">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- content ends -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        $("#profile").click(function(e) {
            $("#upload").click();
        });
    </script>
</body>

</html>