<?php
include 'header.php';
require 'functions/koneksi.php';
session_start();
if (!isset($_SESSION['login_admin']) && !isset($_SESSION['login_guru'])) {
  die(header('Location:login.php'));
}
$id_siswa = $_GET['id_siswa'];
$siswa = $conn->query("SELECT  pelanggaran_siswa.tgl_pelanggaran,pelanggaran_siswa.id_pel_sis,siswa.nisn, siswa.nama,pelanggaran.jenis,pelanggaran.poin,pelanggaran_siswa.level,pelanggaran_siswa.pemberi,siswa.id_siswa FROM pelanggaran_siswa INNER JOIN siswa ON siswa.id_siswa=pelanggaran_siswa.id_siswa INNER JOIN pelanggaran ON pelanggaran.id_pelanggaran=pelanggaran_siswa.id_pelanggaran WHERE siswa.id_siswa='$id_siswa' ORDER BY pelanggaran_siswa.id_pel_sis DESC");

$siswa1 = $conn->query("SELECT siswa.nisn, siswa.nama FROM pelanggaran_siswa INNER JOIN siswa ON siswa.id_siswa=pelanggaran_siswa.id_siswa WHERE siswa.id_siswa='$id_siswa'");
while ($detail_siswa = $siswa1->fetch_object()) {
  $nisn = $detail_siswa->nisn;
  $nama = $detail_siswa->nama;
}
 ?>
 <div class="row" id="header_detail">
   <div class="col-md-2">
     <img src="images/logoBA.png" alt="" id="logoba">
   </div>
    <div class="col-md-9" id="isihalaman">
        <h3>SISTEM INFORMASI PENANGANAN SISWA</h3>
        <h1>DETAIL SISWA</h1>
        <hr>
    </div>
 </div>
 <?php if (isset($_SESSION['login_admin'])) { ?>
        <a href="adminlvl1.php" id="button_back"><i class="fa fa-chevron-left" aria-hidden="true"></i>Kembali</a>
      <?php }elseif (isset($_SESSION['login_guru'])) { ?>
            <a href="guru.php" id="button_back"><i class="fa fa-chevron-left" aria-hidden="true"></i>Kembali</a>
        <?php } ?>
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
<div class="row" >
     <div class="col-md-offset-1" id="table_detail_siswa">
       <?php if (isset($_SESSION['login_admin'])) { ?>
               <table id="isinya">
                 <thead>
                   <th>PELANGGARAN</th>
                   <th>POIN</th>
                   <th>TANGGAL</th>
                   <th>OLEH</th>
                   <th>AKSI</th>
                 </thead>
                 <tbody>
                   <?php $i=1;while ($detail_siswa1 = $siswa->fetch_object()) {
                     $id_pel_sis = $detail_siswa1->id_pel_sis;
                     $pelanggaran = $detail_siswa1->jenis;
                     $poin = $detail_siswa1->poin;
                     $tglcatat = $detail_siswa1->tgl_pelanggaran;
                     $lvl = $detail_siswa1->level;
                     $pemberi = $detail_siswa1->pemberi;
                     $namasiswanya = $detail_siswa1->nama;
                     $id_pel = $detail_siswa1->id_pel_sis;
                     $id_siswa = $detail_siswa1->id_siswa;
                     $tglformat = date("d-M-y", strtotime($tglcatat));
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
                       <td id="detail_pelanggaran"><?php echo $pelanggaran; ?></td>
                       <td><?php echo $poin; ?></td>
                       <td><?php echo $tglformat; ?></td>
                       <td><?php echo $namapemberi; ?></td>
                       <td> <a class="btn btn-primary" href="edit_pelanggaran_siswa.php?id_pel_sis=<?php echo $id_pel_sis;?>&id_siswa=<?php echo $id_siswa; ?>" id="hapuspel">
                           <i class="fa fa-pencil" aria-hidden="true" style="margin-right: 5px;"></i>EDIT</a>
                           <a href="functions/hapus_pelanggaran_siswa_proses.php?id=<?php echo $id_pel_sis;?>&nama=<?php echo $namasiswanya ?>" id="hapuspel" onclick="return confirm('Hapus <?php echo $pelanggaran;?>?')">
                           <i class="fa fa-trash-o" aria-hidden="true" style="margin-right: 5px;"></i>HAPUS</a>
                     </td>
                     </tr>
                     <?php $i++;} ?>
                     <tr>
                       <td><b>JUMLAH</b></td>
                       <?php
                       $poin = $conn->query("SELECT siswa.nama,SUM(pelanggaran.poin) AS poin FROM pelanggaran_siswa INNER JOIN siswa ON siswa.id_siswa=pelanggaran_siswa.id_siswa INNER JOIN pelanggaran ON pelanggaran.id_pelanggaran=pelanggaran_siswa.id_pelanggaran WHERE siswa.nama='$nama'");
                       while($result_poin = $poin->fetch_object()){
                         $poin_ku = $result_poin->poin;
                       }
                       ?>
                       <td name="poinnya" colspan="4"><?php echo $poin_ku; ?></td>

                     </tr>
                     <tr>
                       <td><b>STATUS</b></td>
                       <td colspan="4">
                         <?php
                         if ($poin_ku >= 100 && $poin_ku <= 500) {
                           echo "BAHAYA";
                         } elseif ($poin_ku >= 1000 ) {
                           echo "SIAGA I";
                         } else {
                           echo "AMAN";
                         }
                         ?>
                       </td>
                     </tr>
                   </tbody>
                 </table>
            <?php }elseif (isset($_SESSION['login_guru'])) {
              $gurunya = $_SESSION['login_guru'];
              $siswa2 = $conn->query("SELECT pelanggaran_siswa.id_pel_sis,siswa.nisn, siswa.nama,pelanggaran.jenis,pelanggaran.poin,pelanggaran_siswa.level,pelanggaran_siswa.pemberi FROM pelanggaran_siswa INNER JOIN siswa ON siswa.id_siswa=pelanggaran_siswa.id_siswa INNER JOIN pelanggaran ON pelanggaran.id_pelanggaran=pelanggaran_siswa.id_pelanggaran INNER JOIN guru ON guru.id_guru=pelanggaran_siswa.pemberi WHERE guru.id_guru=$gurunya AND pelanggaran_siswa.level=1 AND siswa.nama='$nama' ");


              ?>
                  <table id="isinya">
                    <thead>
                      <th>PELANGGARAN</th>
                      <th>POIN</th>
                      <th>OLEH</th>
                      <th>AKSI</th>
                    </thead>
                    <tbody>
                      <?php $i=1;while ($detail_siswa1 = $siswa2->fetch_object()) {
                        $id_pel_sis = $detail_siswa1->id_pel_sis;
                        $pelanggaran = $detail_siswa1->jenis;
                        $poin = $detail_siswa1->poin;
                        $lvl = $detail_siswa1->level;
                        $pemberi = $detail_siswa1->pemberi;
                        $namasiswanya = $detail_siswa1->nama;
                        $id_pel = $detail_siswa1->id_pel_sis;
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
                          <td id="detail_pelanggaran"><?php echo $pelanggaran; ?></td>
                          <td><?php echo $poin; ?></td>
                          <td><?php echo $namapemberi; ?></td>
                          <td> <a class="btn btn-primary" href="edit_pelanggaran_siswa.php?id_pel_sis=<?php echo $id_pel_sis;?>&id_siswa=<?php echo $id_siswa; ?>" id="hapuspel">
                              <i class="fa fa-pencil" aria-hidden="true" style="margin-right: 5px;"></i>EDIT</a>
                              <a href="functions/hapus_pelanggaran_siswa_proses.php?id=<?php echo $id_pel_sis;?>&nama=<?php echo $namasiswanya ?>" id="hapuspel" onclick="return confirm('Hapus <?php echo $pelanggaran;?>?')">
                              <i class="fa fa-trash-o" aria-hidden="true" style="margin-right: 5px;"></i>HAPUS</a></td>
                        </tr>
                        <?php $i++;} ?>
                        <tr>
                          <td><b>JUMLAH</b></td>
                          <?php
                          $poin1 = $conn->query("SELECT siswa.nama,SUM(pelanggaran.poin) AS poin FROM pelanggaran_siswa INNER JOIN siswa ON siswa.id_siswa=pelanggaran_siswa.id_siswa INNER JOIN pelanggaran ON pelanggaran.id_pelanggaran=pelanggaran_siswa.id_pelanggaran INNER JOIN guru ON guru.id_guru=pelanggaran_siswa.pemberi WHERE guru.id_guru=$gurunya AND pelanggaran_siswa.level=1 AND siswa.nama='$nama'");
                          while($result_poin = $poin1->fetch_object()){
                            $poin_ku = $result_poin->poin;
                          }
                          ?>
                          <td name="poinnya" colspan="3"><?php echo $poin_ku; ?></td>

                        </tr>
                        <tr>
                          <td><b>STATUS</b></td>
                          <td colspan="3">
                            <?php
                            if ($poin_ku >= 100 && $poin_ku <= 500) {
                              echo "DANGER";
                            } elseif ($poin_ku >= 1000 ) {
                              echo "SIAGA I";
                            } else {
                              echo "AMAN";
                            }
                            ?>
                          </td>
                        </tr>
                      </tbody>
                    </table>
              <?php } ?>

    </div>
 </div>

 <?php
include 'footer.php';
  ?>
