<?php
include 'koneksi.php';
$id_siswa = $_GET['id'];
// $hapus_siswa = "<alert>yoooo</alert>";
// var_dump($id_siswa);
$coy = $conn->query("DELETE FROM pelanggaran_siswa WHERE id_siswa=$id_siswa");
if ($coy) {
  header('Location:../adminlvl1.php?alert=5');
} else {
  echo "GAGAL MENGHAPUS SISWA";
}

 ?>
