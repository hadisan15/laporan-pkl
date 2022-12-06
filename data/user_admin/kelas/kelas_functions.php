<?php 

$conn = mysqli_connect("localhost", "root", "", "db_pelatihan_digital_marketing");

function queryTampilKelas($queryTampilKelas) {
  global $conn; 
  $result = mysqli_query($conn, $queryTampilKelas);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function tambahKelas($data) {
  global $conn;

  $nama_kelas = htmlspecialchars($data["nama_kelas"]);
  $nama_pengajar = $data["nama_pengajar"];
  $jumlah_peserta = htmlspecialchars($data["jumlah_peserta"]);
  $tanggal_mulai = $data["tanggal_mulai"];
  $tanggal_selesai = $data["tanggal_selesai"];
  $waktu_pelaksanaan = $data["waktu_pelaksanaan"];
  $tempat_pelaksanaan = htmlspecialchars($data["tempat_pelaksanaan"]);

  $ceknamakelas = mysqli_query($conn, "SELECT nama_kelas FROM tb_kelas WHERE nama_kelas = '$nama_kelas'");
  if(mysqli_fetch_assoc($ceknamakelas)) {
    echo "<script>alert('Nama Kelas Sudah Ada');</script>";
    return false;
  }

  $queryTambahKelas = "INSERT INTO tb_kelas (id_kelas, nama_kelas, nama_pengajar, jumlah_peserta, tanggal_mulai, tanggal_selesai, waktu_pelaksanaan, tempat_pelaksanaan)".
  "VALUES ('', '$nama_kelas', '$nama_pengajar', '$jumlah_peserta', '$tanggal_mulai', '$tanggal_selesai', '$waktu_pelaksanaan', '$tempat_pelaksanaan')";

  mysqli_query($conn, $queryTambahKelas);
  return mysqli_affected_rows($conn);
}

function hapusKelas($id_kelas) {
  global $conn;

  $queryHapusKelas = "DELETE FROM tb_kelas WHERE id_kelas = $id_kelas";
  mysqli_query($conn, $queryHapusKelas);
  return mysqli_affected_rows($conn);
}

function ubahKelas($data) {
  global $conn;

  $nama_kelas = htmlspecialchars($data["nama_kelas"]);
  $nama_pengajar = htmlspecialchars($data["nama_pengajar"]);
  $jumlah_peserta = htmlspecialchars($data["jumlah_peserta"]);
  $tanggal_mulai = $data["tanggal_mulai"];
  $tanggal_selesai = $data["tanggal_selesai"];
  $waktu_pelaksanaan = $data["waktu_pelaksanaan"];
  $tempat_pelaksanaan = htmlspecialchars($data["tempat_pelaksanaan"]);

  $id_kelas = ($data["id"]);

  $queryUbahKelas = "UPDATE tb_kelas SET 
                                  nama_kelas='$nama_kelas',
                                  nama_pengajar='$nama_pengajar',
                                  jumlah_peserta='$jumlah_peserta',
                                  tanggal_mulai='$tanggal_mulai',
                                  tanggal_selesai='$tanggal_selesai',
                                  waktu_pelaksanaan='$waktu_pelaksanaan',
                                  tempat_pelaksanaan='$tempat_pelaksanaan'
                                  WHERE id_kelas='$id_kelas'";
              
  mysqli_query($conn, $queryUbahKelas);

  return mysqli_affected_rows($conn);
}

function cariKelas($keyword) {
  $queryCariKelas = "SELECT * FROM tb_kelas WHERE nama_kelas LIKE '%$keyword%'";
  return queryTampilKelas($queryCariKelas);
}



?>