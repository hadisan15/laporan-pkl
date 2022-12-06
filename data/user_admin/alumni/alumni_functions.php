<?php 

$conn = mysqli_connect("localhost", "root", "", "db_pelatihan_digital_marketing");

function queryTampilAlumni($queryTampilAlumni) {
  global $conn; 
  $result = mysqli_query($conn, $queryTampilAlumni);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function tambahAlumni($data) {
  global $conn;

  $kode_partisipan = $data["kode_partisipan"];

  $ceknamakelas = mysqli_query($conn, "SELECT kode_partisipan FROM tb_alumni WHERE kode_partisipan = '$kode_partisipan'");
  if(mysqli_fetch_assoc($ceknamakelas)) {
    echo "<script>alert('Data Alumni Sudah Ada');</script>";
    return false;
  }

  $queryTambahAlumni = "INSERT INTO tb_alumni (id_alumni, kode_partisipan)".
  "VALUES ('', '$kode_partisipan')";

  mysqli_query($conn, $queryTambahAlumni);
  return mysqli_affected_rows($conn);
}

function hapusAlumni($id_alumni) {
  global $conn;

  $queryHapusAlumni = "DELETE FROM tb_alumni WHERE id_alumni = $id_alumni";
  mysqli_query($conn, $queryHapusAlumni);
  return mysqli_affected_rows($conn);
}

function ubahAlumni($data) {
  global $conn;

  $kode_partisipan = $data["kode_partisipan"];
  // $tanggal_mulai_pelatihan = htmlspecialchars($data["tanggal_mulai_pelatihan"]);
  // $tanggal_selesai_pelatihan = htmlspecialchars($data["tanggal_selesai_pelatihan"]);

  $id_alumni = ($data["id"]);

  $queryUbahAlumni = "UPDATE tb_alumni SET 
  kode_partisipan = '$kode_partisipan'
  WHERE id_alumni = '$id_alumni'";

  mysqli_query($conn, $queryUbahAlumni);

  return mysqli_affected_rows($conn);
}

function cariAlumni($keyword) {

  $queryCariAlumni = "SELECT * FROM tbjoin_pesertakelasalumni WHERE nama_pendaftar LIKE '%$keyword%'";
  return queryTampilAlumni($queryCariAlumni);
}

?>