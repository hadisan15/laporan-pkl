<?php 

$conn = mysqli_connect("localhost", "root", "", "db_pelatihan_digital_marketing");

function queryTampilPeserta($queryTampilPeserta) {
  global $conn; 
  $result = mysqli_query($conn, $queryTampilPeserta);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function tambahPeserta($data) {
  global $conn;

  $kode_partisipan = htmlspecialchars($data["kode_partisipan"]);
  $nama_kelas = htmlspecialchars($data["nama_kelas"]);

  $cekkodepartisipan = mysqli_query($conn, "SELECT kode_partisipan FROM tb_peserta WHERE kode_partisipan = '$kode_partisipan'");
  if(mysqli_fetch_assoc($cekkodepartisipan)) {
    echo "<script>alert('Data Peserta Sudah Ada');</script>";
    return false;
  }

  $queryTambahPeserta = "INSERT INTO tb_peserta (id_peserta, kode_partisipan, nama_kelas)".
  "VALUES ('', '$kode_partisipan', '$nama_kelas')";

  mysqli_query($conn, $queryTambahPeserta);
  return mysqli_affected_rows($conn);
}

function hapusPeserta($id_peserta) {
  global $conn;

  $queryHapusPeserta = "DELETE FROM tb_peserta WHERE id_peserta = $id_peserta";
  mysqli_query($conn, $queryHapusPeserta);
  return mysqli_affected_rows($conn);
}

function ubahPeserta($data) {
  global $conn;

  // $kode_partisipan = htmlspecialchars($data["kode_partisipan"]);
  $nama_kelas = htmlspecialchars($data["nama_kelas"]);

  $id_peserta = ($data["id"]);

  $queryUbahPeserta = "UPDATE tb_peserta SET 
                                  nama_kelas='$nama_kelas'
                                  WHERE id_peserta='$id_peserta'";
              
  mysqli_query($conn, $queryUbahPeserta);

  return mysqli_affected_rows($conn);
}

function cariPeserta($keyword) {

  $queryCariPeserta = "SELECT * FROM tbjoin_pesertapendaftar WHERE nama_pendaftar LIKE '%$keyword%'";
  return queryTampilPeserta($queryCariPeserta);
}

?>