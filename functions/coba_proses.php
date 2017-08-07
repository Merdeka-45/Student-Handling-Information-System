<?php
include 'koneksi.php';

if(!empty($_POST['pelanggaranaja'])){
  $arr = $_POST['pelanggaranaja'];
  $nama = $_POST['siswa'];
  $guru = $_POST['guru'];
  for ($x=0;$x<count($arr);$x++){
    $pelanggaran = $conn->query("SELECT * FROM pelanggaran WHERE jenis='$arr[$x]'");
    $rows = mysqli_num_rows($pelanggaran);
    if ($rows==1) {
      $pilihpoin = $pelanggaran->fetch_object();
      $poin = $pilihpoin->poin;
    } else {
      echo "salah";
    }
    $query_submit = $conn->query("INSERT INTO coba(pelanggaran,poin,nama,oleh) VALUES ('$arr[$x]','$poin','$nama','$guru')");
  }
  if ($query_submit) {
    header('location:../coba.php');
  }
}

?>
