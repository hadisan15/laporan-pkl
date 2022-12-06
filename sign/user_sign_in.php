<?php 

session_start();

require "user_functions.php";

if(isset($_POST["sign_in"])) {
  $email = $_POST["email"];
  $password = $_POST["password"];

  $querySignin = "SELECT * FROM tb_pengguna_bio WHERE email = '$email'";
  $result = mysqli_query($conn, $querySignin);

  //cek email
  if(mysqli_num_rows($result) === 1) {
    // cek password 
    $row = mysqli_fetch_assoc($result);
    if(password_verify($password, $row["password"])) {
      // set session
      $_SESSION["signin"] = true;

      $_SESSION['kode_pengguna'] = $row['kode_pengguna'];
      $_SESSION['nama_lengkap'] = $row['nama_lengkap'];
      $_SESSION['email'] = $row['email'];
      $_SESSION['password'] = $row['password'];
      $_SESSION['tempat_lahir'] = $row['tempat_lahir'];
      $_SESSION['tanggal_lahir'] = $row['tanggal_lahir'];
      $_SESSION['jenis_kelamin'] = $row['jenis_kelamin'];
      $_SESSION['alamat'] = $row['alamat'];
      $_SESSION['no_telp'] = $row['no_telp'];
      $_SESSION['level'] = $row['level'];

      // header("Location: ../index.php");
      if($_SESSION["level"] === "Admin") {
        echo "<script>alert('Sign In Berhasil!');document.location.href = '../index-admin.php';</script>";
        exit;
      }
      if($_SESSION["level"] === "Partisipan") {
        echo "<script>alert('Sign In Berhasil!');document.location.href = '../index-partisipan.php';</script>";
        exit;
      }
      if($_SESSION["level"] === "Pengajar") {
        echo "<script>alert('Sign In Berhasil!');document.location.href = '../index-pengajar.php';</script>";
        exit;
      }
      if($_SESSION["level"] === "Pimpinan") {
        echo "<script>alert('Sign In Berhasil!');document.location.href = '../index-pimpinan.php';</script>";
        exit;
      }
    }
  } else {
    echo "<script>alert('Sign In Gagal!');document.location.href = 'user_sign_in.php';</script>";
  } 
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <style>
      a {
        text-decoration: none;
      }
    </style>

    <link rel="shortcut icon" href="../src/img/logo-rjch-baru.png">

    <title>Sign In</title>

  </head>
  <body>

    <!-- NAVBAR -->
    <section id="navbar">
      <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
          <a href="https://rajawaliciptaharapan.com/" target="_blank">
            <img src="../src/img/logo-rjch-baru.png" width="60px" alt="PT. Rajawali Cipta Harapan" class="mt-3"/>
          </a>
          <ul class="navbar-nav ms-auto mb-2 mt-3 mb-lg-0">
            <li class="nav-item">
              <p class="nav-link fw-bold text-primary me-3 ">Website SIM Data Pelatihan Digital Marketing</p>
            </li>
            <!-- <li class="nav-item">
              <a class="btn-group" href="user_sign_up.php">
                <button type="button" class="btn btn-primary fw-bold">Sign Up &nbsp;<i class="bi bi-box-arrow-in-up"></i></button>
              </a>
            </li> -->
          </ul>
        </div>
      </nav>
      <hr>
    </section>
    <!-- NAVBAR END -->

    <!-- BODY -->
    <section id="body">
      <div class="container">
        <div class="row mb-3 justify-content-center">
          <div class="col-md-6">
            <div class="card mb-3">
              <div class="card-body">
                <h2 class="text-primary fw-bold text-center">Sign In</h2>
                <div class="text-center mb-5">
                  <img src="../src/img/logo-rjch-baru.png" alt="PT. RAJAWALI CIPTA HARAPAN" width="200" class=" mt-5" style="border: none;"/>
                </div>
                <form method="post">
                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required autocomplete="off" autofocus>
                  </div>
                  <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required autocomplete="off">
                  </div>
                  <button type="submit" class="btn btn-primary" name="sign_in">Sign In</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- BODY END -->

    <!-- FOOTER -->
    <section class="footer mt-5 mb-3">
      <hr>
      <div class="container">
        <div class="row mt-3">
          <div class="col-md-2">
            <a href="https://rajawaliciptaharapan.com" target="_blank">
              <img src="../src/img/logo-rjch-baru.png" alt="PT Rajawali Cipta Harapan" width="100px">
            </a>
          </div>
          <div class="col-md-10 justify-content-center mt-4">
            <p class="text-center text-primary fw-bold">Copyright <span class="fw-bolder">&copy;</span> 2021 PT. Rajawali Cipta Harapan</p>
          </div>
        </div>
      </div>
    </section>
    <!-- FOOTER END -->



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>