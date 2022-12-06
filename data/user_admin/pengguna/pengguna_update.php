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

require "pengguna_functions.php";
$id_pengguna = $_GET["id_pengguna"];
$tb_pengguna_bio = queryTampilPengguna("SELECT * FROM tb_pengguna_bio WHERE id_pengguna = $id_pengguna")[0];

if(isset($_POST["submit"])) {
  if(ubahPengguna($_POST) > 0) {
    echo "<script>alert('Data Pengguna Berhasil Diubah!');document.location.href = 'pengguna_show.php'</script>";
  } else {
    echo "<script>alert('Data Pengguna Gagal Diubah');document.location.href = 'pengguna_show.php';</script>";
    // echo mysqli_error($conn);
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

    <title>Admin - Ubah Data Pengguna</title>

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
        <div class="row mb-3 justify-content-center">
          <div class="col-md-8">
            <div class="card mb-3">
              <div class="card-body">
              <h1 class="text-primary mb-5 text-center fw-bold">Ubah Data Pengguna <br> Website SIM Data <br> Pelatihan Digital Marketing</h1>
                <form method="post">
                  <p class="fw-bold text-center"><?= $tb_pengguna_bio["nama_lengkap"] ?></p>
                  <input type="hidden" value="<?= $tb_pengguna_bio["id_pengguna"]; ?>" name="id">
                  <div class="row justify-content-center">
                    <div class="col-md-4">
                      <div class="mb-3">
                        <label for="kode_pengguna" class="form-label">Kode Pengguna</label>
                        <input type="text" class="form-control" id="kode_pengguna" name="kode_pengguna" required autocomplete="off" autofocus value="<?= $tb_pengguna_bio["kode_pengguna"]; ?>" disabled>
                      </div>
                      <div class="mb-3">
                        <label for="nama_lengkap" class="form-label">Nama Pengguna</label>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required autocomplete="off" autofocus value="<?= $tb_pengguna_bio["nama_lengkap"]; ?>">
                      </div>
                      <div class="mb-3">
                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required autocomplete="off" autofocus value="<?= $tb_pengguna_bio["tempat_lahir"]; ?>">
                      </div>
                      <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required autocomplete="off" autofocus value="<?= $tb_pengguna_bio["tanggal_lahir"]; ?>">
                      </div>
                      <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-select" name="jenis_kelamin" id="jenis_kelamin" required>
                          <option selected><?= $tb_pengguna_bio["jenis_kelamin"]; ?></option>
                          <?php 
                            $sql_jeniskelamin= mysqli_query($conn, "SELECT * FROM tb_jeniskelamin ORDER BY jenis_kelamin ASC") or die (mysqli_error($conn));
                            while($data_jeniskelamin = mysqli_fetch_array($sql_jeniskelamin)) {
                              echo '
                              <option value="'.$data_jeniskelamin['jenis_kelamin'].'">
                                '.$data_jeniskelamin['jenis_kelamin'].'
                              </option>
                              ';
                            }
                          ?>
                        </select>
                      </div>

                    </div>
                    <div class="col-md-4">
                      <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" required autocomplete="off" autofocus value="<?= $tb_pengguna_bio["alamat"]; ?>">
                      </div>
                      <div class="mb-3">
                        <label for="no_telp" class="form-label">No Telepon</label>
                        <input type="number" class="form-control" id="no_telp" name="no_telp" required autocomplete="off" autofocus value="<?= $tb_pengguna_bio["no_telp"]; ?>">
                      </div>
                      <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required autocomplete="off" value="<?= $tb_pengguna_bio["email"]; ?>">
                      </div>
                      <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required autocomplete="off" value="<?= $tb_pengguna_bio["password"]; ?>">
                      </div>
                      <div class="mb-3">
                        <label for="password2" class="form-label">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="password2" name="password2" required autocomplete="off" value="<?= $tb_pengguna_bio["password"]; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row justify-content-center">
                    <div class="col-md-4">
                      <div class="mb-3">
                        <label for="level" class="form-label">Level Pengguna</label>
                        <select class="form-select" name="level" id="level" required>
                          <option selected><?= $tb_pengguna_bio["level"]; ?></option>
                          <?php 
                            $sql_levelpengguna = mysqli_query($conn, "SELECT * FROM tb_level_pengguna WHERE id_level > 1 ORDER BY level ASC") or die (mysqli_error($conn));
                            while($data_levelpengguna = mysqli_fetch_array($sql_levelpengguna)) {
                              echo '
                              <option value="'.$data_levelpengguna['level'].'">
                                '.$data_levelpengguna['level'].'
                              </option>
                              ';
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="row mb-2 mt-5">
                    <div class="col text-center">
                      <button type="submit" class="btn btn-primary" name="submit"><i class="bi bi-check-circle-fill"></i> Ubah Data Pengguna</button>
                      <button type="reset" name="reset" class="btn btn-warning"><i class="bi bi-arrow-clockwise"></i> Kembalikan Data</button>
                    </div>
                  </div>
                  <div class="row mb-2">
                    <div class="col text-center">
                      <a href="pengguna_show.php">
                        <button type="button" class="btn btn-outline-primary"><i class="bi bi-table"></i> Tabel Data Pengguna</button>
                      </a>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- BODY END -->

    <!-- FOOTER -->
    <section class="footer mt-3">
      <hr>
      <div class="container">
        <div class="row mt-3">
          <div class="col-md-2">
            <a href="https://rajawaliciptaharapan.com" target="_blank">
              <img src="../../../src/img/logo-rjch-nocircle.png" alt="PT Rajawali Cipta Harapan" width="100px">
            </a>
          </div>
          <div class="col-md-10 justify-content-center mt-4">
            <p class="text-center text-primary fw-bold">Copyright © 2021 PT Rajawali Cipta Harapan</p>
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