<?php
include 'header.php';
require 'functions/koneksi.php';
session_start();
if (!isset($_SESSION['login_admin'])) {
  die(header('Location:login.php'));
}
$id = $_GET['id'];

$guru = $conn->query("SELECT * FROM guru WHERE id_guru='$id'");
while ($edit_guru = $guru->fetch_object()) {
  $id_guru = $edit_guru->id_guru;
  $nip = $edit_guru->nip;
  $nama = $edit_guru->nama;
  $pass = $edit_guru->password;
  $email = $edit_guru->email;
}
 ?>
 <div class="" role="dialog" id="ubahadmin">
       <div class=""> <br>
             <br><h4><center>DATA GURU</center></h4> <br>
             <form class="form-group" action="functions/edit_guru_proses.php?id=<?php echo $id_guru;?>" method="post">
                   <div class="">
                     <label for="nip">NIP</label>
                     <input class="form-control" type="text" name="nipgurubaru" value="<?php echo $nip?>" required="true">
                   </div> <br>
                   <div class="">
                       <label for="nama">NAMA</label>
                       <input class="form-control" type="text" name="namagurubaru" value="<?php echo $nama?>" required="true">
                   </div> <br>
                   <div class="">
                       <label for="pass">Password</label>
                       <input class="form-control" type="password" name="passgurubaru" value="<?php echo $pass?>" required="true">
                   </div> <br>
                   <div class="">
                       <label for="email">E-MAIL</label>
                       <input class="form-control" type="email" name="emailgurubaru" value="<?php echo $email?>" required="true">
                   </div> <br>
                   <button class="btn btn-primary" type="submit" name="button">UBAH GURU</button>
             </form><br><br>
       </div>
 </div>
 <?php
include 'footer.php';
  ?>
