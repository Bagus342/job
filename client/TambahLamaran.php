<?php
include('session/session.php');
include('create/rekrutmen.php');
include('../admin/read/pekerjaan.php');
check();
$kategori = getKategori();
$data = read("SELECT * FROM pekerjaan");
$pekerjaan = json_encode($data);
if (isset($_GET['logout'])) {
    session_unset();
    check();
}
if (isset($_POST['submit'])) {
    create($_POST['deskripsi'], $_POST['kategori'], $_POST['pekerjaan']);
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
    <link rel="stylesheet" href="css/tambahLamaran.css">
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
            <h1>Tambah Lamaran</h1>
        </div>

        <div class="konten">
            <form action="" method="post">
                <div class="biodata">
                    <div class="info1"><label>Kategori</label></div>
                    <select class="form-select" onchange="getKategori()" name="kategori" id="kategori" aria-label="Default select example" required>
                        <option value="" disabled selected>Pilih Kategori</option>
                        <?php foreach ($kategori as $value) : ?>
                            <option value="<?= $value['id'] ?>"><?= $value['nama'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="biodata">
                    <div class="info1"><label>Pekerjaan</label></div>
                    <select class="form-select" id="pekerjaan" name="pekerjaan" aria-label="Default select example" required>
                        <option value="" disabled selected>Pilih Pekerjaan</option>
                    </select>
                </div>
                <div class="biodata">
                    <div class="info1"><label>Deskripsi</label></div>
                    <textarea class="form-control" name="deskripsi" id="textarea" required></textarea>
                </div>
                <div class="save">
                    <button type="submit" name="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>

    <!-- content ends -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>
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