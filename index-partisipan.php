<?php 

session_start();

if(!isset($_SESSION["signin"])) {
  header("Location: sign/user_sign_in.php");
  exit;
}

if($_SESSION["level"] === "Admin") {
  echo "<script>alert('Anda Tidak Dapat Mengakses Halaman Ini');document.location.href = 'index-admin.php';</script>";
}
if($_SESSION["level"] === "Pengajar") {
  echo "<script>alert('Anda Tidak Dapat Mengakses Halaman Ini');document.location.href = 'index-pengajar.php';</script>";
}
if($_SESSION["level"] === "Pimpinan") {
  echo "<script>alert('Anda Tidak Dapat Mengakses Halaman Ini');document.location.href = 'index-pimpinan.php';</script>";
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

    <link rel="shortcut icon" href="src/img/logo-rjch-baru.png">

    <style>
      a {
        text-decoration: none;
      }
    </style>

    <title>Partisipan - Beranda</title>

  </head>
  <body>
    <!-- NAVBAR -->
    <section id="navbar">
      <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
          <a href="https://rajawaliciptaharapan.com/" target="_blank">
            <img src="src/img/logo-rjch-baru.png" width="60px" alt="PT. Rajawali Cipta Harapan" class="mt-3"/>
          </a>
          <div class="btn-group ms-5 mt-2" role="group" aria-label="Button group with nested dropdown">
            <a class="btn-group" href="#">
              <button type="button" class="btn btn-primary"><i class="bi bi-house-door-fill"></i> Beranda</button>
            </a>
            <div class="btn-group" role="group">
              <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-file-earmark-post-fill"></i> Data
              </button>
              <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                <li>
                  <a class="dropdown-item text-primary" href="data/user_partisipan/pendaftar_show.php"><i class="bi bi-person-fill"></i> Data Pendaftar</a>
                </li>
                <li>
                  <a class="dropdown-item text-primary" href="data/user_partisipan/peserta_show.php"><i class="bi bi-person-circle"></i> Data Peserta</a>
                </li>
                <!-- <li>
                  <a class="dropdown-item text-primary" href="data/user_partisipan/alumni_show.php"><i class="bi bi-person-check-fill"></i> Data Alumni</a>
                </li>
                <li>
                  <a class="dropdown-item text-primary" href="data/user_partisipan/pengajar_show.php"><i class="bi bi-mortarboard-fill"></i> Data Pengajar</a>
                </li>
                <li>
                  <a class="dropdown-item text-primary" href="data/user_partisipan/kelas_show.php"><i class="bi bi-folder-fill"></i> Data Kelas</a>
                </li> -->
              </ul>
            </div>
            <a class="btn-group" href="data/user_partisipan/profile_partisipan.php">
              <button type="button" class="btn btn-primary"><i class="bi bi-person-lines-fill"></i> Profil Saya</button>
            </a>
          </div>
          <ul class="navbar-nav ms-auto mb-2 mt-3 mb-lg-0">
            <li class="nav-item">
              <p class="nav-link fw-bold text-primary me-3 ">Website SIM Data Pelatihan Digital Marketing</p>
            </li>
            <li class="nav-item">
              <a class="btn-group" href="sign/user_sign_out.php">
                <button type="button" class="btn btn-danger fw-bold">Sign Out &nbsp;<i class="bi bi-box-arrow-right"></i></button>
              </a>
            </li>
          </ul>
        </div>
      </nav>
      <hr>
    </section>
    <!-- NAVBAR END -->

    <!-- BODY -->
    <section id="body">
      <div class="container text-primary">
        <div class="row">
          <div class="col-11">
            <h3>Hi, <?= $_SESSION["nama_lengkap"]; ?></h3>
          </div>
          <div class="col">
            <p class="fw-bold"><?= $_SESSION["level"]; ?></p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col">
            <h2 class="fw-bold mt-3">Selamat Datang di</h2>
          </div>
        </div>
        <div class="row">
          <!-- HOME KIRI -->
          <div class="col-md-8">
            <div class="row mt-2">
              <div class="col">
                <h1 style="font-family: 'Roboto', sans-serif; font-size: 35px;" class="fw-bold">
                  SISTEM INFORMASI MANAJEMEN DATA <br> PELATIHAN DIGITAL MARKETING DI
                </h1>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col">
                <img src="src/img/logo-rjch-baru.png" width="600px" alt="PT. RAJAWALI CIPTA HARAPAN">
              </div>
            </div>
          </div>
          <!-- HOME KANAN -->
          <div class="col-md-3 mt-3">
            <img src="src/img/home-rjch.png" alt="">
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
              <img src="src/img/logo-rjch-baru.png" alt="PT Rajawali Cipta Harapan" width="100px">
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

