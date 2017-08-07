<?php
include 'header.php';
require ("functions/koneksi.php");
session_start();
$gurunya = $_SESSION['login_guru'];
$query_opsi = $conn->query("SELECT * FROM pelanggaran ORDER BY id_pelanggaran ASC");
$query_siswa = $conn->query("SELECT * FROM siswa ORDER BY id_siswa ASC");
if (!isset($_SESSION['login_guru'])) {
  die(header('Location:login.php'));
}
 ?>

<div class="" id="halamanguru">
    <div class="col-md-2" id="adminright">
      <a href="#" data-toggle="dropdown" id="adminkanan"><img src="images/admin.png" alt="" id="adminpict">GURU</a>
      <ul class="dropdown-menu" role="menu" id="menuprofil">
          <li><a href="functions/keluar.php">KELUAR</a></li>
      </ul>
    </div>
    <img src="images/logoBA.png" alt="" id="logobaguru">
    <h3 id="text">SMA ISLAM TERPADU BINA AMAL</h3>
    <div class="col-md-4 menuutama" id="menulihatsiswa">
      <a href="#lihatsiswa" role="tab" data-toggle="tab" onclick="halamanGuru()">
          <img src="images/lup.png" alt="">
          <span><b>LIHAT SISWA</b></span>
      </a>
    </div>
</div>

<div class="row" id="halaman">
<style media="screen">
    .alert{
      width: 40%;
      position: absolute;
      top: 21%;
      left: 30%;
      z-index: 1;
    }
</style>
        <?php if(isset($_GET['alert'])){ ?>
              <?php if ($_GET['alert']==1){ ?>
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Berhasil!</strong> Data Pelanggaran berhasil ditambahkan!
                    </div>
                    <?php }elseif($_GET['alert']==2){?>
                            <div class="alert alert-success" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong>Berhasil!</strong> Data Pelanggaran Siswa berhasil ditambahkan!
                            </div>
                          <?php }?>
          <?php }; ?>
        <div class="tab-content">
          <!-- lIHAT SISWA -->
          <div class="col-md-9 tab-pane halaman " id="lihatsiswa" role="tabpanel">
                <h3>SISTEM INFORMASI PENANGANAN SISWA</h3>
                <h1>SISWA</h1>
                <hr>
                <h4>LIHAT SISWA</h4>
                <br>
                <button class="btn btn-primary" type="button" name="button"  data-toggle="modal" data-target="#formtambahsiswa" id="btntambahsiswa">
                  <i class="glyphicon glyphicon-plus"></i>TAMBAH SISWA
                </button>
                <div class="modal fade" role="dialog" id="formtambahsiswa">
                    <div class="modal-dialog modal-md modal-content">
                          <button type="button" class="btn" name="button" data-dismiss="modal" id="xclosemodal">x</button>
                          <br><h4><center>SILAHKAN MASUKAN DATA PELANGGARAN SISWA</center></h4> <br>
                          <form class="form-group" action="functions/tambah_siswa_proses.php" method="post">
                                <div class="">
                                    <label for="nama">NAMA</label>
                                    <input class="form-control" type="text" name="nama_siswa" value="" placeholder="Nama Siswa" required="true" id="nama_siswa" autocomplete="off">
                                    <div class="daftar_nama" id="daftar_nama"></div>
                                </div> <br>
                                <div class="">
                                    <label for="pelanggaran">Pelanggaran</label> <br>
                                    <div class="" id="opsipel">
                                      <div class="" id="opsipelanggaran">
                                            <select class="form-control" style="margin-bottom: 3%;" name="inputpelanggaran[]" id="inputpel">
                                                <?php while($opsi_pel = $query_opsi->fetch_object()){?>
                                                <option value="<?php echo $opsi_pel->jenis; ?>"><?php echo $opsi_pel->jenis;?></option>
                                                  <?php } ?>
                                            </select>
                                            <br><br><br>
                                      </div>
                                          <button class="btn btn-success" type="button" name="button" onClick="tambahOpsi()" id="btntambahopsipelanggaran">
                                          <i class="glyphicon glyphicon-plus" style="margin-right: 2%;"></i>TAMBAH PELANGGARAN</button>
                                    </div>
                                </div> <br>
                                <br>
                                <input type="hidden" name="idpemberi" value="<?php echo $_SESSION['login_guru']?> ">
                                <input type="hidden" name="lvl" value="1">
                                <input type="hidden" name="jenis" value="guru">
                                <button class="btn btn-success" type="submit" name="button">TAMBAH SISWA</button>
                          </form><br><br>
                    </div>
                </div>
                <table>
                  <thead>
                    <th>NO</th>
                    <th>NISN</th>
                    <th>NAMA</th>
                    <th>POIN</th>
                    <th>AKSI</th>
                  </thead>
                  <tbody>
                    <?php
                    $poinnya = $conn->query("SELECT siswa.id_siswa,siswa.nisn,siswa.nama,SUM(pelanggaran.poin) AS poin FROM pelanggaran_siswa INNER JOIN siswa ON siswa.id_siswa=pelanggaran_siswa.id_siswa INNER JOIN pelanggaran ON pelanggaran.id_pelanggaran=pelanggaran_siswa.id_pelanggaran INNER JOIN guru ON pelanggaran_siswa.pemberi=guru.id_guru WHERE guru.id_guru=$gurunya AND pelanggaran_siswa.level=1 GROUP BY siswa.nama ORDER BY poin DESC");
                    $i=1;while($result_poin = $poinnya->fetch_object()){
                    $id_siswa = $result_poin->id_siswa;
                    $nisnnya = $result_poin->nisn;
                    $poin_ku = $result_poin->poin;
                    $namanya = $result_poin->nama;

                      ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td id="NISN"><?php echo $nisnnya; ?></td>
                      <td id="namaasiswa"><?php echo $namanya; ?></td>
                      <td id="poinsiswa"><?php echo $poin_ku; ?></td>
                      <td>
                        <a href="detail_siswa.php?id_siswa=<?php echo $id_siswa;?>">
                          <button class="btn btn-success" type="button" name="hapus" id="btndetail">DETAIL</button>
                        </a>
                        <a href="#">
                          <button class="btn btn-success" type="button" name="hapus" id="btnhapus">HAPUS</button>
                        </a>
                      </td>
                    </tr>
                    <?php $i++;}?>
                  </tbody>
                </table>
          </div>
          <!-- lIHAT SISWA -->
        </div>
</div>
<?php include 'footer.php'; ?>
<script type="text/javascript">
function halamanGuru(){
  document.getElementById("logobaguru").style.marginLeft = "5%";
  document.getElementById("logobaguru").style.width = "100px";
  document.getElementById("logobaguru").style.height = "auto";
  document.getElementById("menulihatsiswa").style.display = "none";
  document.getElementById("text").style.marginLeft = "-40%";
  document.getElementById("text").style.marginTop = "-9%";
  document.getElementById("lihatsiswa").style.marginLeft = "12.3%";
  document.getElementById("lihatsiswa").style.marginTop = "-2%";
  document.getElementById("lihatsiswa").style.transition = "1s ease";
}
window.setTimeout(function() {
$(".alert").fadeTo(500, 0).slideUp(500, function(){
    $(this).remove();
});
}, 1800);
    $('#nama_siswa').keyup(function(){
      var query = $(this).val();
      if (query != ''){
        $.ajax({
          url:"functions/search.php",
          method:"POST",
          data:{query:query},
          success:function(data) {
            $('#daftar_nama').fadeIn();
            $('#daftar_nama').html(data);
          }
        });
      }
    });
    $(document).on('click', '#daftar_nama ul li', function() {
      $('#nama_siswa').val($(this).text());
      $('#daftar_nama').fadeOut();
    });
    $(document).on('click', function() {
      $('#daftar_nama').fadeOut();
    });

</script>
