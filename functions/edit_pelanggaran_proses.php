<?php
require 'koneksi.php';
$id_pelanggaran = $_GET['id'];

$nama_baru = $_POST['namabaru'];
$poin_baru = $_POST['poinbaru'];

$update_pelanggaran = $conn->query("UPDATE pelanggaran SET jenis='$nama_baru', poin='$poin_baru' WHERE id_pelanggaran='$id_pelanggaran'");

if ($update_pelanggaran) {
  header("Location:../adminlvl1.php?alert=9");
} else {
  echo "GAGAL MEMPERBAHARUI Pelanggaran";
}
 ?>
