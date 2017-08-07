<?php
session_start();

require 'koneksi.php';

$id = $_GET['idlogin'];
$pass = md5($_GET['password']);
$jenis = $_GET['pilihanid'];

 if ($jenis == 'admin') {
   $login_pengelola = $conn->query("SELECT * FROM admin WHERE nip='$id' AND password='$pass'");
 } else if ($jenis == 'guru') {
   $login_guru = $conn->query("SELECT * FROM guru WHERE nip='$id' AND password='$pass'");
 } else if ($jenis == 'siswa') {
   $login_siswa = $conn->query("SELECT * FROM siswa WHERE nisn='$id' AND password='$pass'");
 } else {
   echo "Maaf Anda tidak terdaftar pada jenis kategori manapun";
 }

if ($login_pengelola) {
        $rows = mysqli_num_rows($login_pengelola);
        if ($rows == 1) {
          $hasil_login = $login_pengelola->fetch_object();
          $_SESSION['login_admin'] = $hasil_login->id_admin;
          header('location:../index.php');
          // var_dump('admin');
        } else {
          echo "tidak berhasil login admin";
        }
    } elseif ($login_guru) {
            $rows = mysqli_num_rows($login_guru);
            if ($rows == 1) {
                $hasil_login = $login_guru->fetch_object();
                $_SESSION['login_guru'] = $hasil_login->id_guru;
                header('location:../guru.php');
            } else {
              echo "tidak berhasil login guru";
            }
        } elseif ($login_siswa){
            $rows = mysqli_num_rows($login_siswa);
            if ($rows == 1) {
              $hasil_login = $login_siswa->fetch_object();
              $_SESSION['login_siswa'] = $hasil_login->nama;
              header('location:../siswa.php');
            } else {
              echo "tidak berhasil login siswa";
            }
          }  else {
                    echo "Anda tidak masuk dalam kategori manapun";
                  }

 ?>
