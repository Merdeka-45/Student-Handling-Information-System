<?php
include 'koneksi.php';

$nama = $_POST['namaadminbaru'];
$nip = $_POST['nipadminbaru'];
$pass = md5($_POST['passadminbaru']);
$email = $_POST['emailadminbaru'];

$tambah_admin = $conn->query("INSERT INTO admin(nip,nama,password,email) VALUES ('$nip','$nama','$pass','$email')");
if ($tambah_admin) {
  header('location:../adminlvl1.php?alert=4');
} else {
  echo "GAGAL MENAMBAHKAN ADMIN";
}

?>
