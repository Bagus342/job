<?php
require('session/session.php');
require('read/perusahaan.php');
require('read/rekrutmen.php');
check();
$data = read();
$lamaran = getLamaran();
if (isset($_GET['logout'])) {
    session_unset();
    check();
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
    <link rel="stylesheet" href="css/profilPerusahaan.css">
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
        <div class="judul-profil">
            <h1 style="margin-top: 1.5em;">Profil Company</h1>
        </div>

        <div class="konten">
            <div class="profil border">
                <img <?php $data['profile'] == '' ? print 'src="img/img/default/profile.png"' : print 'src="img/img/' . $data['profile'] . '"' ?>>
                <p><?php echo $data['nama'] ?></p>
                <div class="edit">
                    <a href="EditProfilPerusahaan.php">Edit Profil</a>
                </div>
            </div>
            <div class="biodata-user border">
                <div class="biodata">
                    <div class="info1"><label>Email</label></div>
                    <div class="info2">
                        <p style="padding: 28px 0 0px 0px;"><?php echo $data['email'] ?></p>
                    </div>
                </div>
                <div class="biodata border-top">
                    <div class="info1"><label>Nama</label></div>
                    <div class="info2">
                        <p style="padding: 28px 0 0px 0px;"><?php echo $data['nama'] ?></p>
                    </div>
                </div>
                <div class="biodata border-top">
                    <div class="info1"><label>Alamat</label></div>
                    <div class="info2">
                        <p style="padding: 28px 0 0px 0px;"><?php echo $data['alamat'] ?></p>
                    </div>
                </div>
                <div class="biodata border-top">
                    <div class="info1"><label>No. Telpon</label></div>
                    <div class="info2">
                        <p style="padding: 28px 0 0px 0px;"><?php echo $data['no'] ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="post border">
            <div class="parent" style="border-bottom: 1px solid #e0e0e0; padding-bottom: .5em;">
                <div class="judul-post">
                    <h3>Lamaran</h3>
                </div>
                <div class="tambah">
                    <a href="TambahLamaran.php?perusahaan=<?php echo $data['id'] ?>" class="btn btn-primary">Tambah</a>
                </div>
            </div>
            <?php foreach ($lamaran as $value) : ?>
                <div class="konten-post" style="border-bottom: 1px solid #e0e0e0; padding-bottom: .5em; margin-bottom: 0;">
                    <div class="judul-post">
                        <p style="margin-top: .2em;"><?= $value['pekerjaan'] ?></p>
                    </div>
                    <div class="detail">
                        <a href="DetailLamaran.php?id=<?= $value['id'] ?>" class="btn btn-secondary">Detail</a>
                        <a href="delete/rekrutmen.php?id=<?= $value['id'] ?>" class="btn btn-danger">Hapus</a>
                    </div>
                </div>
            <?php endforeach ?>
        </div>

    </div>

    <!-- content ends -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>