<?php
include 'header.php';
require 'functions/koneksi.php';
session_start();
if (!isset($_SESSION['login_admin'])) {
  die(header('Location:login.php'));
}
$id = $_GET['id'];

$pelanggaran = $conn->query("SELECT * FROM pelanggaran WHERE id_pelanggaran='$id'");
while ($edit_pelanggaran = $pelanggaran->fetch_object()) {
  $id_pelanggaran = $edit_pelanggaran->id_pelanggaran;
  $nama = $edit_pelanggaran->jenis;
  $poin = $edit_pelanggaran->poin;
}
 ?>
 <div class="" role="dialog" id="ubahadmin">
       <div class=""> <br>
             <br><h4><center>DATA PELANGGARAN</center></h4> <br>
             <form class="form-group" action="functions/edit_pelanggaran_proses.php?id=<?php echo $id_pelanggaran;?>" method="post">
                   <div class="">
                     <label for="nip">NAMA PELANGGARAN</label>
                     <input class="form-control" type="text" name="namabaru" value="<?php echo $nama?>" required="true">
                   </div> <br>
                   <div class="">
                       <label for="nama">POIN</label>
                       <input class="form-control" type="text" name="poinbaru" value="<?php echo $poin?>" required="true">
                   </div> <br>
                   <button class="btn btn-primary" type="submit" name="button">UBAH PELANGGARAN</button>
             </form><br><br>
       </div>
 </div>
 <?php
include 'footer.php';
  ?>
