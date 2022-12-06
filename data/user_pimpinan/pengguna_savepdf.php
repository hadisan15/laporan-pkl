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
if($_SESSION["level"] === "Admin") {
  echo "<script>alert('Anda Tidak Dapat Mengakses Halaman Ini');document.location.href = '../../../index-admin.php';</script>";
}

require_once __DIR__ . '/../../vendor/autoload.php';
require "../user_admin/pengguna/pengguna_functions.php";

$pengguna = queryTampilPengguna("SELECT * FROM tb_pengguna_bio ORDER BY kode_pengguna ASC");
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
              <h2>
              LAPORAN DATA PENGGUNA WEBSITE <br>
              SIM DATA PELATIHAN DIGITAL MARKETING <br> 
              PT. RAJAWALI CIPTA HARAPAN
              </h2>
              <br>
              <center>
              <table border="1" cellpadding="10" cellspacing="0" width="500px">
                <tr>
                  <th>NO</th>
                  <th scope="col">Kode Pengguna</th>
                  <th scope="col">Nama Pengguna</th>
                  <th scope="col">E-mail</th>
                  <th scope="col">Tempat Lahir</th>
                  <th scope="col">Tanggal Lahir</th>
                  <th scope="col">Jenis Kelamin</th>
                  <th scope="col">Alamat</th>
                  <th scope="col">No Telepon</th>
                  <th scope="col">Level Pengguna</th>
                </tr>';
              $i = 1;
              foreach($pengguna as $row) {
$html .= '
                <tr>
                  <td>'. $i++ .'</td>
                  <td>'. $row["kode_pengguna"] .'</td>
                  <td>'. $row["nama_lengkap"] .'</td>
                  <td>'. $row["email"] .'</td>
                  <td>'. $row["tempat_lahir"] .'</td>
                  <td>'. $row["tanggal_lahir"] .'</td>
                  <td>'. $row["jenis_kelamin"] .'</td>
                  <td>'. $row["alamat"] .'</td>
                  <td>'. $row["no_telp"] .'</td>
                  <td>'. $row["level"] .'</td>
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
$mpdf->Output('Laporan Data Pengguna.pdf', \Mpdf\Output\Destination::INLINE);

?>

