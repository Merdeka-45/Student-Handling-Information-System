<?php
require 'koneksi.php';
$id_admin = $_GET['id'];

$nama_baru = $_POST['namaadminbaru'];
$nip_baru = $_POST['nipadminbaru'];
$pass_baru = $_POST['passadminbaru'];
$email_baru = $_POST['emailadminbaru'];

$update_admin = $conn->query("UPDATE admin SET nip='$nip_baru', nama='$nama_baru', password='$pass_baru', email='$email_baru'
WHERE id_admin='$id_admin'");

if ($update_admin) {
  header("Location:../adminlvl1.php?alert=7");
} else {
  echo "GAGAL MEMPERBAHARUI ADMIN";
}
 ?>
