<?php
include 'header.php';
require 'functions/koneksi.php';
$id = $_GET['id'];
session_start();
$admin = $conn->query("SELECT * FROM admin WHERE id_admin='$id'");
while ($edit_admin = $admin->fetch_object()) {
  $id_admin = $edit_admin->id_admin;
  $nip = $edit_admin->nip;
  $nama = $edit_admin->nama;
  $pass = $edit_admin->password;
  $email = $edit_admin->email;
}
if (!isset($_SESSION['login_admin'])) {
  die(header('Location:login.php'));
}
 ?>
 <div class="" role="dialog" id="ubahadmin">
       <div class=""> <br>
             <br><h4><center>DATA ADMIN</center></h4> <br>
             <form class="form-group" action="functions/edit_admin_proses.php?id=<?php echo $id_admin;?>" method="post">
                   <div class="">
                     <label for="nip">NIP</label>
                     <input class="form-control" type="text" name="nipadminbaru" value="<?php echo $nip?>" required="true">
                   </div> <br>
                   <div class="">
                       <label for="nama">NAMA</label>
                       <input class="form-control" type="text" name="namaadminbaru" value="<?php echo $nama?>" required="true">
                   </div> <br>
                   <div class="">
                       <label for="pass">Password</label>
                       <input class="form-control" type="password" name="passadminbaru" value="<?php echo $pass?>" required="true">
                   </div> <br>
                   <div class="">
                       <label for="email">E-MAIL</label>
                       <input class="form-control" type="email" name="emailadminbaru" value="<?php echo $email?>" required="true">
                   </div> <br>
                   <button class="btn btn-primary" type="submit" name="button">UBAH ADMIN</button>
             </form><br><br>
       </div>
 </div>
 <?php
include 'footer.php';
  ?>
