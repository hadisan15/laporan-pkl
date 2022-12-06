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

require_once __DIR__ . '/../../../vendor/autoload.php';
require "pendaftar_functions.php";

$pendaftar = queryTampilPendaftar("SELECT * FROM tb_pendaftar");
$stylesheet = file_get_contents('../../../src/css/print.css');
$mpdf = new \Mpdf\Mpdf();

$html = '
        <!DOCTYPE html>
          <html lang="en">
            <head>
              <meta charset="UTF-8">
              <meta http-equiv="X-UA-Compatible" content="IE=edge">
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <title></title>
            </head>
            <body>
              <img src="../../../src/img/logo-rjch-circle.png" width="75px">
              <h2>LAPORAN DATA PENDAFTAR <br> PELATIHAN DIGITAL MARKETING <br> PT. RAJAWALI CIPTA HARAPAN</h2>
              <br>
              <center>
              <table border="1" cellpadding="10" cellspacing="0">
                <tr>
                  <th>NO</th>
                  <th>Kode Partisipan</th>
                  <th>Nama Pendaftar</th>
                  <th>Tempat Lahir</th>
                  <th>Tempat Lahir</th>
                  <th>Jenis Kelamin</th>
                  <th>Alamat Lengkap</th>
                  <th>Bidang Usaha</th>
                  <th>Email</th>
                  <th>No Telepon</th>
                </tr>';
              $i = 1;
              foreach($pendaftar as $row) {
$html .= '
                <tr>
                  <td>'. $i++ .'</td>
                  <td>'. $row["kode_partisipan"] .'</td>
                  <td>'. $row["nama_pendaftar"] .'</td>
                  <td>'. $row["tempat_lahir"] .'</td>
                  <td>'. $row["tanggal_lahir"] .'</td>
                  <td>'. $row["jenis_kelamin"] .'</td>
                  <td>'. $row["alamat_lengkap"] .'</td>
                  <td>'. $row["bidang_usaha"] .'</td>
                  <td>'. $row["email"] .'</td>
                  <td>'. $row["no_telp"] .'</td>
                </tr>';
              }
$html .= '
              </table>
              <div class="ttd">
                <div class="mengetahui">Banjarmasin, '. date("Y-m-d") .' <br>Mengetahui,</div> 
                <div class="nama">ZUL FAHMI</div>
                <div class="jabatan">Direktur Utama</div>
              </div>
            </body>
          </html>';

$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
$mpdf->Output('Laporan Data Pendaftar.pdf', \Mpdf\Output\Destination::INLINE);

?>