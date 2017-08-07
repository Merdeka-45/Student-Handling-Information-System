<?php include 'koneksi.php';

$id_pel_sis = $_GET['id_pel_sis'];
$id_siswa = $_GET['id_siswa'];
$id = $_GET['id'];

$tgl_kejadian = $_POST['tanggalkejadianupdate'];
$tindaklanjut1 = $_POST['tindaklanjut1'];
$tindaklanjut2 = $_POST['tindaklanjut2'];
$tindaklanjut3 = $_POST['tindaklanjut3'];
$tindaklanjut4 = $_POST['tindaklanjut4'];
$tgltindaklanjut1 = $_POST['tgltindaklanjut1'];
$tgltindaklanjut2 = $_POST['tgltindaklanjut2'];
$tgltindaklanjut3 = $_POST['tgltindaklanjut3'];
$tgltindaklanjut4 = $_POST['tgltindaklanjut4'];

// $pilih_pel_sis = $conn->query("SELECT * FROM tindak_lanjut WHERE id_pel_sis=$id_pel_sis");
$tambah_tindak_lanjut = $conn->query("INSERT INTO tindak_lanjut(id_pel_sis,tindak1,tindak2,tindak3,tindak4,tgl_tindak1,tgl_tindak2,tgl_tindak3,tgl_tindak4) VALUES ('$id_pel_sis','$tindaklanjut1','$tindaklanjut2','$tindaklanjut3','$tindaklanjut4','$tgltindaklanjut1','$tgltindaklanjut2','$tgltindaklanjut3','$tgltindaklanjut4')");
$update_tindak_lanjut = $conn->query("UPDATE tindak_lanjut SET tindak1='$tindaklanjut1', tindak2='$tindaklanjut2', tindak3='$tindaklanjut3', tindak4='$tindaklanjut4', tgl_tindak1='$tgltindaklanjut1', tgl_tindak2='$tgltindaklanjut2', tgl_tindak3='$tgltindaklanjut3', tgl_tindak4='$tgltindaklanjut4' WHERE id=$id");
$update_tgl_kejadian = $conn->query("UPDATE pelanggaran_siswa SET tgl_pelanggaran='$tgl_kejadian' WHERE id_pel_sis='$id_pel_sis'");

$rows = mysqli_num_rows($pilih_pel_sis);
if ($rows < 1){
    $tambah_tindak_lanjut;
    $update_tgl_kejadian;
    header("location:../detail_siswa.php?id_siswa=$id_siswa&alerttindaklanjut=1");
    // echo "tambah";
    // echo "id_siswa='$id_siswa'";
} elseif ($rows = 1) {
    // echo "update";
    $update_tindak_lanjut;
    $update_tgl_kejadian;
    header("location:../detail_siswa.php?id_siswa=$id_siswa&alerttindaklanjut=2");
    // echo "id_siswa='$id_siswa'";
} else {
    echo "GAGAL MELAKUKAN UPDATE";
}



?>
