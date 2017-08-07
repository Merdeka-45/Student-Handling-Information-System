<?php
include 'koneksi.php';

$id = $_GET['id'];
$nama = $_GET['nama'];

$hapus_pel_siswa = $conn->query("DELETE FROM pelanggaran_siswa WHERE id_pel_sis='$id'");

if ($hapus_pel_siswa) {
  header("Location:../detail_siswa.php?nama=$nama");
} else {
  echo "GAGAL MENGHAPUS PELANGGARAN";
}



 ?>
