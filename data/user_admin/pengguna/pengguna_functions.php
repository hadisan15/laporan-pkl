<?php 

$conn = mysqli_connect("localhost", "root", "", "db_pelatihan_digital_marketing");

function queryTampilPengguna($queryTampilPengguna) {
  global $conn; 
  $result = mysqli_query($conn, $queryTampilPengguna);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function tambahPengguna($data) {
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
  $cekkode = mysqli_query($conn, "SELECT kode_pengguna FROM tb_pengguna_bio WHERE kode_pengguna = '$kode_pengguna'");
  if(mysqli_fetch_assoc($cekkode)) {
    echo "<script>alert('Kode Pengguna Sudah Terdaftar');</script>";
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
  $queryTambahPengguna = "INSERT INTO tb_pengguna_bio VALUES ('', '$kode_pengguna', '$nama_lengkap', '$email', '$password', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin', '$alamat', '$no_telp', '$level')";
  mysqli_query($conn, $queryTambahPengguna);
  return mysqli_affected_rows($conn);
}

function hapusPengguna($id_pengguna) {
  global $conn;

  $queryHapusPengguna = "DELETE FROM tb_pengguna_bio WHERE id_pengguna = $id_pengguna";
  mysqli_query($conn, $queryHapusPengguna);
  return mysqli_affected_rows($conn);
}

function ubahPengguna($data) {
  global $conn;

  // $kode_pengguna = htmlspecialchars($data["kode_pengguna"]);
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

  $id_pengguna = ($data["id"]);

  if($password !== $password2) {
    echo "<script>alert('Password Tidak Sesuai');</script>";
    return false;
  }

  $password = password_hash($password, PASSWORD_DEFAULT);

  $queryUbahPengguna = "UPDATE tb_pengguna_bio SET 
                                  nama_lengkap='$nama_lengkap',
                                  email='$email',
                                  password='$password',
                                  password='$password2',
                                  tempat_lahir='$tempat_lahir',
                                  tanggal_lahir='$tanggal_lahir',
                                  jenis_kelamin='$jenis_kelamin',
                                  alamat='$alamat',
                                  no_telp='$no_telp',
                                  level='$level'
                                  WHERE id_pengguna='$id_pengguna'";
              
  mysqli_query($conn, $queryUbahPengguna);

  return mysqli_affected_rows($conn);
}

function cariPengguna($keyword) {

  $queryCariPengguna = "SELECT * FROM tb_pengguna_bio WHERE nama_lengkap LIKE '%$keyword%'";
  return queryTampilPengguna($queryCariPengguna);
}

?>