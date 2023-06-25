<?php
require('session/session.php');
require('update/pelamar.php');
check();
$jenjang = array("SMA", "SMK", "S1", "S2", "S3");
if (isset($_GET["logout"])) {
    session_unset();
    // session_destroy();
    check();
}
if (isset($_POST["submit"])) {
    update($_SESSION["user"]["id"], $_POST["email"], $_POST["password"], $_POST["nama"], $_POST["alamat"], $_POST["no"], $_COOKIE['jenjang'], $_POST['tempat'], $_POST["asal"], $_POST["tgl"]);
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
    <link rel="stylesheet" href="css/editProfil.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />
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
            <h1>Edit Profil</h1>
        </div>

        <div class="konten">

            <div class="profil">
                <form action="" method="post" enctype="multipart/form-data">
                    <img id="profile" style="cursor: pointer;" <?php getData($_SESSION['user']['id'])['profil'] === '' ? print 'src="img/img/default/profile.png"' : print 'src="img/img/' . getData($_SESSION['user']['id'])['profil'] . '"'  ?>>
                    <input style="display: none;" onchange="getProfile()" type="file" name="profile" id="upload">
            </div>
            <div class="biodata-user ">
                <div class="biodata">
                    <div class="info1"><label>Email</label></div>
                    <div class="info2"><input type="text" value="<?php print($_SESSION["user"]["email"]) ?>" name="email" class="form-control shadow-none" placeholder="Email"></div>
                </div>
                <div class="biodata">
                    <div class="info1"><label>Password</label></div>
                    <div class="info2"><input type="password" value="<?php print($_SESSION["user"]["password"]) ?>" name="password" class="form-control shadow-none" placeholder="Email"></div>
                </div>
                <div class="biodata">
                    <div class="info1"><label>Nama Lengkap</label></div>
                    <div class="info2"><input type="text" value="<?php print(getData($_SESSION['user']['id'])['nama']) ?>" name="nama" class="form-control shadow-none" placeholder="Nama Lengkap" required></div>
                </div>
                <div class="biodata">
                    <div class="info1"><label>TTL</label></div>
                    <div class="info2">
                        <div class="row">
                            <div class="col">
                                <input type="text" name="asal" value="<?php print(getData($_SESSION['user']['id'])['kota']) ?>" class="form-control" placeholder="Tempat" aria-describedby="basic-addon1">
                            </div>
                            <div class="col">
                                <input class="form-control" id="date" value="<?php print(getTgl($_SESSION['user']['id'])) ?>" name="tgl" placeholder="DD/MM/YYY" type="text" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="biodata">
                    <div class="info1"><label>Alamat</label></div>
                    <div class="info2"><input type="text" name="alamat" onkeypress="profile()" value="<?php print(getData($_SESSION["user"]["id"])["alamat"]) ?>" class="form-control shadow-none" placeholder="Alamat"></label></div>
                </div>
                <div class="biodata">
                    <div class="info1"><label>No. Telpon</label></div>
                    <div class="info2"><input type="text" name="no" onkeypress="return onlyNumberKey(event)" value="<?php print(getData($_SESSION["user"]["id"])["no"]) ?>" class="form-control shadow-none" placeholder="No. Telpon"></label></div>
                </div>
                <div class="biodata">
                    <div class="info1"><label>Jenjang Pendidikan</label></div>
                    <div class="info2">
                        <div class="row">
                            <div class="col">
                                <select class="form-select" onchange="change()" id="jenjang">
                                    <option value="" disabled selected>Pilih Jenjang</option>
                                    <?php foreach ($jenjang as $value) : ?>
                                        <option value="<?php $value ?>" <?php if ($value == getJenjang($_SESSION["user"]["id"])['jenjang']) {
                                                                            echo 'selected="selected"';
                                                                        } ?>><?= $value ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col">
                                <input type="text" name="tempat" value="<?php print(getJenjang($_SESSION["user"]["id"])['asal']) ?>" class="form-control shadow-none" placeholder="Asal Pendidikan">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="biodata">
                    <div class="info1"><label>Ijazah</label></div>
                    <div class="info2"><input type="file" name="ijazah" class="form-control shadow-none" placeholder="Ijazah"></div>
                </div>
                <div class="biodata">
                    <div class="info1"><label>KTP</label></div>
                    <div class="info2"><input type="file" name="ktp" class="form-control shadow-none" placeholder="KTP"></div>
                </div>
                <div class="biodata">
                    <div class="info1"><label>CV</label></div>
                    <div class="info2"><input type="file" name="cv" class="form-control shadow-none" placeholder="CV"></div>
                </div>
                <div class="save">
                    <button type="submit" onclick="asd()" name="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
            </form>
        </div>
    </div>

    <!-- content ends -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <script>
        $("#profile").click(function(e) {
            $("#upload").click();
        });
    </script>
    <script>
        $(document).ready(function() {
            var date_input = $('input[name="tgl"]'); //our date input has the name "date"
            var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
            var options = {
                format: 'dd/mm/yyyy',
                container: container,
                orientation: "top",
                todayHighlight: true,
                autoclose: true,
            };
            date_input.datepicker(options);
        })

        function onlyNumberKey(evt) {

            // Only ASCII character in that range allowed
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
            if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                return false;
            return true;
        }

        function change() {
            var jenjang = document.getElementById("jenjang");
            if (jenjang.options[jenjang.selectedIndex].text === "Pilih Jenjang") {
                document.cookie = `jenjang = `;
            } else {
                document.cookie = `jenjang = ${jenjang.options[jenjang.selectedIndex].text}`;
            }
        }
        if (jenjang.options[jenjang.selectedIndex].text === "Pilih Jenjang") {
            document.cookie = `jenjang = `;
        } else {
            document.cookie = `jenjang = ${jenjang.options[jenjang.selectedIndex].text}`;
        }
    </script>
</body>

</html>