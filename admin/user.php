<?php
require('read/user.php');
require('create/user.php');
require('update/user.php');
$user = read("SELECT * FROM user");
if (isset($_POST["create"])) {
  create($_POST['email'], $_POST['password'], $_POST['role']);
}
if (isset($_POST["update"])) {
  update($_POST['email'], $_POST['password'], $_POST['role'], $_POST['id']);
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
    <h3><i class="fa-solid fa-users mr-2"></i>DAFTAR USER</h3>
    <hr>

    <button class="btn btn-info mb-3" data-toggle="modal" data-target="#tambahuser"><i class="fa-solid fa-plus mr-3"></i>TAMBAH USER</button>
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Email</th>
          <th scope="col">Role</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <?php $i = 1; ?>
      <?php if ($user == null) { ?>
        <tbody>
          <tr>
            <td colspan="4" style="text-align: center;">Tidak ada data</td>
        </tbody>
      <?php } else { ?>
        <?php foreach ($user as $value) : ?>
          <tbody>
            <tr>
              <th scope="row"><?= $i ?></th>
              <td><?= $value["email"] ?></td>
              <td><?= $value["role"] ?></td>
              <td style="text-align: center;">
                <button data-toggle="modal" data-target="#updateuser<?= $value['id'] ?>" class="btn btn-warning">Update</button>
                <a href="delete/user.php?id=<?= $value["id"] ?>" class="btn btn-danger">Hapus</a>
              </td>
            </tr>
          </tbody>
          <?php $i++ ?>
          <div id="updateuser<?= $value['id'] ?>" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Update User</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="" method="POST">
                    <div class="form-group" hidden>
                      <label for="exampleInputEmail1">id</label>
                      <input type="text" value="<?= $value['id'] ?>" class="form-control" id="exampleInputEmail1" name="id" aria-describedby="emailHelp" placeholder="Enter email" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="text" value="<?= $value['email'] ?>" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" value="<?= $value['password'] ?>" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                    </div>
                    <div class="form-group" hidden>
                      <label for="exampleInputPassword1">role</label>
                      <input type="text" value="<?= $value['role'] ?>" name="role" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                    </div>
                    <button class="btn btn-primary" name="update" type="submit">Submit</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach ?>
      <?php } ?>
    </table>
  </div>
  </div>

  <div id="tambahuser" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" method="POST">
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="text" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
            </div>
            <div class="form-group" hidden>
              <label for="exampleInputPassword1">Role</label>
              <select class="form-control" name="role">
                <option value="admin">Admin</option>
              </select>
            </div>
            <button class="btn btn-primary" name="create" type="submit">Submit</button>
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