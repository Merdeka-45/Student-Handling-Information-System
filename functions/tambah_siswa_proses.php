<?php
include 'koneksi.php';

$jenis = $_POST['jenis'];
if(!empty($_POST['inputpelanggaran'])){
  $arr = $_POST['inputpelanggaran'];
  $nama = $_POST['nama_siswa'];
  $tglcatat = $_POST['tglpelanggaran'];
  $pemberi = $_POST['idpemberi'];
  $lvl = $_POST['lvl'];
  for ($x=0;$x<count($arr);$x++){
    $id_pelanggaran = $conn->query("SELECT id_pelanggaran FROM pelanggaran WHERE jenis='$arr[$x]'");
    $id_siswa = $conn->query("SELECT id_siswa FROM siswa WHERE nama='$nama'");
    $pilihid = $id_pelanggaran->fetch_object();
    $id_dipilih = $pilihid->id_pelanggaran;
    $pilihid_siswa = $id_siswa->fetch_object();
    $id_dipilih_siswa = $pilihid_siswa->id_siswa;
    $query_submit = $conn->query("INSERT INTO pelanggaran_siswa(id_siswa,id_pelanggaran,level,pemberi,tgl_pelanggaran) VALUES ('$id_dipilih_siswa','$id_dipilih','$lvl','$pemberi','$tglcatat[$x]')");
  }
  if ($query_submit) {
    if ($jenis == 'admin') {
      header('location:../adminlvl1.php?alert=2');
    } elseif ($jenis == 'guru') {
      header('location:../guru.php?alert=2');
    } else {
      echo "Salah";
    }
  }
}
?>
