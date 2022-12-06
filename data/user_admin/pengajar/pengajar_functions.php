<?php 

$conn = mysqli_connect("localhost", "root", "", "db_pelatihan_digital_marketing");

function queryTampilPengajar($queryTampilPengajar) {
  global $conn; 
  $result = mysqli_query($conn, $queryTampilPengajar);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function tambahPengajar($data) {
  global $conn;

  $kode_pengajar = htmlspecialchars($data["kode_pengajar"]);
  $nama_pengajar = htmlspecialchars($data["nama_pengajar"]);
  $tempat_lahir = htmlspecialchars($data["tempat_lahir"]);
  $tanggal_lahir = $data["tanggal_lahir"];
  $jenis_kelamin = $data["jenis_kelamin"];
  $email = htmlspecialchars($data["email"]);
  $no_telp = htmlspecialchars($data["no_telp"]);

  $cekkodepengajar = mysqli_query($conn, "SELECT kode_pengajar FROM tb_pengajar WHERE kode_pengajar = '$kode_pengajar'");
  if(mysqli_fetch_assoc($cekkodepengajar)) {
    echo "<script>alert('Kode Pengajar Tidak Boleh Sama');</script>";
    return false;
  }

  $queryTambahPengajar = "INSERT INTO tb_pengajar (id_pengajar, kode_pengajar, nama_pengajar, tempat_lahir, tanggal_lahir, jenis_kelamin, email, no_telp)".
  "VALUES ('', '$kode_pengajar', '$nama_pengajar', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin', '$email', '$no_telp')";

  mysqli_query($conn, $queryTambahPengajar);
  return mysqli_affected_rows($conn);
}

function hapusPengajar($id_pengajar) {
  global $conn;

  $queryHapusPengajar = "DELETE FROM tb_pengajar WHERE id_pengajar = $id_pengajar";
  mysqli_query($conn, $queryHapusPengajar);
  return mysqli_affected_rows($conn);
}

function ubahPengajar($data) {
  global $conn;

  $nama_pengajar = htmlspecialchars($data["nama_pengajar"]);
  $tempat_lahir = htmlspecialchars($data["tempat_lahir"]);
  $tanggal_lahir = $data["tanggal_lahir"];
  $jenis_kelamin = $data["jenis_kelamin"];
  $email = htmlspecialchars($data["email"]);
  $no_telp = htmlspecialchars($data["no_telp"]);

  $id_pengajar = ($data["id"]);

  $queryUbahPengajar = "UPDATE tb_pengajar SET 
                                  nama_pengajar='$nama_pengajar',
                                  tempat_lahir='$tempat_lahir',
                                  tanggal_lahir='$tanggal_lahir',
                                  jenis_kelamin='$jenis_kelamin',
                                  email='$email',
                                  no_telp='$no_telp'
                                  WHERE id_pengajar='$id_pengajar'";
              
  mysqli_query($conn, $queryUbahPengajar);

  return mysqli_affected_rows($conn);
}

function cariPengajar($keyword) {

  $queryCariPengajar = "SELECT * FROM tb_pengajar WHERE nama_pengajar LIKE '%$keyword%'";
  return queryTampilPengajar($queryCariPengajar);
}

?>