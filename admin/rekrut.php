<?php
require('read/rekrutmen.php');
$rekrut = read("SELECT r.*, p.nama, k.nama as kategori FROM rekrutmen r 
INNER JOIN perusahaan p ON r.perusahaan = p.id
INNER JOIN kategori k ON r.kategori = k.id
");
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
  <link rel="stylesheet" type="text/css" href="profile.css">
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
    <h3><i class="fa-solid fa-bars-progress mr-2"></i>REKRUTMEN</h3>
    <hr>
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama Perusahaan</th>
          <th scope="col">Kategori</th>
          <th scope="col">Pekerjaan</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <?php $i = 1; ?>
      <?php if ($rekrut == null) { ?>
        <tbody>
          <tr>
            <td colspan="5" style="text-align: center;">Tidak ada data</td>
          </tr>
        </tbody>
      <?php } ?>
      <?php foreach ($rekrut as $value) : ?>
        <tbody>
          <tr>
            <th scope="row"><?= $i ?></th>
            <td><?= $value['nama'] ?></td>
            <td><?= $value['kategori'] ?></td>
            <td><?= $value['pekerjaan'] ?></td>
            <td>
              <button class="btn btn-secondary" data-toggle="modal" data-target="#detailrec<?= $value['id'] ?>">Detail</button>
              <a href="" class="btn btn-danger">Hapus</a>
            </td>
          </tr>
        </tbody>
        <div id="detailrec<?= $value['id'] ?>" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Detail Rekrutmen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="prof">
                  <div class="bio">
                    <div class="data">
                      <p class="head">Nama Perusahaan</p>
                      <p class="value"><?= $value['nama'] ?></p>
                    </div>
                  </div>
                  <div class="bio">
                    <div class="data">
                      <p class="head">Kategori</p>
                      <p class="value"><?= $value['kategori'] ?></p>
                    </div>
                  </div>
                  <div class="bio">
                    <div class="data">
                      <p class="head">Pekerjaan</p>
                      <p class="value"><?= $value['pekerjaan'] ?></p>
                    </div>
                  </div>
                  <div class="bio">
                    <div class="data">
                      <p class="head">Deskripsi</p>
                      <textarea class="form-control" style="max-width: 75%; margin: .5em 0 .5em 2em; height: 10em;" rows="3"><?= $value['deskripsi'] ?></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <div class=" modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <?php $i++ ?>
      <?php endforeach ?>
    </table>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="admin.js"></script>
</body>

</html>