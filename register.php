<?php
require 'functions.php';

if (isset($_POST["register"])) {

  if (registrasi($_POST) > 0) {
    echo "<script>
          alert('user baru berhasil ditambahkan');
          document.location.href = 'login.php';
        </script>";
  } else {
    "<script>
    alert('user baru gagal ditambahkan');
    </script>";

    echo mysqli_error($conn);
  }
}

?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>Halaman Register</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>

<body class="h-100 bg-info d-flex align-items-center">
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-md-4 mx-auto bg-light p-4">
        <h3 class="text-center text-info pb-3 mb-3 border-bottom">Register</h3>
        <?php if (isset($eror)) : ?>
          <p style="color: red; font-style:italic;">username/ password salah</p>
        <?php endif; ?>

        <form class="d-grid gap-3" action="" method="post">
          <div class="mb-3">
            <label for="username" class="form-label">Username :</label>
            <input type="text" class="form-control" name="username" id="username">
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password :</label>
            <input type="password" class="form-control" name="password" id="password">
          </div>
          <div class="mb-3">
            <label for="password2" class="form-label">Konfirmasi Password :</label>
            <input type="password" class="form-control" name="password2" id="password2">
          </div>
          <button type="submit" name="register" class="btn btn-primary">Register</button>
        </form>
      </div>
    </div>
  </div>

  <script src="bootstrap/js/"></script>

</body>

</html>


<!-- <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Registrasi</title>
  <style>
    label {
      display: block;
    }
  </style>
</head>

<body>

  <h1>Halaman Registrasi</h1>

  <form action="" method="post">
    <ul>
      <li>
        <label for="username">Username :</label>
        <input type="text" name="username" id="username">
      </li>

      <li>
        <label for="password">Password :</label>
        <input type="password" name="password" id="password">
      </li>

      <li>
        <label for="password2">Konfirmasi Password:</label>
        <input type="password" name="password2" id="password2">
      </li>
    </ul>

    <li>
      <button type="submit" name="register">Register</button>
    </li>
  </form>
</body>

</html> -->