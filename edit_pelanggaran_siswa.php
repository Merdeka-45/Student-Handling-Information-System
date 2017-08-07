<?php
include 'functions/koneksi.php';
include 'header.php';
$id_pel_sis = $_GET['id_pel_sis'];
$id_siswa = $_GET['id_siswa'];

$pilih_pel_sis = $conn->query("SELECT  pelanggaran_siswa.tgl_pelanggaran,pelanggaran_siswa.id_pel_sis, siswa.nama,pelanggaran.jenis,pelanggaran.poin,siswa.id_siswa FROM pelanggaran_siswa INNER JOIN siswa ON siswa.id_siswa=pelanggaran_siswa.id_siswa INNER JOIN pelanggaran ON pelanggaran.id_pelanggaran=pelanggaran_siswa.id_pelanggaran WHERE siswa.id_siswa=$id_siswa AND pelanggaran_siswa.id_pel_sis=$id_pel_sis");

while ($detail_pel_siswa1 = $pilih_pel_sis->fetch_object()) {
  $id_pel_sis = $detail_pel_siswa1->id_pel_sis;
  $pelanggaran = $detail_pel_siswa1->jenis;
  $poin = $detail_pel_siswa1->poin;
  $tglcatat = $detail_pel_siswa1->tgl_pelanggaran;
  $namasiswanya = $detail_pel_siswa1->nama;
  $id_pel = $detail_pel_siswa1->id_pel_sis;
}
$pilih_detail_tindak_lanjut = $conn->query("SELECT * FROM tindak_lanjut WHERE id_pel_sis=$id_pel_sis");
$rows = mysqli_num_rows($pilih_detail_tindak_lanjut);
if ($rows == 1) {
  while ($detail_tindak_lanjut = $pilih_detail_tindak_lanjut->fetch_object()) {
    $id = $detail_tindak_lanjut->id;
    $tindak1 = $detail_tindak_lanjut->tindak1;
    $tindak2 = $detail_tindak_lanjut->tindak2;
    $tindak3 = $detail_tindak_lanjut->tindak3;
    $tindak4 = $detail_tindak_lanjut->tindak4;
    $tgl_tindak1 = $detail_tindak_lanjut->tgl_tindak1;
    $tgl_tindak2 = $detail_tindak_lanjut->tgl_tindak2;
    $tgl_tindak3 = $detail_tindak_lanjut->tgl_tindak3;
    $tgl_tindak4 = $detail_tindak_lanjut->tgl_tindak4;
  }
}
?>
<h3><center><b>PERBAHARUI PELANGGARAN SISWA</b></center></h3>
<a href="detail_siswa.php?id_siswa=<?php echo $id_siswa;?>" class="btn btn-primary" id="backdetailpelanggaran"><i class="fa fa-chevron-left" aria-hidden="true" style="margin-right:5px;"></i>Kembali</a>
<p style="margin-left: 10.5%;margin-bottom: 1%;margin-top: 1%;">
  # Untuk mengganti Nama Pelanggaran dan Poin Pelanggaran Silahkan Hubungi Admin Sistem #</p>
<div class="row">
    <form class="col-md-offset-1 col-md-10" action="functions/update_pelanggaran_siswa.php?id=<?php echo $id?>&id_siswa=<?php echo $id_siswa?>&id_pel_sis=<?php echo $id_pel_sis;?>" method="post">
        <div class="row">
              <div class="col-md-5">
                  <div class="form-group">
                      <label for="">Nama Siswa</label>
                      <input class="form-control" type="text" value="<?php echo $namasiswanya?> " disabled>
                  </div>
                  <div class="form-group">
                      <label for="">Tanggal Kejadian</label>
                      <input class="form-control" type="date" value="<?php echo $tglcatat;?>" name="tanggalkejadianupdate">
                  </div>
              </div>
              <div class="col-md-7">
                  <div class="form-group">
                    <label for="">Pelanggaran</label>
                    <input class="form-control" type="text" name="pelanggaransiswaupdate" disabled value="<?php echo $pelanggaran ?>">
                  </div>
                  <div class="form-group">
                    <label for="">Poin</label>
                    <input class="form-control" type="text" name="poinpelanggaransiswaupdate" disabled value="<?php echo $poin ?>">
                  </div>
              </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                  <div class="row form-group">
                    <label for="">Tindak Lanjut 1</label> <br>
                    <div class="col-md-7 form-group">
                      <textarea name="tindaklanjut1" rows="5" cols="34"><?php if ($rows==1) {echo $tindak1; } else {echo '';} ?></textarea>
                    </div>
                    <div class="col-md-5 form-group">
                      <input class="form-control" type="date" name="tgltindaklanjut1" value="<?php if ($rows==1) {echo $tgl_tindak1; } else {echo '';}?>">
                    </div>
                  </div>
                  <div class="row form-group">
                    <label for="">Tindak Lanjut 2</label> <br>
                    <div class="col-md-7 form-group">
                      <textarea name="tindaklanjut2" rows="5" cols="34"><?php if ($rows==1) { echo $tindak2;} else {echo '';}?></textarea>
                    </div>
                    <div class="col-md-5 form-group">
                      <input class="form-control" type="date" name="tgltindaklanjut2" value="<?php if ($rows==1) {echo $tgl_tindak2; } else {echo '';}?>">
                    </div>
                  </div>
            </div>
            <div class="col-md-6">
                  <div class="row form-group">
                    <label for="">Tindak Lanjut 3</label> <br>
                    <div class="col-md-7 form-group">
                      <textarea name="tindaklanjut3" rows="5" cols="34"><?php if ($rows==1) { echo $tindak3;} else {echo '';}?></textarea>
                    </div>
                    <div class="col-md-5 form-group">
                      <input class="form-control" type="date" name="tgltindaklanjut3" value="<?php if ($rows==1) {echo $tgl_tindak3; } else {echo '';}?>">
                    </div>
                  </div>
                  <div class="row form-group">
                    <label for="">Tindak Lanjut 4</label> <br>
                    <div class="col-md-7 form-group">
                      <textarea name="tindaklanjut4" rows="5" cols="34"><?php if ($rows==1) { echo $tindak4;} else {echo '';}?></textarea>
                    </div>
                    <div class="col-md-5 form-group">
                      <input class="form-control" type="date" name="tgltindaklanjut4" value="<?php if ($rows==1) {echo $tgl_tindak4; } else {echo '';}?>">
                    </div>
                  </div>
            </div>
        </div>
        <br>
        <button class="btn btn-success" style="display:block; margin: 0 auto;"type="submit" name="btnsubmit">Perbaharui Pelanggaran</button>
    </form>
</div>
<br>

<?php include 'footer.php'; ?>
