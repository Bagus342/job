<?php
include('read/pelamar.php');
$pelamar = read("SELECT P.*, U.email FROM pelamar P INNER JOIN user U ON P.user = U.id;");
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />
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
    <h3><i class="fa-solid fa-user mr-2"></i>DAFTAR PELAMAR</h3>
    <hr>
    <table border="1" cellspacing="0" class="table table-striped table-bordered">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">User</th>
          <th scope="col">Nama</th>
          <th scope="col">Alamat</th>
          <th scope="col">No Telepon</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <?php $i = 1; ?>
      <?php if ($pelamar == null) { ?>
        <tbody>
          <tr>
            <td colspan="6" style="text-align: center;">Tidak ada data</td>
          </tr>
        </tbody>
      <?php } ?>
      <?php foreach ($pelamar as $value) : ?>
        <tbody>
          <tr>
            <th scope="row"><?= $i ?></th>
            <td><?= $value['email'] ?></td>
            <td><?= $value['nama'] ?></td>
            <td><?= $value['alamat'] ?></td>
            <td><?= $value['no'] ?></td>
            <td><button href="" class="btn btn-secondary" data-toggle="modal" data-target="#detail<?= $value['id'] ?>">Detail</button></td>
          </tr>
        </tbody>
        <div class="modal fade" id="detail<?= $value['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Detail Pelamar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="prof">
                  <div class="pictProf">
                    <img <?= $value['profil'] === '' ? print 'src="../client/img/img/default/profile.png"' : print 'src="../client/img/img/' . $value['profil'] . '"' ?> alt="">
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
                      <p class="value"><?= $value['tgl'] === '0000-00-00' ? '' :  $value['kota'] . ", " .  explode('-', $value['tgl'])[2] . "/" . explode('-', $value['tgl'])[1] . "/" . explode('-', $value['tgl'])[0] ?></p>
                    </div>
                  </div>
                  <div class="bio">
                    <div class="data">
                      <p class="head">Ijazah</p>
                      <a href="img/<?= $value['ijazah'] ?>" class="value"><?= $value['ijazah'] ?></a>
                    </div>
                  </div>
                  <div class="bio">
                    <div class="data">
                      <p class="head">Ktp</p>
                      <a href="img/<?= $value['ktp'] ?>" class="value"><?= $value['ktp'] ?></a>
                    </div>
                  </div>
                  <div class="bio">
                    <div class="data">
                      <p class="head">Cv</p>
                      <a href="img/<?= $value['cv'] ?>" class="value"><?= $value['cv'] ?></a>
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
        <?php $i++; ?>
      <?php endforeach ?>
    </table>
  </div>
  </div>

  <div class="modal fade" id="tambahuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalScrollableTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label for="exampleFormControlFile1">Profile</label>
              <input type="file" name="profile" class="form-control-file" id="exampleFormControlFile1" required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Nama</label>
              <input type="text" class="form-control" id="exampleInputEmail1" name="nama" aria-describedby="emailHelp" placeholder="Enter email" required>
            </div>
            <div class="form-group" hidden>
              <label for="exampleInputEmail1">Nama</label>
              <input type="text" class="form-control" id="exampleInputEmail1" value="11" name="user" aria-describedby="emailHelp" placeholder="Enter email" required>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Alamat</label>
              <input type="text" name="alamat" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">No Telepon</label>
              <input type="text" name="no" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail4">Tempat, Tanggal Lahir</label>
                <input type="text" name="asal" class="form-control" id="inputEmail4" placeholder="tempat" required>
              </div>
              <div class="form-group col-md-6" style="margin-top: .5em;">
                <label for="inputPassword4"></label>
                <input type="text" class="form-control" name="date" placeholder="MM/DD/YYYY" id="date" placeholder="Password" required>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="exampleInputPassword1">Jenjang</label>
                <select class="form-control" name="jenjang" required>
                  <option value="SMA">SMA</option>
                  <option value="SMK">SMK</option>
                  <option value="S1">S1</option>
                  <option value="S2">S2</option>
                  <option value="S3">S3</option>
                </select>
              </div>
              <div class="form-group col-md-6" style="margin-top: .5em;">
                <label for="inputPassword4"></label>
                <input type="text" class="form-control" name="pendidikan" placeholder="Asal Pendidikan" required>
              </div>
            </div>
            <div class="form-group">
            </div>
            <div class="form-group">
              <label for="exampleFormControlFile1">Ktp</label>
              <input type="file" name="ktp" class="form-control-file" id="exampleFormControlFile1" required>
            </div>
            <div class="form-group">
              <label for="exampleFormControlFile1">Ijazah</label>
              <input type="file" name="ijazah" class="form-control-file" id="exampleFormControlFile1" required>
            </div>
            <div class="form-group">
              <label for="exampleFormControlFile1">Cv</label>
              <input type="file" name="cv" class="form-control-file" id="exampleFormControlFile1" required>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
  <script src="admin.js"></script>
  <script>
    $(document).ready(function() {
      var date_input = $('input[name="date"]'); //our date input has the name "date"
      var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
      var options = {
        format: 'dd/mm/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })
  </script>
</body>

</html>