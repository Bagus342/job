<?php
require('session/session.php');
require('read/home.php');
require('../admin/read/pekerjaan.php');
$rekrut = readHome();
$kategori = getKategori();
$pekerjaan = json_encode(read("SELECT * FROM pekerjaan"));
if (isset($_GET['search'])) {
    $param1 = count($_GET) == 1 ? null : $_GET['kategori'];
    $param2 = count($_GET) != 3 ? null : $_GET['pekerjaan'];
    $rekrut = search($param1, $param2);
}
if (isset($_POST['lamar'])) {
    pengajuan($_GET['detail'], $_SESSION['user']['id']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="css/home.css">
    <style>
        body {
            background-color: #f5f5f5;
        }

        .row1 {
            border-bottom: 1px solid grey;
            position: sticky;
            top: 0;
            background-color: white;
        }

        .row2 {
            display: flex;
        }

        .search form {
            padding: 1em;
            display: flex;
            justify-content: space-around;
        }

        .search select {
            width: 20em;
        }

        .search label {
            padding-top: .4em;
        }

        .items {
            border-radius: 10px;
            padding: .8em;
            background-color: white;
            margin-top: 1em;
        }

        .column1 {
            width: 25em;
            padding: 0 1em 1em 1em;
        }

        .items img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }

        .column2 {
            position: fixed;
            top: 8.468em;
            right: 1em;
            background-color: white;
            width: 54em;
            height: 29.4em;
            border-left: 1px solid grey;
            text-align: center;
        }

        .content {
            padding: 4em;
        }

        .column2 img {
            width: 350px;
            height: 300px;
            display: inline-block;
        }

        .items p {
            margin-left: .5em;
        }
    </style>
    <title>Job Street</title>
</head>

<body>
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
    <div class="base">
        <div class="row1">
            <div class="search">
                <form method="get">
                    <label for="">Kategori</label>
                    <select class="form-select" name="kategori" onchange="getKategori()" id="kategori">
                        <option value="" disabled selected>Pilih Kategori...</option>
                        <?php foreach ($kategori as $value) : ?>
                            <option value="<?= $value['id'] ?>"><?= $value['nama'] ?></option>
                        <?php endforeach ?>
                    </select>
                    <label for="">Pekerjaan</label>
                    <select class="form-select" id="pekerjaan" name="pekerjaan">
                        <option value="" disabled selected>Pilih Pekerjaan...</option>
                    </select>
                    <button name="search" class="btn btn-primary">Search</button>
                </form>
            </div>
        </div>
        <div class="row2">
            <div class="column1">
                <?php foreach ($rekrut as $value) : ?>
                    <a href="home.php?detail=<?= $value['id'] ?>" style="text-decoration: none;">
                        <div class="items">
                            <div class="profil">
                                <img <?php $value['profile'] === '' ? print 'src="img/img/default/profile.png"' : print 'src="img/img/' . $value['profile'] . '"'  ?> alt="">
                            </div>
                            <div class="text">
                                <p style="font-size: 1.3em; margin: .5em 0 0 0; color: black;"><?= $value['pekerjaan'] ?></p>
                                <p style="margin: 0;color: black;"><?= $value['nama'] ?></p>
                            </div>
                        </div>
                    </a>
                <?php endforeach ?>
            </div>
            <div class="overflow-auto column2">
                <?php if (isset($_GET['detail'])) : ?>
                    <?php $detail = getDetail($_GET['detail']);
                    ?>
                    <div class="content" style="padding: 0;">
                        <div class="lamar" style="display: flex; position: sticky; top: 0; background-color: white; padding: 1em; justify-content: space-between; border-bottom: 1px solid #d9d9d9;">
                            <form action="" method="post">
                                <button name="lamar" class="btn btn-primary" <?php $_SESSION['user']['role'] != 'pelamar' ? print 'disabled' : print '' ?>>Lamar Sekarang</button>
                            </form>
                            <a href="home.php" style="text-decoration: none; color: black; margin: .5em 0 0 0;">Tutup</a>
                        </div>
                        <div class="detail" style="text-align: left; padding: 2em;">
                            <img <?php $detail['profile'] === '' ? print 'src="img/img/default/profile.png"' : print 'src="img/img/' . $detail['profile'] . '"'  ?> style="width: 100px; height: 100px; border-radius: 50%;">
                            <p style="font-size: 1.1em; margin: .8em 0 0 0;"><?php print $detail['pekerjaan'] ?></p>
                            <p style="font-size: 1.1em; margin: 0 0 0 0;"><?php print $detail['nama'] ?></p>
                            <p style="font-size: 1.1em; margin: 0 0 0 0;"><?php print $detail['alamat'] ?></p>
                            <p style="font-size: 1.1em; margin: 0 0 0 0;"><?php print $detail['no'] ?></p>
                            <p style="font-size: 1.1em; margin: 2em 0 1em 0;">Deskripsi Pekerjaan</p>
                            <p><?php print $detail['deskripsi'] ?></p>
                        </div>
                    </div>
                <?php else : ?>
                    <div class="content">
                        <img src="img/search.png" alt="">
                        <p>Pilih lowongan untuk melihat detail</p>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script>
        window.addEventListener('scroll', event => {
            let column2 = document.querySelector('.column2')
            let count = window.scrollY
            if (count > 50) {
                $('.column2').css('top', '4.5em')
                $('.column2').css('height', '33.22em')
            } else {
                $('.content').css('padding', '4em')
            }
        })

        const getKategori = () => {
            let kategori = document.getElementById('kategori').value
            var pekerjaan = [<?php echo $pekerjaan ?>]
            let select = document.getElementById('pekerjaan')
            if (select.length > 1) {
                $('#pekerjaan option').each(function(e, i) {
                    if (e > 0) {
                        this.remove(e)
                    }
                })
            }
            pekerjaan[0].forEach((element, i) => {
                if (element.kategori == kategori) {
                    let option = document.createElement('option')
                    option.value = element.nama
                    option.text = element.nama
                    select.add(option)
                }
            });
        }
    </script>
</body>

</html>