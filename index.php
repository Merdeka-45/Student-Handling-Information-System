<?php
include ("header.php");
require ("functions/koneksi.php");
session_start();

if (!isset($_SESSION['login_admin'])) {
  die(header('Location:login.php'));
}
?>
<nav class="navbar navbar-default" id="navheader">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#target-list">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
      </button>
      <h3>SMA ISLAM TERPADU BINA AMAL</h3>
    </div>
    <div class="navbar-right" id="akunkanan">
          <a href="#" data-toggle="dropdown" id="adminkanan"><img src="images/akun1.png" alt="">ADMIN</a>
          <ul class="dropdown-menu" role="menu" id="menuprofil">
              <li><a href="functions/keluar.php">KELUAR</a></li>
          </ul>
    </div>
</nav>
<div class="row">
    <div class="col-md-12">
        <img src="images/logoBA.png" alt="" id="logoba">
    </div>
</div>
<div class="row">
    <div class="col-md-12" id="judulSI">
        <h1>SISTEM INFORMASI PENANGANAN SISWA</h1>
    </div>
</div>
<div class="row" id="menuutamanya">
      <div class="col-md-4 menuutama" id="menuutama1">
        <a href="adminlvl1.php">
            <img src="images/tameng.png" alt="">
            <span><b>PELANGGARAN</b></span>
        </a>
      </div>
      <div class="col-md-4 menuutama" id="menuutama2">
        <a href="adminlvl1.php">
            <img src="images/akunkelola.png" alt="">
            <span><b>PENGELOLA</b></span>
        </a>
      </div>
      <div class="col-md-4 menuutama" id="menuutama3">
        <a href="adminlvl1.php">
            <img src="images/lup.png" alt="">
            <span><b>LIHAT SISWA</b></span>
        </a>
      </div>
</div>
<?php include 'footer.php'; ?>
