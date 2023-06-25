<?php
require('session/session.php');
require('read/rekrutmen.php');
require('read/pengajuan.php');
check();
$lamaran = getDetail($_GET['id']);
$pengajuan = getPengajuan();
if (isset($_GET['logout'])) {
    session_unset();
    check();
}

if (isset($_POST['apply'])) {
    apply($_POST['id']);
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
    <link rel="stylesheet" href="css/detailLamaran.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .pictProf {
            margin: auto;
            width: 100px;
            height: 100px;
            overflow: hidden;
            border-radius: 50%;
        }

        .pictProf img {
            width: 100%;
            height: auto;
        }

        .data {
            display: flex;
            border-bottom: 1px solid rgb(221, 221, 221);
        }

        .data .value {
            margin-left: 2em;
        }

        .data .head {
            font-weight: bold;
            width: 10em;
        }

        .data p {
            margin-top: .7em;
        }

        .data a {
            margin-top: .7em;
        }

        .data textarea {
            overflow-y: scroll;
            height: 100px;
            resize: none;
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
            <h1>Detail Lamaran</h1>
        </div>

        <div class="konten">
            <div class="biodata">
                <div class="info1"><label>Kategori</label></div>
                <select class="form-select" aria-label="Default select example">
                    <option disabled selected><?php print $lamaran['kategori'] ?></option>
                </select>
            </div>
            <div class="biodata">
                <div class="info1"><label>Pekerjaan</label></div>
                <select class="form-select" aria-label="Default select example">
                    <option selected disabled><?php print $lamaran['pekerjaan'] ?></option>
                </select>
            </div>
            <div class="biodata">
                <div class="info1"><label>Deskripsi</label></div>
                <textarea class="form-control" id="textarea" disabled><?php print $lamaran['deskripsi'] ?></textarea>
            </div>
            <div class="pelamar" style="border: 1px solid rgb(201, 201, 201); padding: 1.5em; border-radius: 10px;">
                <div class="judul">
                    <h3>Pelamar</h3>
                </div>
                <div class="content">
                    <?php foreach ($pengajuan as $value) : ?>
                        <?php
                        $split = explode('-', $value['tgl']);
                        $value['tgl'] === '0000-00-00' ? $tgl = '' : $tgl = $split[2] . "/" . $split[1] . "/" . $split[0];
                        ?>
                        <div style="display: flex; justify-content: space-between; height: 4em; border-top: 1px solid rgb(211, 211, 211);">
                            <p style="margin: 1.2em 0 0 1em; font-weight: bold;"><?= $value['nama'] ?></p>
                            <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#detail<?= $value['user'] ?>" style="height: 2.4em; margin: .9em 1em 0 0;">Detail</button>
                        </div>

                        <div class="modal fade" id="detail<?= $value['user'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalScrollableTitle">Detail Pelamar | <?= $value['status'] == false ? 'Belum Apply' : 'Sudah Apply' ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="prof">
                                            <div class="pictProf">
                                                <img <?= $value['profil'] === '' ? print 'src="img/img/default/profile.png"' : print 'src="img/img/' . $value['profil'] . '"' ?> alt="">
                                            </div>
                                            <div class="bio">
                                                <div class="data">
                                                    <p class="head">Nama</p>
                                                    <p class="value"><?= $value['nama'] ?></p>
                                                </div>
                                            </div>
                                            <div class="bio">
                                                <div class="data">
                                                    <p class="head">Email</p>
                                                    <p class="value"><?= $value['email'] ?></p>
                                                </div>
                                            </div>
                                            <div class="bio">
                                                <div class="data">
                                                    <p class="head">Alamat</p>
                                                    <p class="value"><?= $value['alamat'] ?></p>
                                                </div>
                                            </div>
                                            <div class="bio">
                                                <div class="data">
                                                    <p class="head">No Telepon</p>
                                                    <p class="value"><?= $value['no'] ?></p>
                                                </div>
                                            </div>
                                            <div class="bio">
                                                <div class="data">
                                                    <p class="head">Jenjang</p>
                                                    <p class="value"><?= $value['jenjang'] ?></p>
                                                </div>
                                            </div>
                                            <div class="bio">
                                                <div class="data">
                                                    <p class="head">Tempat, Tanggal Lahir</p>
                                                    <p class="value"><?= $value['kota'] . ', ' . $tgl ?></p>
                                                </div>
                                            </div>
                                            <div class="bio">
                                                <div class="data">
                                                    <p class="head">Ijazah</p>
                                                    <a href="img/img/<?= $value['ijazah'] ?>" class="value"><?= $value['ijazah'] ?></a>
                                                </div>
                                            </div>
                                            <div class="bio">
                                                <div class="data">
                                                    <p class="head">Ktp</p>
                                                    <a href="img/img/<?= $value['ktp'] ?>" class="value"><?= $value['ktp'] ?></a>
                                                </div>
                                            </div>
                                            <div class="bio">
                                                <div class="data">
                                                    <p class="head">Cv</p>
                                                    <a href="img/img/<?= $value['cv'] ?>" class="value"><?= $value['cv'] ?></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <form action="" method="post">
                                            <input type="text" name="id" hidden value="<?= $value['id'] ?>">
                                            <button type="button" name="apply" <?= $value['status'] == false ? '' : print 'disabled' ?> class="btn btn-primary" data-bs-dismiss="modal">Apply</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
            <div class="kembali" style="margin: 2em 0 2em 0; justify-content: flex-end; display: flex;">
                <a href="profilPerusahaan.php" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>

    <!-- content ends -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>