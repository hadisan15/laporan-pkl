<?php 

session_start();

if(!isset($_SESSION["signin"])) {
  header("Location: ../../../sign/user_sign_in.php");
  exit;
}

if($_SESSION["level"] === "Partisipan") {
  echo "<script>alert('Anda Tidak Dapat Mengakses Halaman Ini');document.location.href = '../../../index-partisipan.php';</script>";
}
if($_SESSION["level"] === "Pengajar") {
  echo "<script>alert('Anda Tidak Dapat Mengakses Halaman Ini');document.location.href = '../../../index-pengajar.php';</script>";
}
if($_SESSION["level"] === "Pimpinan") {
  echo "<script>alert('Anda Tidak Dapat Mengakses Halaman Ini');document.location.href = '../../../index-pimpinan.php';</script>";
}

require "pengajar_functions.php";
$id_pengajar = $_GET["id_pengajar"];
$tb_pengajar = queryTampilPengajar("SELECT * FROM tb_pengajar WHERE id_pengajar = $id_pengajar")[0];

if(isset($_POST["submit"])) {
  if(hapusPengajar($id_pengajar)>0) {
    echo "<script>alert('Data Pengajar Berhasil Dihapus');document.location.href = 'pengajar_show.php';</script>";
  } else {
    echo "<script>alert('Data Pengajar Gagal Dihapus');document.location.href = 'pengajar_show.php';</script>";
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

    <link rel="shortcut icon" href="../../../src/img/logo-rjch-baru.png">   

    <title>Admin - Hapus Data Pengajar</title>

  </head>
  <body>

    <!-- NAVBAR -->
    <section id="navbar">
      <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
          <a href="https://rajawaliciptaharapan.com/" target="_blank">
            <img src="../../../src/img/logo-rjch-baru.png" width="60px" alt="PT. Rajawali Cipta Harapan" class="mt-3"/>
          </a>
          <div class="btn-group ms-5 mt-2" role="group" aria-label="Button group with nested dropdown">
            <a class="btn-group" href="../../../index-admin.php">
              <button type="button" class="btn btn-primary"><i class="bi bi-house-door-fill"></i> Beranda</button>
            </a>
            <div class="btn-group" role="group">
              <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-file-earmark-post-fill"></i> Data
              </button>
              <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                <li>
                  <a class="dropdown-item text-primary" href="../pendaftar/pendaftar_show.php"><i class="bi bi-person-fill"></i> Data Pendaftar</a>
                </li>
                <li>
                  <a class="dropdown-item text-primary" href="../peserta/peserta_show.php"><i class="bi bi-person-circle"></i> Data Peserta</a>
                </li>
                <li>
                  <a class="dropdown-item text-primary" href="../alumni/alumni_show.php"><i class="bi bi-person-check-fill"></i> Data Alumni</a>
                </li>
                <li>
                  <a class="dropdown-item text-primary" href="../pengajar/pengajar_show.php"><i class="bi bi-mortarboard-fill"></i> Data Pengajar</a>
                </li>
                <li>
                  <a class="dropdown-item text-primary" href="../kelas/kelas_show.php"><i class="bi bi-folder-fill"></i> Data Kelas</a>
                </li>
                <li>
                  <a class="dropdown-item text-primary" href="../pengguna/pengguna_show.php"><i class="bi bi-people-fill"></i> Data Pengguna</a>
                </li>
              </ul>
            </div>
            <div class="btn-group" role="group">
              <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-file-earmark-spreadsheet-fill"></i> Laporan
              </button>
              <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                <li>
                  <a class="dropdown-item text-primary" href="../pendaftar/pendaftar_print.php"><i class="bi bi-person-fill"></i> Laporan Data Pendaftar</a>
                </li>
                <li>
                  <a class="dropdown-item text-primary" href="../peserta/peserta_print.php"><i class="bi bi-person-circle"></i> Laporan Data Peserta</a>
                </li>
                <li>
                  <a class="dropdown-item text-primary" href="../alumni/alumni_print.php"><i class="bi bi-person-check-fill"></i> Laporan Data Alumni</a>
                </li>
                <li>
                  <a class="dropdown-item text-primary" href="../pengajar/pengajar_print.php"><i class="bi bi-mortarboard-fill"></i> Laporan Data Pengajar</a>
                </li>
                <li>
                  <a class="dropdown-item text-primary" href="../kelas/kelas_print.php"><i class="bi bi-folder-fill"></i> Laporan Data Kelas</a>
                </li>
                <li>
                  <a class="dropdown-item text-primary" href="../pengguna/pengguna_print.php"><i class="bi bi-people-fill"></i> Laporan Data Pengguna</a>
                </li>
              </ul>
            </div>
            <a class="btn-group" href="../profile_admin.php">
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
        <h1 class="text-primary mb-5 text-center fw-bold">Hapus Data Pengajar <br> Pelatihan Digital Marketing</h1>
        <div class="row mb-3">
          <div class="col-md-9">
            <a href="pengajar_show.php">
              <button type="button" class="btn btn-outline-primary"><i class="bi bi-table"></i> Tabel Data Pengajar</button>
            </a>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col">
            <div class="card">
              <div class="card-header fw-bolder">
                <h5 class="card-title">Konfirmasi Penghapusan Data Pengajar</h5>
              </div>
              <div class="card-body">
                <ol class="list-group mb-3">
                  <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                      Kode Pengajar
                      <div class="fw-bold"><?= $tb_pengajar["kode_pengajar"] ?></div>
                    </div>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                      Nama Pengajar
                      <div class="fw-bold"><?= $tb_pengajar["nama_pengajar"] ?></div>
                    </div>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                      Tempat Lahir
                      <div class="fw-bold"><?= $tb_pengajar["tempat_lahir"] ?></div>
                    </div>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                      Tanggal Lahir
                      <div class="fw-bold"><?= $tb_pengajar["tanggal_lahir"] ?></div>
                    </div>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                      Jenis Kelamin
                      <div class="fw-bold"><?= $tb_pengajar["jenis_kelamin"] ?></div>
                    </div>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                      Email
                      <div class="fw-bold"><?= $tb_pengajar["email"] ?></div>
                    </div>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                      No Telepon
                      <div class="fw-bold"><?= $tb_pengajar["no_telp"] ?></div>
                    </div>
                  </li>
                </ol>
                <p class="text-danger">
                  <i class="bi bi-exclamation-circle-fill"></i> PERHATIAN: Data yang Telah Dihapus Tidak Dapat Dikembalikan!
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <form action="" method="post">
              <button type="submit" name="submit" class="btn btn-danger"><i class="bi bi-x-circle-fill"></i> Hapus Data Pengajar</button>
            </form>
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
              <img src="../../../src/img/logo-rjch-baru.png" alt="PT Rajawali Cipta Harapan" width="100px">
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