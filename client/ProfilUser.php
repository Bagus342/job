<?php
require('session/session.php');
require('read/pelamar.php');
check();
$data = read();
$pengajuan = getPengajuan();
$split = explode('-', $data['tgl']);
$data['tgl'] === '0000-00-00' ? $tgl = '' : $tgl = $split[2] . "/" . $split[1] . "/" . $split[0];
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
    <link rel="stylesheet" href="css/profilUser.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .rekrut {
            margin-top: 2em;
            border: 1px solid grey;
            border-radius: 10px;
            padding: 2em;
        }

        .content {
            margin-top: 2em;
        }

        .content .isi {
            display: flex;
            justify-content: space-between;
            padding: 1em;
            border-top: 1px solid grey;
        }

        .isi p {
            margin-bottom: 0;
            padding-top: .35em;
        }

        .biodata {
            border-top: 1px solid grey;
            height: 3.455em;
        }
    </style>
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
            <h2 style="margin-top: 1.5em;">My Profil</h2>
        </div>

        <div class="konten">
            <div class="profil border">
                <img style="margin-top: 7em;" <?php $data['profil'] == '' ? print 'src="img/img/default/profile.png"' : print 'src="img/img/' . $data['profil'] . '"' ?>>
                <p><?php print($data['nama']) ?></p>
                <div class="edit">
                    <a href="EditProfil.php">Edit Profil</a>
                </div>
            </div>
            <div class="biodata-user">
                <div class="biodata">
                    <div class="info1"><label style="padding: .78em">Nama Lengkap</label></div>
                    <div class="info2">
                        <p style="padding: .8em 0 0 0;"><?php print($data['nama']) ?></p>
                    </div>
                </div>
                <div class="biodata">
                    <div class="info1"><label style="padding: .78em">Email</label></div>
                    <div class="info2">
                        <p style="padding: .8em 0 0 0;"><?php print($data['email']) ?></p>
                    </div>
                </div>
                <div class="biodata">
                    <div class="info1"><label style="padding: .78em">Alamat</label></div>
                    <div class="info2">
                        <p style="padding: .8em 0 0 0;"><?php print($data['alamat']) ?></p>
                    </div>
                </div>
                <div class="biodata">
                    <div class="info1"><label style="padding: .78em">No. Telpon</label></div>
                    <div class="info2">
                        <p style="padding: .8em 0 0 0;"><?php print($data['no']) ?></p>
                    </div>
                </div>
                <div class="biodata">
                    <div class="info1"><label style="padding: .78em">Tempat, Tgl Lahir</label></div>
                    <div class="info2">
                        <p style="padding: .8em 0 0 0;"><?php print $data['kota'] . ", " . $tgl ?></p>
                    </div>
                </div>
                <div class="biodata">
                    <div class="info1"><label style="padding: .78em">Pendidikan</label></div>
                    <div class="info2">
                        <p style="padding: .8em 0 0 0;"><?php print($data['jenjang']) ?></p>
                    </div>
                </div>
                <div class="biodata">
                    <div class="info1"><label style="padding: .78em">Ijazah</label></div>
                    <div class="info2" style="padding: .8em 0 0 0;">
                        <a <?php $data['ijazah'] === '' ? print 'href=""' : print 'href="img/img/' . $data['ijazah'] . '"' ?>><?php print $data['ijazah'] ?></a>
                    </div>
                </div>
                <div class="biodata">
                    <div class="info1"><label style="padding: .78em">KTP</label></div>
                    <div class="info2" style="padding: .8em 0 0 0;">
                        <a <?php $data['ktp'] === '' ? print 'href=""' : print 'href="img/img/' . $data['ktp'] . '"' ?>><?php print $data['ijazah'] ?></a>
                    </div>
                </div>
                <div class="biodata">
                    <div class="info1"><label style="padding: .78em">CV</label></div>
                    <div class="info2" style="padding: .8em 0 0 0;">
                        <a <?php $data['cv'] === '' ? print 'href=""' : print 'href="img/img/' . $data['cv'] . '"' ?>><?php print $data['ijazah'] ?></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="rekrut" style="margin-bottom: 1em;">
            <div class="judul">
                <h3>Lamaran</h3>
            </div>
            <div class="content">
                <?php foreach ($pengajuan as $value) : ?>
                    <div class="isi">
                        <p><?= $value['nama'] ?> | <?= $value['status'] == false ? 'Belum Apply' : 'Sudah Apply' ?></p>
                        <a href="delete/pengajuan.php?id=<?= $value['id'] ?>" class="btn btn-danger"> Delete</a>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>

    <!-- content ends -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>