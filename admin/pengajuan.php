<?php
require('read/pengajuan.php');
$pengajuan = read();
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="admin.css">
    <script src="https://kit.fontawesome.com/180e110f30.js" crossorigin="anonymous"></script>
    <title>Hello, world!</title>
</head>

<body>
    <?php
    include('navbar.php');
    ?>
    <?php
    include('menu.php');
    ?>
    <div class="col-md-10 p-5 pt-2">
        <h3><i class="fas fa-briefcase mr-2"></i>DAFTAR PENGAJUAN</h3>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Pelamar</th>
                    <th scope="col">Nama Perusahaan</th>
                    <th scope="col">Pekerjaan</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <?php $i = 1; ?>
            <?php if ($pengajuan == null) { ?>
                <tbody>
                    <tr>
                        <td colspan="4" style="text-align: center;">Tidak ada data</td>
                </tbody>
            <?php } else { ?>
                <?php foreach ($pengajuan as $value) : ?>
                    <tbody>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $value["nama"] ?></td>
                            <td><?= $value["perusahaan"] ?></td>
                            <td><?= $value["pekerjaan"] ?></td>
                            <td><?= $value["status"] == false ? 'Belum Apply' : 'Sudah Apply' ?></td>
                        </tr>
                    </tbody>
                    <?php $i++ ?>
                <?php endforeach ?>
            <?php } ?>
        </table>
    </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="admin.js"></script>
</body>

</html>