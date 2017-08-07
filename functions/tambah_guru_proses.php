<?php
include 'koneksi.php';

$nama = $_POST['namagurubaru'];
$nip = $_POST['nipgurubaru'];
$pass = md5($_POST['passgurubaru']);
$email = $_POST['emailgurubaru'];

$tambah_admin = $conn->query("INSERT INTO guru(nip,nama,password,email) VALUES ('$nip','$nama','$pass','$email')");
if ($tambah_admin) {
  header('location:../adminlvl1.php?alert=3');
} else {
  echo "GAGAL MENAMBAHKAN GURU";
}

?>
