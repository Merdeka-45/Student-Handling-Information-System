<?php
include 'koneksi.php';

$namapel = strtoupper($_POST['nama-pelanggaran']);
$namapel1 = $_POST['nama-pelanggaran'];
$poinpel = $_POST['poin-pelanggaran'];
$realstringnamapel = mysqli_real_escape_string($conn, $namapel);
$pilihpelanggaran = $conn->query("SELECT * FROM pelanggaran WHERE jenis='$realstringnamapel' LIMIT 1");
if (mysqli_num_rows($pilihpelanggaran) > 0) {
  header('location:../adminlvl1.php?alert=100');
} else {
    $tambah_pelanggaran = $conn->query("INSERT INTO pelanggaran(jenis,poin) VALUES ('$namapel1','$poinpel')");
    if ($tambah_pelanggaran) {
      header('location:../adminlvl1.php?alert=1');
    } else {
      echo "Tidak bisa menambahkan pelanggaran";
    }
}
 ?>
