<?php
require 'koneksi.php';
$id_pel = $_GET['id'];

$hapus_pel = $conn->query("DELETE FROM pelanggaran WHERE id_pelanggaran='$id_pel'");
if ($hapus_pel) {
  header('location:../adminlvl1.php?alert=11');
} else {
  echo "GAGAL MENGHAPUS PELANGGARAN";
}
 ?>
