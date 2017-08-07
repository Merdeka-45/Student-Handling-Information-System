<?php
include 'header.php';
require 'functions/koneksi.php';
session_start();
if (!isset($_SESSION['login_siswa'])) {
  die(header('Location:login.php'));
}
$nama = $_SESSION['login_siswa'];
$siswa = $conn->query("SELECT pelanggaran_siswa.tgl_pelanggaran,pelanggaran_siswa.id_pel_sis,siswa.nisn, siswa.nama,pelanggaran.jenis,pelanggaran.poin,pelanggaran_siswa.level,pelanggaran_siswa.pemberi FROM pelanggaran_siswa INNER JOIN siswa ON siswa.id_siswa=pelanggaran_siswa.id_siswa INNER JOIN pelanggaran ON pelanggaran.id_pelanggaran=pelanggaran_siswa.id_pelanggaran WHERE siswa.nama='$nama'");
$siswa1 = $conn->query("SELECT siswa.nisn, siswa.nama FROM pelanggaran_siswa INNER JOIN siswa ON siswa.id_siswa=pelanggaran_siswa.id_siswa WHERE siswa.nama='$nama'");
while ($detail_siswa = $siswa1->fetch_object()) {
  $nisn = $detail_siswa->nisn;
  $nama = $detail_siswa->nama;
}
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
<?php
    if (mysqli_num_rows($siswa) == 0) {
      echo "<p class='col-md-offset-3' style='font-size: 18pt;margin-top: 3%;margin-bottom: 5%;' id='ket_tidak_ada'><b>Data Pelanggaran $nama Tidak Ada</b></p>";
    } else {
 ?>

<div class="row" style="margin-top: 1%;">
     <div class="col-md-offset-1 col-md-1" id="ketnama">
         <p>NISN</p>
         <p>NAMA</p>
     </div>
     <div class="col-md-2">
         <p>: <?php echo $nisn; ?></p>
         <p>: <?php echo $nama; ?></p>
     </div>
     <div class="col-md-offset-1 col-md-2" id="tombol_print">
        <a target="_blank" href="functions/print.php?nisn=<?php echo $nisn;?>"><i class="fa fa-print" aria-hidden="true" id="logo_print"></i>PRINT</a>
     </div>
</div>
<div class="row" id="table_pelanggaran">
    <div class="col-md-offset-1" id="table_detail_siswa">
        <table id="isinya">
              <thead>
                    <th>NO</th>
                    <th>PELANGGARAN</th>
                    <th>POIN</th>
                    <th>TANGGAL</th>
                    <th>OLEH</th>
                    <th>AKSI</th>
              </thead>
              <tbody>

                  <?php $i=1;while ($detail_siswa1 = $siswa->fetch_object()) {
                    $pelanggaran = $detail_siswa1->jenis;
                    $tgl_kejadian = $detail_siswa1->tgl_pelanggaran;
                    $poin = $detail_siswa1->poin;
                    $lvl = $detail_siswa1->level;
                    $pemberi = $detail_siswa1->pemberi;
                    $namasiswanya = $detail_siswa1->nama;
                    $id_pel = $detail_siswa1->id_pel_sis;
                    $tglformat = date("d-M-y", strtotime($tgl_kejadian));
                    if ($lvl == 0) {
                      $pilihpemberi = $conn->query("SELECT nama FROM admin WHERE id_admin=$pemberi");
                      $objekpemberi = $pilihpemberi->fetch_object();
                      $namapemberi = $objekpemberi->nama;
                    } elseif ($lvl == 1) {
                      $pilihpemberi = $conn->query("SELECT nama FROM guru WHERE id_guru=$pemberi");
                      $objekpemberi = $pilihpemberi->fetch_object();
                      $namapemberi = $objekpemberi->nama;
                    }
                    ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td style="text-align:left;padding-left:2%;"><?php echo $pelanggaran; ?></td>
                      <td><?php echo $poin; ?></td>
                      <td><?php echo $tglformat; ?></td>
                      <td><?php echo $namapemberi; ?></td>
                      <td><a class="btn btn-success" href="#">DETAIL</a></td>
                    </tr>
                    <?php $i++;} ?>
                    <tr>
                        <td colspan="4"><b>JUMLAH</b></td>
                        <?php
                        $poin = $conn->query("SELECT siswa.nama,SUM(pelanggaran.poin) AS poin FROM pelanggaran_siswa INNER JOIN siswa ON siswa.id_siswa=pelanggaran_siswa.id_siswa INNER JOIN pelanggaran ON pelanggaran.id_pelanggaran=pelanggaran_siswa.id_pelanggaran WHERE siswa.nama='$nama'");
                        while($result_poin = $poin->fetch_object()){
                          $poin_ku = $result_poin->poin;
                        }
                        ?>
                        <td colspan="2"><?php echo $poin_ku; ?></td>
                    </tr>
                    <tr>
                        <td colspan="4"><b>STATUS</b></td>
                        <td colspan="2">
                          <?php
                          if ($poin_ku >= 100 && $poin_ku <= 500) {
                            echo "<b>BAHAYA</b>";
                          } elseif ($poin_ku >= 1000 ) {
                            echo "<b>SIAGA 1</b>";
                          } else {
                            echo "<b>AMAN</b>";
                          }
                          ?>
                        </td>
                    </tr>
              </tbody>
        </table>
    </div>
</div>
<?php   } ?>

 <?php
include 'footer.php';
  ?>
