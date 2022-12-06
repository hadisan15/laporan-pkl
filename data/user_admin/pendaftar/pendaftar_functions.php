<?php 

$conn = mysqli_connect("localhost", "root", "", "db_pelatihan_digital_marketing");

function queryTampilPendaftar($queryTampilPendaftar) {
  global $conn; 
  $result = mysqli_query($conn, $queryTampilPendaftar);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function tambahPendaftar($data) {
  global $conn;

  $kode_partisipan = htmlspecialchars($data["kode_partisipan"]);
  $nama_pendaftar = htmlspecialchars($data["nama_pendaftar"]);
  $tempat_lahir = htmlspecialchars($data["tempat_lahir"]);
  $tanggal_lahir = $data["tanggal_lahir"];
  $jenis_kelamin = $data["jenis_kelamin"];
  $alamat_lengkap = htmlspecialchars($data["alamat_lengkap"]);
  $bidang_usaha = htmlspecialchars($data["bidang_usaha"]);
  $email = htmlspecialchars($data["email"]);
  $no_telp = htmlspecialchars($data["no_telp"]);

  $cekkodepartisipan = mysqli_query($conn, "SELECT kode_partisipan FROM tb_pendaftar WHERE kode_partisipan = '$kode_partisipan'");
  if(mysqli_fetch_assoc($cekkodepartisipan)) {
    echo "<script>alert('Kode Partisipan Tidak Boleh Sama');</script>";
    return false;
  }

  $queryTambahPendaftar = "INSERT INTO tb_pendaftar (id_pendaftar, kode_partisipan, nama_pendaftar, tempat_lahir, tanggal_lahir, jenis_kelamin, alamat_lengkap,  bidang_usaha, email, no_telp)".
  "VALUES ('', '$kode_partisipan', '$nama_pendaftar', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin', '$alamat_lengkap', '$bidang_usaha', '$email', '$no_telp')";

  mysqli_query($conn, $queryTambahPendaftar);
  return mysqli_affected_rows($conn);
}

function hapusPendaftar($id_pendaftar) {
  global $conn;

  $queryHapusPendaftar = "DELETE FROM tb_pendaftar WHERE id_pendaftar = $id_pendaftar";
  mysqli_query($conn, $queryHapusPendaftar);
  return mysqli_affected_rows($conn);
}

function ubahPendaftar($data) {
  global $conn;

  $nama_pendaftar = htmlspecialchars($data["nama_pendaftar"]);
  $tempat_lahir = htmlspecialchars($data["tempat_lahir"]);
  $tanggal_lahir = $data["tanggal_lahir"];
  $jenis_kelamin = $data["jenis_kelamin"];
  $alamat_lengkap = htmlspecialchars($data["alamat_lengkap"]);
  $bidang_usaha = htmlspecialchars($data["bidang_usaha"]);
  $email = htmlspecialchars($data["email"]);
  $no_telp = htmlspecialchars($data["no_telp"]);

  $id_pendaftar = ($data["id"]);

  $queryUbahPendaftar = "UPDATE tb_pendaftar SET 
                                  nama_pendaftar='$nama_pendaftar',
                                  tempat_lahir='$tempat_lahir',
                                  tanggal_lahir='$tanggal_lahir',
                                  jenis_kelamin='$jenis_kelamin',
                                  alamat_lengkap='$alamat_lengkap',
                                  bidang_usaha='$bidang_usaha',
                                  email='$email',
                                  no_telp='$no_telp'
                                  WHERE id_pendaftar='$id_pendaftar'";
              
  mysqli_query($conn, $queryUbahPendaftar);

  return mysqli_affected_rows($conn);
}

function cariPendaftar($keyword) {

  $queryCariPendaftar = "SELECT * FROM tb_pendaftar WHERE nama_pendaftar LIKE '%$keyword%'";
  return queryTampilPendaftar($queryCariPendaftar);
}

?>