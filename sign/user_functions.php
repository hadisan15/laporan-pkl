<?php 

$conn = mysqli_connect("localhost", "root", "", "db_pelatihan_digital_marketing");

function signup($data) {
  global $conn;

  $kode_pengguna = htmlspecialchars($data["kode_pengguna"]);
  $nama_lengkap = htmlspecialchars($data["nama_lengkap"]);
  $email = htmlspecialchars($data["email"]);
  $password = mysqli_real_escape_string($conn, $data["password"]);
  $password2 = mysqli_real_escape_string($conn, $data["password2"]);
  $tempat_lahir = htmlspecialchars($data["tempat_lahir"]);
  $tanggal_lahir = $data["tanggal_lahir"];
  $jenis_kelamin = $data["jenis_kelamin"];
  $alamat = htmlspecialchars($data["alamat"]);
  $no_telp = htmlspecialchars($data["no_telp"]);
  $level = $data["level"];

  //cek username apakah sudah ada atau belum
  $cekemail = mysqli_query($conn, "SELECT email FROM tb_pengguna_bio WHERE email = '$email'");
  if(mysqli_fetch_assoc($cekemail)) {
    echo "<script>alert('Email Sudah Terdaftar');</script>";
    return false;
  }

  //konfirmasi password
  if($password !== $password2) {
    echo "<script>alert('Password Tidak Sesuai');</script>";
    return false;
  }

  //enkripsi / mengamankan password
  $password = password_hash($password, PASSWORD_DEFAULT);
  // $password = md5($password);


  //tambahkan user baru ke database
  $querySignup = "INSERT INTO tb_pengguna_bio VALUES ('', '$kode_pengguna', '$nama_lengkap', '$email', '$password', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin', '$alamat', '$no_telp', '$level')";
  mysqli_query($conn, $querySignup);
  return mysqli_affected_rows($conn);
}

// function signin() {
//   global $conn;

//   $email = $_POST["email"];
//   $password = $_POST["password"];

//   $querySignin = "SELECT * FROM tb_pengguna WHERE email = '$email'";
//   $result = mysqli_query($conn, $querySignin);

//   //cek email
//   if(mysqli_num_rows($result) === 1) {
//     // cek password 
//     $row = mysqli_fetch_assoc($result);
//     if(password_verify($password, $row["password"])) {
//       header("Location: '../index.php'");
//       exit;
//     }
//   }
//   $error = true;
// }


?>