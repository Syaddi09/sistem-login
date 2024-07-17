<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Pesbuk</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body class="bg-light">




<?php

include 'config.php';
  
  error_reporting(0);
   
  session_start();
   
  if (isset($_SESSION['username'])) {
      header("Location: index.php");
  }
   
  if (isset($_POST['daftar'])) {
      $name = $_POST['username'];
      $username = $_POST['username'];
      $email = md5($_POST['email']);
      $password = md5($_POST['password']);
   
      if ($password == $cpassword) {
          $sql = "SELECT * FROM users WHERE email='$email'";
          $result = mysqli_query($conn, $sql);
          if (!$result->num_rows > 0) {
              $sql = "INSERT INTO users (name, username, email, password)
                      VALUES ('$name', '$username', '$email','$password')";
              $result = mysqli_query($conn, $sql);
 
              if ($result) {
                  echo "<script>alert('Selamat, registrasi berhasil!')</script>";
                  $username = "";
                  $email = "";
                  $_POST['password'] = "";
                  $_POST['cpassword'] = "";
              } else {
                  echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
              }
          } else {
              echo "<script>alert('Woops! Email Sudah Terdaftar.')</script>";
          }
           
      } else {
          echo "<script>alert('Password Tidak Sesuai')</script>";
      }
  }
   
  ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">

        <p>&larr; <a href="index.php">Home</a>

        <h4>Bergabunglah bersama ribuan orang lainnya...</h4>
        <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>

        <form action="" method="POST">

            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input class="form-control" type="text" name="name" placeholder="Nama kamu" />
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input class="form-control" type="text" name="username" placeholder="Username" />
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="email" name="email" placeholder="Alamat Email" />
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" name="password" placeholder="Password" />
            </div>
            <div class="input-group">
                <input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
            </div>

            <input type="submit" class="btn btn-success btn-block" name="register" value="Daftar" />

        </form>
            
        </div>

        <div class="col-md-6">
            <img class="img img-responsive" src="img/connect.png" />
        </div>

    </div>
</div>

</body>
</html>