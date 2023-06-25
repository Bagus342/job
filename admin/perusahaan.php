<?php
require('read/perusahaan.php');
require('create/perusahaan.php');
$company = read("SELECT P.id, U.email, P.profile, P.nama, P.alamat, P.no 
from perusahaan P 
inner join user U on P.user = U.id;");
if (isset($_POST['create'])) {
  create($_POST['user'], $_POST['nama'], $_POST['alamat'], $_POST['no']);
}
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
    <h3><i class="fa-solid fa-building mr-2"></i>DAFTAR PERUSAHAAN</h3>
    <hr>
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">User</th>
          <th scope="col">Nama Perusahaan</th>
          <th scope="col">Alamat</th>
          <th scope="col">No Telp</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <?php $i = 1; ?>
      <?php if ($company == null) { ?>
        <tbody>
          <tr>
            <td colspan="6" style="text-align: center;">Tidak ada data</td>
          </tr>
        </tbody>
      <?php } ?>
      <?php foreach ($company as $value) : ?>
        <tbody>
          <tr>
            <th scope="row"><?= $i ?></th>
            <td><?= $value['email'] ?></td>
            <td><?= $value['nama'] ?></td>
            <td><?= $value['alamat'] ?></td>
            <td><?= $value['no'] ?></td>
            <td>
              <button class="btn btn-secondary" data-toggle="modal" data-target="#detail<?= $value['id'] ?>">Detail</button>
            </td>
          </tr>
        </tbody>
        <div id="detail<?= $value['id'] ?>" class="modal" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Detail Perusahaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="prof">
                  <div class="pictProf">
                    <img <?= $value['profile'] === '' ? print 'src="../client/img/img/default/Avatar.png"' : print 'src="../client/img/img/' . $value['profile'] . '"' ?> alt="">
                  </div>
                  <div class="bio">
                    <div class="data">
                      <p class="head">Nama Perusahaan</p>
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
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="admin.js"></script>
</body>

</html>