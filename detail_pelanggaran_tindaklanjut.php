<?php
include 'header.php';
require 'functions/koneksi.php';
// session_start();
// // if (!isset($_SESSION['login_siswa'])) {
// //   die(header('Location:login.php'));
// // }
// $nama = $_SESSION['login_siswa'];
// $siswa = $conn->query("SELECT pelanggaran_siswa.tgl_pelanggaran,pelanggaran_siswa.id_pel_sis,siswa.nisn, siswa.nama,pelanggaran.jenis,pelanggaran.poin,pelanggaran_siswa.level,pelanggaran_siswa.pemberi FROM pelanggaran_siswa INNER JOIN siswa ON siswa.id_siswa=pelanggaran_siswa.id_siswa INNER JOIN pelanggaran ON pelanggaran.id_pelanggaran=pelanggaran_siswa.id_pelanggaran WHERE siswa.nama='$nama'");
// $siswa1 = $conn->query("SELECT siswa.nisn, siswa.nama FROM pelanggaran_siswa INNER JOIN siswa ON siswa.id_siswa=pelanggaran_siswa.id_siswa WHERE siswa.nama='$nama'");
// while ($detail_siswa = $siswa1->fetch_object()) {
//   $nisn = $detail_siswa->nisn;
//   $nama = $detail_siswa->nama;
// }

?>
<div class="" id="halamanguru">
    <div class="col-md-2" id="adminright">
      <a href="#" data-toggle="dropdown" id="adminkanan"><img src="images/admin.png" alt="" id="adminpict">SISWA</a>
      <ul class="dropdown-menu" role="menu" id="menuprofil">
        <li><a href="functions/keluar.php">KELUAR</a></li>
      </ul>
    </div>
</div>
<div class="row" id="header_detail">
 <div class="col-md-2">
   <img src="images/logoBA.png" alt="" id="logoba">
 </div>
  <div class="col-md-8" id="isihalaman">
      <h3>SISTEM INFORMASI PENANGANAN SISWA</h3>
      <h1>DETAIL PELANGGARAN SISWA</h1>
      <hr style="width: 64%;">
  </div>
</div>
<div class="row" id="table_pelanggaran" style="margin-top:1%">
      <div class="col-md-offset-1" id="table_detail_siswa">
        <table>
            <tr>
                <td>Nama</td>
                <td>: Wage</td>
            </tr>
            <tr>
                <td>NISN</td>
                <td>: 1221</td>
            </tr>
            <tr>
                <td>Pelanggaran</td>
                <td>: sfahfbakjfnas</td>
            </tr>
            <tr>
                <td>Poin</td>
                <td>: 100</td>
            </tr>
            <tr>
                <td>Tindak Lanjut 1</td>
                <td>Tindak Lanjut 2</td>
            </tr>
            <tr>
                <td>1</td>
                <td>2</td>
            </tr>
            <tr>
                <td>Tindak Lanjut 3</td>
                <td>Tindak Lanjut 4</td>
            </tr>
            <tr>
                <td>3</td>
                <td>4</td>
            </tr>
        </table>
    </div>
</div>


<?php include 'footer.php'; ?>
