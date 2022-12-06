<?php 

session_start();

if(!isset($_SESSION["signin"])) {
  header("Location: ../../sign/user_sign_in.php");
  exit;
}

if($_SESSION["level"] === "Admin") {
  echo "<script>alert('Anda Tidak Dapat Mengakses Halaman Ini');document.location.href = '../../index-admin.php';</script>";
}
if($_SESSION["level"] === "Partisipan") {
  echo "<script>alert('Anda Tidak Dapat Mengakses Halaman Ini');document.location.href = '../../index-partisipan.php';</script>";
}
if($_SESSION["level"] === "Pengajar") {
  echo "<script>alert('Anda Tidak Dapat Mengakses Halaman Ini');document.location.href = '../../index-pengajar.php';</script>";
}

require_once __DIR__ . '/../../vendor/autoload.php';
require "../user_admin/kelas/kelas_functions.php";

$kelas = queryTampilKelas("SELECT * FROM tb_kelas");
$stylesheet = file_get_contents('../../src/css/print.css');
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
              <img src="../../src/img/logo-rjch-circle.png" width="75px">
              <h2>LAPORAN DATA KELAS <br> PELATIHAN DIGITAL MARKETING <br> PT. RAJAWALI CIPTA HARAPAN</h2>
              <br>
              <center>
              <table border="1" cellpadding="10" cellspacing="0">
                <tr>
                  <th>NO</th>
                  <th>Nama Kelas</th>
                  <th>Nama Pengajar</th>
                  <th>Jumlah Peserta</th>
                  <th>Tanggal Mulai</th>
                  <th>Tanggal Selesai</th>
                  <th>Waktu Pelaksanaan</th>
                  <th>Tempat Pelaksanaan</th>
                </tr>';
              $i = 1;
              foreach($kelas as $row) {
$html .= '
                <tr>
                  <td>'. $i++ .'</td>
                  <td>'. $row["nama_kelas"] .'</td>
                  <td>'. $row["nama_pengajar"] .'</td>
                  <td>'. $row["jumlah_peserta"] .'</td>
                  <td>'. $row["tanggal_mulai"] .'</td>
                  <td>'. $row["tanggal_selesai"] .'</td>
                  <td>'. $row["waktu_pelaksanaan"] .'</td>
                  <td>'. $row["tempat_pelaksanaan"] .'</td>
                </tr>';
              }
$html .= '
              </table>
              <div class="ttd">
                <div class="mengetahui">Mengetahui,</div>
                <div class="nama">ZUL FAHMI</div>
                <div class="jabatan">Direktur Utama</div>
              </div>
            </body>
          </html>';

$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
$mpdf->Output('Laporan Data Kelas.pdf', \Mpdf\Output\Destination::INLINE);

?>

