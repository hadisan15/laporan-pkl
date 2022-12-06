<?php 

require "user_functions.php";

if(isset($_POST["sign_up"])) {
  if(signup($_POST) > 0) {
    echo "<script>alert('Sign Up Berhasil!');document.location.href = 'user_sign_in.php'</script>";
  } else {
    echo mysqli_error($conn);
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

    <title>Sign Up</title>

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
            <li class="nav-item">
              <a class="btn-group" href="user_sign_in.php">
                <button type="button" class="btn btn-primary fw-bold">Sign In &nbsp;<i class="bi bi-box-arrow-in-right"></i></button>
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
      <div class="container">
        <div class="row mb-3 justify-content-center">
          <div class="col-md-6">
            <div class="card mb-3">
              <div class="card-body">
                <h2 class="text-primary fw-bold text-center">Sign Up</h2>
                <div class="text-center mb-5">
                  <img src="../src/img/logo-rjch-baru.png" alt="PT. RAJAWALI CIPTA HARAPAN" width="200" class="text-centerimg-thumbnail mt-5" style="border: none;"/>
                </div>
                <form method="post">
                  <div class="mb-3">
                    <label for="kode_pengguna" class="form-label">Kode Pengguna</label>
                    <input type="text" class="form-control" id="kode_pengguna" name="kode_pengguna" required autocomplete="off" autofocus>
                  </div>
                  <div class="mb-3">
                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required autocomplete="off" autofocus>
                  </div>
                  <div class="mb-3">
                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required autocomplete="off" autofocus>
                  </div>
                  <div class="mb-3">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required autocomplete="off" autofocus>
                  </div>
                  <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <select class="form-select" name="jenis_kelamin" id="jenis_kelamin" required>
                      <option selected></option>
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
                  <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" required autocomplete="off" autofocus>
                  </div>
                  <div class="mb-3">
                    <label for="no_telp" class="form-label">No Telepon</label>
                    <input type="number" class="form-control" id="no_telp" name="no_telp" required autocomplete="off" autofocus>
                  </div>
                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required autocomplete="off">
                  </div>
                  <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required autocomplete="off">
                  </div>
                  <div class="mb-3">
                    <label for="password2" class="form-label">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="password2" name="password2" required autocomplete="off">
                  </div>
                  <div class="mb-3">
                    <label for="level" class="form-label">Level Pengguna</label>
                    <select class="form-select" name="level" id="level" required>
                      <option selected></option>
                      <?php 
                        $sql_levelpengguna = mysqli_query($conn, "SELECT * FROM tb_level_pengguna ORDER BY level ASC") or die (mysqli_error($conn));
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
                  <button type="submit" class="btn btn-primary" name="sign_up">Sign Up</button>
                </form>
              </div>
            </div>
            <!-- <a href="../index.php">
              <button type="button" class="btn btn-outline-primary"><i class="bi bi-house-door-fill"></i> Kembali ke Beranda</button>
            </a> -->
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
              <img src="../src/img/logo-rjch-nocircle.png" alt="PT Rajawali Cipta Harapan" width="100px">
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