<?php
require 'koneksi.php';
$id_guru = $_GET['id'];

$nama_baru = $_POST['namagurubaru'];
$nip_baru = $_POST['nipgurubaru'];
$pass_baru = $_POST['passgurubaru'];
$email_baru = $_POST['emailgurubaru'];

$update_guru = $conn->query("UPDATE guru SET nip='$nip_baru', nama='$nama_baru', password='$pass_baru', email='$email_baru'
WHERE id_guru='$id_guru'");

if ($update_guru) {
  header("Location:../adminlvl1.php?alert=6");
} else {
  echo "GAGAL MEMPERBAHARUI GURU";
}
 ?>
