<?php
require('read/dashboard.php');
$pelamar = pelamar();
$perusahaan = perusahaan();
$rekrutmen = rekrutmen();
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
  <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
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
    <h3><i class="fa-sharp fa-solid fa-gauge-high mr-2"></i>DASHBOARD</h3>
    <hr>
    <div class="row text-white">
      <div class="card bg-info ml-5 mt-4" style="width: 18rem;">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fa-solid fa-user mr-2"></i>
          </div>
          <h5 class="card-title">JUMLAH PELAMAR</h5>
          <div class="display-4"><?php print count($pelamar) ?></div>
        </div>
      </div>

      <div class="card bg-success ml-5 mt-4" style="width: 18rem;">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fa-solid fa-building mr-4"></i>
          </div>
          <h5 class="card-title">JUMLAH PERUSAHAAN</h5>
          <div class="display-4"><?php print count($perusahaan) ?></div>
        </div>
      </div>

      <div class="card bg-danger ml-5 mt-4" style="width: 18rem;">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fa-solid fa-bars-progress mr-2"></i>
          </div>
          <h5 class="card-title">REKRUTMEN</h5>
          <div class="display-4"><?php print count($rekrutmen) ?></div>
        </div>
      </div>
    </div>
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