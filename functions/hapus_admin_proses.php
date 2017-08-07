<?php
include 'koneksi.php';

$id_adm = $_GET['id'];
$query = $conn->query("SELECT * FROM admin WHERE id_admin='$id_adm'");

$hapus_adm = $conn->query("DELETE FROM admin WHERE id_admin='$id_adm'");

if ($hapus_adm) {
  header('Location:../adminlvl1.php');
} else {
  echo "GAGAL MENGHAPUS ADMIN";
}

 ?>
