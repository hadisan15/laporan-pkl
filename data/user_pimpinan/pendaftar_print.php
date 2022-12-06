<?php 

session_start();

if(!isset($_SESSION["signin"])) {
  header("Location: ../../sign/user_sign_in.php");
  exit;
}

if($_SESSION["level"] === "Admin") {
  echo "<script>alert('Anda Tidak Dapat Mengakses Halaman Ini');document.location.href = '../../index-admin.php';</script>";
}
if($_SESSION["level"] === "Partisipan") {
  echo "<script>alert('Anda Tidak Dapat Mengakses Halaman Ini');document.location.href = '../../index-partisipan.php';</script>";
}
if($_SESSION["level"] === "Pengajar") {
  echo "<script>alert('Anda Tidak Dapat Mengakses Halaman Ini');document.location.href = '../../index-pengajar.php';</script>";
}

require_once __DIR__ . '/../../vendor/autoload.php';
require "../user_admin/pendaftar/pendaftar_functions.php";

$pendaftar = queryTampilPendaftar("SELECT * FROM tb_pendaftar");

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
      .head-print {
        margin-left: -120px;
      }
    </style>

    <link rel="shortcut icon" href="../../src/img/logo-rjch-baru.png">

    <title>Pimpinan - Cetak Data Pendaftar</title>

  </head>
  <body>

    <!-- NAVBAR -->
    <section id="navbar">
      <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
          <a href="https://rajawaliciptaharapan.com/" target="_blank">
            <img src="../../src/img/logo-rjch-baru.png" width="60px" alt="PT. Rajawali Cipta Harapan" class="mt-3"/>
          </a>
          <div class="btn-group ms-5 mt-2" role="group" aria-label="Button group with nested dropdown">
            <a class="btn-group" href="../../index-pimpinan.php">
              <button type="button" class="btn btn-primary"><i class="bi bi-house-door-fill"></i> Beranda</button>
            </a>
            <div class="btn-group" role="group">
              <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-file-earmark-spreadsheet-fill"></i> Laporan
              </button>
              <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                <li>
                  <a class="dropdown-item text-primary" href="pendaftar_print.php"><i class="bi bi-person-fill"></i> Laporan Data Pendaftar</a>
                </li>
                <li>
                  <a class="dropdown-item text-primary" href="peserta_print.php"><i class="bi bi-person-circle"></i> Laporan Data Peserta</a>
                </li>
                <li>
                  <a class="dropdown-item text-primary" href="alumni_print.php"><i class="bi bi-person-check-fill"></i> Laporan Data Alumni</a>
                </li>
                <li>
                  <a class="dropdown-item text-primary" href="pengajar_print.php"><i class="bi bi-mortarboard-fill"></i> Laporan Data Pengajar</a>
                </li>
                <li>
                  <a class="dropdown-item text-primary" href="kelas_print.php"><i class="bi bi-folder-fill"></i> Laporan Data Kelas</a>
                </li>
                <li>
                  <a class="dropdown-item text-primary" href="pengguna_print.php"><i class="bi bi-people-fill"></i> Laporan Data Pengguna</a>
                </li>
              </ul>
            </div>
            <a class="btn-group" href="profile_pimpinan.php">
              <button type="button" class="btn btn-primary"><i class="bi bi-person-lines-fill"></i> Profil Saya</button>
            </a>
          </div>
          <ul class="navbar-nav ms-auto mb-2 mt-3 mb-lg-0">
            <li class="nav-item">
              <p class="nav-link fw-bold text-primary me-3 ">Website SIM Data Pelatihan Digital Marketing</p>
            </li>
          </ul>
        </div>
      </nav>
      <hr>
    </section>
    <!-- NAVBAR END -->

    <!-- BODY -->
    <section id="body">
      <div class="container">
        <h1 class="text-primary mb-5 text-center fw-bold">Cetak Data Pendaftar <br> Pelatihan Digital Marketing</h1>
        <div class="row">
          <div class="col">
            <a href="pendaftar_savepdf.php" target="_blank">
              <button type="button" class="btn btn-outline-primary"><i class="bi bi-save-fill"></i> Unduh Data Pendaftar</button>
            </a>
          </div>
        </div>
      </div>
      <hr>
      <div class="container">
        <div class="row mb-3">
          <div class="col-md-3 mt-3">
            <img src="../../src/img/logo-rjch-circle.png" width="100px">
          </div>
          <div class="col-md-9 justify-content-center text-center head-print">
            <h2 style="font-family: 'Times New Roman'; font-weight: bold; color: rgb(12, 54, 117);">LAPORAN DATA PENDAFTAR <br> PELATIHAN DIGITAL MARKETING <br> PT. RAJAWALI CIPTA HARAPAN</h2>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <table class="table table-bordered border-dark" style="font-family: 'Times New Roman';">
              <tr>
                <th>#</th>
                <th>Kode Partisipan</th>
                <th>Nama Pendaftar</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Alamat Lengkap</th>
                <th>Bidang Usaha</th>
                <th>Email</th>
                <th>No Telepon</th>
              </tr>
              <?php $i = 1; ?>
              <?php foreach($pendaftar as $row) : ?>    
              <tr>
                <td><?= $i ?></td>
                <td><?= $row["kode_partisipan"]; ?></td>
                <td><?= $row["nama_pendaftar"]; ?></td>
                <td><?= $row["tempat_lahir"]; ?></td>
                <td><?= $row["tanggal_lahir"]; ?></td>
                <td><?= $row["jenis_kelamin"]; ?></td>
                <td><?= $row["alamat_lengkap"]; ?></td>
                <td><?= $row["bidang_usaha"]; ?></td>
                <td><?= $row["email"]; ?></td>
                <td><?= $row["no_telp"]; ?></td>
              </tr>
              <?php $i++ ?>
              <?php endforeach; ?>
            </table>
          </div>
        </div>
        <div class="row text-center" style="font-family: 'Times New Roman';">
          <div class="col-md-9"></div>
          <div class="col-md-3">
            <p style="margin-bottom: 75px;">Mengetahui,</p>
            <p class="fw-bold"><u>ZUL FAHMI</u></p>
            <p class="fw-bold" style="margin-top: -15px;">Direktur Utama</p>
          </div>
        </div>
      </div>
      <hr>
    </section>
    <!-- BODY END -->

    <!-- FOOTER -->
    <section class="footer mt-5 mb-3">
      <hr>
      <div class="container">
        <div class="row mt-3">
          <div class="col-md-2">
            <a href="https://rajawaliciptaharapan.com" target="_blank">
              <img src="../../src/img/logo-rjch-baru.png" alt="PT Rajawali Cipta Harapan" width="100px">
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

