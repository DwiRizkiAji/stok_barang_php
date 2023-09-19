<?php
session_start();

if (isset($_SESSION["login"])) {
  header('location: index.php');
  exit;
}

require 'functions.php';

if (isset($_POST["login"])) {

  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

  //cek username
  if (mysqli_num_rows($result) === 1) {

    //cek password
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row['password'])) {
      //set session
      $_SESSION["login"] = true;

      header('location: index.php');
      return false;
    }
  }

  $eror = true;
}


?>

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>Halaman Login</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>

<body class="h-100 bg-info d-flex align-items-center">
  <div class="container">
    <div class="row rounded">
      <div class="col-sm-6 col-md-4 mx-auto bg-light p-4">
        <h3 class="text-center text-info pb-3 mb-3 border-bottom">Login</h3>
        <?php if (isset($eror)) : ?>
          echo "<script>
            alert('username/ password salah');
            document.location.href = "login.php";
          </script>";
          <!-- <p style="color: red; font-style:italic;">username/ password salah</p> -->
        <?php endif; ?>

        <form class="d-grid gap-3" action="" method="post">
          <form>
            <div class="mb-3">
              <label for="username" class="form-label">Username :</label>
              <input type="text" class="form-control" name="username" id="username">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" name="password" id="password">
            </div>
            <button type="submit" name="login" class="btn btn-primary">Login</button>
            <div class="btn">
              <p>Belum punya akun ? <a class="text-decoration-none" href="register.php">Daftar Akun</a></p>
            </div>
          </form>
        </form>
      </div>
    </div>
  </div>

</body>

</html>




<!-- <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Login</title>
</head>

<body>

  <h1>Halaman Login</h1>

  

  <form action="" method="post">
    <ul>
      <li>
        <label for="username">Username :</label>
        <input type="text" name="username" id="username">
      </li>
      <br>
      <li>
        <label for="password">Password :</label>
        <input type="password" name="password" id="password">
      </li>
      <li>
        <button type="submit" name="login">Login</button>
      </li>
    </ul>
  </form>

</body>

</html> -->