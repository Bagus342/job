<?php
include('read/pekerjaan.php');
include('create/pekerjaan.php');
include('update/pekerjaan.php');
$pekerjaan = read("SELECT P.id, P.nama, K.nama as kategori, K.id as kId
  from pekerjaan P 
  inner join kategori K on P.kategori = K.id;");
if (isset($_POST['create'])) {
  create($_POST['nama'], $_POST['kategori']);
}
if (isset($_POST['update'])) {
  update($_POST['id'], $_POST['nama'], $_POST['kategori']);
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
  <script src="https://kit.fontawesome.com/180e110f30.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
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
    <h3><i class="fa-solid fa-list mr-2"></i>DAFTAR PEKERJAAN</h3>
    <hr>
    <button class="btn btn-info mb-3" data-toggle="modal" data-target="#tambahkategori"><i class="fa-solid fa-plus mr-3"></i>TAMBAH PEKERJAAN</button>


    <table border="1" cellspacing="0" class="table table-striped table-bordered">
      <thead>
        <tr>
          <th width="60px">No</th>
          <th>Nama Pekerjaan</th>
          <th>Kategori</th>
          <th>Action</th>
        </tr>
      </thead>
      <?php $i = 1; ?>
      <?php if ($pekerjaan == null) { ?>
        <tbody>
          <tr>
            <td colspan="4" style="text-align: center;">Tidak ada data</td>
          </tr>
        </tbody>
      <?php } ?>
      <?php foreach ($pekerjaan as $value) : ?>
        <tbody>
          <tr>
            <td><?= $i ?></td>
            <td><?= $value['nama'] ?></td>
            <td><?= $value['kategori'] ?></td>
            <td>
              <button class="btn btn-warning" data-toggle="modal" data-target="#edit<?= $value['id'] ?>">Update</button>
              <a href="delete/pekerjaan.php?id=<?= $value['id'] ?>" class="btn btn-danger">Hapus</a>
            </td>
          </tr>
        </tbody>
        <div id="edit<?= $value['id'] ?>" class="modal" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Update Pekerjaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="" method="post">
                  <div class="form-group" hidden>
                    <label for="exampleInputText1">id</label>
                    <input type="text" value="<?= $value['id'] ?>" name="id" class="form-control" id="" placeholder="Masukkan Nama Kategori">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputText1">Nama Pekerjaan</label>
                    <input type="text" value="<?= $value['nama'] ?>" name="nama" class="form-control" id="" placeholder="Masukkan Nama Kategori">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputText1">Pilih Kategori</label>
                    <select class="custom-select" name="kategori" required>
                      <?php
                      foreach (getKategori() as $kategori) :
                      ?>
                        <option value="<?= $kategori['id'] ?>" <?php if ($kategori['id'] == $value['kId']) {
                                                                  echo 'selected="selected"';
                                                                } ?>><?= $kategori['nama'] ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                  <button type="submit" name="update" class="btn btn-primary">Submit</button>
                </form>
              </div>
            </div>
          </div>
        </div>

        <?php $i++; ?>
      <?php endforeach ?>
    </table>
  </div>
  </div>

  <div id="tambahkategori" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Kategori</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" method="post">
            <div class="form-group">
              <label for="exampleInputText1">Nama Pekerjaan</label>
              <input type="text" name="nama" class="form-control" id="" placeholder="Masukkan Nama Pekerjaan" required>
            </div>
            <div class="form-group">
              <label for="exampleInputText1">Pilih Kategori</label>
              <select class="custom-select" name="kategori" required>
                <option value="" selected disabled>Pilih Kategori</option>
                <?php
                foreach (getKategori() as $kategori) :
                ?>
                  <option value="<?= $kategori['id'] ?>"><?= $kategori['nama'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <button type="submit" name="create" class="btn btn-primary">Submit</button>
          </form>
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