<?php
include 'header.php';
require ("functions/koneksi.php");
session_start();

$query_pelanggaran = $conn->query("SELECT * FROM pelanggaran ORDER BY id_pelanggaran ASC");
$query_opsi = $conn->query("SELECT * FROM pelanggaran ORDER BY id_pelanggaran ASC");
$query_admin = $conn->query("SELECT * FROM admin ORDER BY id_admin ASC");
$query_guru = $conn->query("SELECT * FROM guru ORDER BY id_guru ASC");
$query_siswa = $conn->query("SELECT * FROM siswa ORDER BY id_siswa ASC");
// $idsession = $_SESSION['id_admin'];
if (!isset($_SESSION['login_admin'])) {
  die(header('Location:login.php'));
}
 ?>
<script type="text/javascript" src="js/jquery.js"></script>
<div id="sidebar" class="sidenav">
      <a id="closesidebar" href="javascript:void(0)" class="closebtn" onclick="closeNav()"><img src="images/set.png" alt=""></a>
      <img src="images/logoBA.png" alt="" id="logoba">
      <h3><center>SMA ISLAM TERPADU <br> BINA AMAL<center></h2>
        <div class="menusidebar">
          <div class="pelanggaran1">
            <a href="#submenusidebar" data-toggle="collapse"><img src="images/tameng1.png" alt="tameng" id="tameng">PELANGGARAN</a>
            <div id="submenusidebar" class="submenusidebar collapse">
              <a href="#isihalaman" class="side-tab-list" role="tab" data-toggle="tab">TAMBAH</a>
              <a href="#lihatpel" class="side-tab-list" role="tab" data-toggle="tab">LIHAT</a>
            </div>
          </div>
          <div class="pelanggaran1">
            <a href="#submenusidebar1" data-toggle="collapse"><img src="images/akunkelola1.png" alt="" id="tameng">PENGELOLA</a>
            <div id="submenusidebar1" class="submenusidebar collapse">
              <a href="#lihatadmin" class="side-tab-list" role="tab" data-toggle="tab" class="">ADMIN</a>
              <a href="#lihatguru" class="side-tab-list" role="tab" data-toggle="tab">GURU</a>
            </div>
          </div>
          <div class="pelanggaran1">
            <a href="#lihatsiswa" role="tab" data-toggle="tab"><img src="images/lup1.png" alt="" id="tameng">LIHAT SISWA</a>
          </div>
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
                      <?php }elseif($_GET['alert']==11){?>
                              <div class="alert alert-success" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  <strong>Berhasil!</strong> Data Pelanggaran berhasil dihapus!
                              </div>
                            <?php }elseif($_GET['alert']==100){?>
                                    <div class="alert alert-danger" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <strong>Gagal!</strong> Data Pelanggaran Sudah ada!
                                    </div>
                                    <?php }elseif($_GET['alert']==2){?>
                                            <div class="alert alert-success" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <strong>Berhasil!</strong> Data Pelanggaran Siswa berhasil ditambahkan!
                                            </div>
                                          <?php }elseif($_GET['alert']==3){?>
                                                  <div class="alert alert-success" role="alert">
                                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                      <strong>Berhasil!</strong> Data Guru berhasil ditambahkan!
                                                  </div>
                                            <?php } elseif($_GET['alert']==4){?>
                                                    <div class="alert alert-success" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <strong>Berhasil!</strong> Data Admin berhasil ditambahkan!
                                                    </div>
                                              <?php } elseif($_GET['alert']==9){?>
                                                        <div class="alert alert-success" role="alert">
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <strong>Berhasil!</strong> Pelanggaran berhasil diubah!
                                                        </div>
                                              <?php } elseif($_GET['alert']==5){?>
                                                        <div class="alert alert-success" role="alert">
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <strong>Berhasil!</strong> Data Pelanggaran Siswa berhasil dihapus!
                                                        </div>
                                              <?php } ?>
            <?php }; ?>

        <div class="col-md-1">
          <img  id="minsidebar" src="images/set.png" alt="" onclick="openNav()">
        </div>
        <div class="tab-content">
              <!-- PELANGGARAN -->
              <div class="col-md-9 tab-pane halaman" id="isihalaman" role="tabpanel">
                  <h3>SISTEM INFORMASI PENANGANAN SISWA</h3>
                  <h1>PELANGGARAN</h1>
                  <hr>
                  <h4>TAMBAH PELANGGARAN</h4>
                  <br> <br>
                  <form class="form-group" class="" action="functions/tambah_pelanggaran_proses.php" method="post">
                    <label for="">Nama Pelanggaran</label> <br>
                    <input type="text" name="nama-pelanggaran" value=""> <br> <br>
                    <label for="">Poin Pelanggaran</label> <br>
                    <input type="text" name="poin-pelanggaran" value=""> <br> <br>
                    <button class="btn" type="submit" name="button">TAMBAH</button>
                  </form>
              </div>
              <div class="col-md-9 tab-pane halaman" id="lihatpel" role="tabpanel">
                <h3>SISTEM INFORMASI PENANGANAN SISWA</h3>
                <h1>PELANGGARAN</h1>
                <hr>
                <h4>LIHAT PELANGGARAN</h4>
                <br>
                <table>
                  <thead>
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>POIN</th>
                    <th>AKSI</th>
                  </thead>
                  <tbody>
                    <?php $i=1;while ($result = $query_pelanggaran->fetch_object()) {
                      $id = $result->id_pelanggaran;
                      $jenis = $result->jenis;
                      $poin = $result->poin
                      ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td id="namapel"><?php echo $jenis; ?></td>
                      <td><?php echo $poin; ?></td>
                      <td>
                        <a href="edit_pelanggaran.php?id=<?php echo $id;?>">
                            <button class="btn btn-success" type="button" name="hapus" id="btndetail">
                              <i class="fa fa-pencil-square-o" aria-hidden="true" style="margin-right: 5px;"></i>EDIT</button>
                        </a>
                        <a data-toggle="modal" data-target="#hapuspelanggaran<?php echo $i?>">
                            <button class="btn btn-success" type="button" name="hapus" id="btnhapus">
                              <i class="fa fa-trash-o" aria-hidden="true" style="margin-right: 5px;"></i>HAPUS</button>
                        </a>
                        <style media="screen">
                            #halaman div #lihatpel table tbody tr td div .modal-md{
                                margin-top: 15%;
                              }
                            #halaman div #lihatpel table tbody tr td div .hapusdata{
                              margin-top: 4%;
                              font-weight: bold;
                              font-size: 18pt;
                            }
                            #halaman div #lihatpel table tbody tr td div .jenispelanggaran{
                              font-size: 12pt;
                            }
                            #halaman div #lihatpel table tbody tr td div .apakahyakin{
                              font-size: 16pt;
                              font-weight: bold;
                            }
                            #halaman div #lihatpel table tbody tr td div .btn{
                              margin-bottom: 5%;
                            }
                        </style>
                        <div class="modal fade hapuspelanggaran" role="dialog" id="hapuspelanggaran<?php echo $i?>">
                            <div class="modal-dialog modal-md modal-content">
                                <p class="hapusdata">Hapus Data Pelanggaran</p>
                                <p class="jenispelanggaran"><?php echo $result->jenis; ?></p>
                                <p class="apakahyakin">Apakah Anda Yakin?</p>
                                <a class="btn btn-success" href="functions/hapus_pelanggaran_proses.php?id=<?php echo $id;?>">YA</a>
                                <a class="btn btn-danger" data-dismiss="modal">TIDAK</a> <br> <br>
                            </div>
                        </div>
                      </td>
                    </tr>
                    <?php $i++;} ?>
                  </tbody>
                </table>
              </div>
              <!-- PELANGGARAN -->
              <!-- PENGELOLA -->
              <div class="col-md-9 tab-pane halaman " id="lihatadmin" role="tabpanel">
                <h3>SISTEM INFORMASI PENANGANAN SISWA</h3>
                <h1>PENGELOLA</h1>
                <hr>
                <h4>LIHAT ADMIN</h4>
                <br>
                <button class="btn" type="button" name="button" data-toggle="modal" data-target="#formtambahadmin" id="btntambahadmin">
                  <i class="glyphicon glyphicon-plus"></i>TAMBAH ADMIN
                </button>
                <div class="modal fade" role="dialog" id="formtambahadmin">
                    <div class="modal-dialog modal-md modal-content">
                          <button type="button" class="btn" name="button" data-dismiss="modal" id="xclosemodal">x</button>
                          <br><h4><center>SILAHKAN MASUKAN DATA ADMIN BARU</center></h4> <br>
                          <form class="form-group" action="functions/tambah_admin_proses.php" method="post">
                                <div class="">
                                    <label for="nama">NAMA</label>
                                    <input class="form-control" type="text" name="namaadminbaru" value="" placeholder="Nama Admin Baru" required="true">
                                </div> <br>
                                <div class="">
                                    <label for="nip">NIP</label>
                                    <input class="form-control" type="text" name="nipadminbaru" value="" placeholder="NIP Admin Baru" required="true">
                                </div> <br>
                                <div class="">
                                    <label for="pass">Password</label>
                                    <input class="form-control" type="password" name="passadminbaru" value="" placeholder="********" required="true">
                                </div> <br>
                                <div class="">
                                    <label for="email">E-MAIL</label>
                                    <input class="form-control" type="email" name="emailadminbaru" value="" placeholder="contohsaja@mail.com" required="true">
                                </div> <br>
                                <button class="btn btn-success" type="submit" name="button">TAMBAH ADMIN</button>
                          </form><br><br>
                    </div>
                </div>
                <table>
                  <thead>
                    <th>NO</th>
                    <th>NIP</th>
                    <th>NAMA</th>
                    <th>AKSI</th>
                  </thead>
                  <tbody>
                    <?php $e=1;while ($admin = $query_admin->fetch_object()) {?>
                    <tr>
                      <td><?php echo $e; ?></td>
                      <td id="NIP"><?php echo $admin->nip; ?></td>
                      <td id="namaadmin"><?php echo $admin->nama ?></td>
                      <td>
                        <a href="edit_admin.php?id=<?php echo $admin->id_admin ?>">
                          <button class="btn" type="button" name="hapus" id="btndetail">
                            <i class="fa fa-pencil-square-o" aria-hidden="true" style="margin-right: 5px;"></i>UBAH</button> <!-- dulunya detail -->
                        </a>
                        <a href="functions/hapus_admin_proses.php?id=<?php echo $admin->id_admin ?>">
                          <button class="btn" type="button" name="hapus" id="btnhapus" onclick="return confirm('Hapus <?php echo $admin->nama ?>?')">
                            <i class="fa fa-trash-o" aria-hidden="true" style="margin-right: 5px;"></i>HAPUS</button>
                        </a>
                      </td>
                    </tr>
                    <?php $e++;} ?>
                  </tbody>
                </table>
              </div>
              <div class="col-md-9 tab-pane halaman" id="lihatguru" role="tabpanel">
                    <h3>SISTEM INFORMASI PENANGANAN SISWA</h3>
                    <h1>PENGELOLA</h1>
                    <hr>
                    <h4>LIHAT GURU</h4>
                    <br>
                    <button class="btn btn-primary" type="button" name="button"  data-toggle="modal" data-target="#formtambahguru" id="btntambahguru">
                      <i class="glyphicon glyphicon-plus"></i>TAMBAH GURU
                    </button>
                    <div class="modal fade" role="dialog" id="formtambahguru">
                        <div class="modal-dialog modal-md modal-content">
                              <button type="button" class="btn" name="button" data-dismiss="modal" id="xclosemodal">x</button>
                              <br><h4><center>SILAHKAN MASUKAN DATA GURU BARU</center></h4> <br>
                              <form class="form-group" action="functions/tambah_guru_proses.php" method="post">
                                    <div class="">
                                        <label for="nama">NAMA</label>
                                        <input class="form-control" type="text" name="namagurubaru" value="" placeholder="Nama Guru Baru" required="true">
                                    </div> <br>
                                    <div class="">
                                        <label for="nip">NIP</label>
                                        <input class="form-control" type="text" name="nipgurubaru" value="" placeholder="NIP Guru Baru" required="true">
                                    </div> <br>
                                    <div class="">
                                        <label for="pass">Password</label>
                                        <input class="form-control" type="password" name="passgurubaru" value="" placeholder="********" required="true">
                                    </div> <br>
                                    <div class="">
                                        <label for="email">E-MAIL</label>
                                        <input class="form-control" type="email" name="emailgurubaru" value="" placeholder="contohsaja@mail.com" required="true">
                                    </div> <br>
                                    <button class="btn btn-success" type="submit" name="button">TAMBAH GURU</button>
                              </form><br><br>
                        </div>
                    </div>
                    <table>
                      <thead>
                        <th>NO</th>
                        <th>NIP</th>
                        <th>NAMA</th>
                        <th>AKSI</th>
                      </thead>
                      <tbody>
                        <?php $a=1;while($guru=$query_guru->fetch_object()){?>
                        <tr>
                          <td><?php echo $a; ?></td>
                          <td id="NIP"><?php echo $guru->nip; ?></td>
                          <td id="namaaguru"><?php echo $guru->nama; ?></td>
                          <td>
                            <a href="edit_guru.php?id=<?php echo $guru->id_guru;?>">
                              <button class="btn btn-success" type="button" name="hapus" id="btndetail">
                                <i class="fa fa-pencil-square-o" aria-hidden="true" style="margin-right: 5px;"></i>UBAH</button>
                            </a>
                            <a href="functions/hapus_guru_proses.php?id=<?php echo $guru->id_guru?>" onclick="return confirm('Hapus <?php echo $guru->nama?>?')">
                              <button class="btn btn-success" type="button" name="hapus" id="btnhapus">
                                <i class="fa fa-trash-o" aria-hidden="true" style="margin-right: 5px;"></i>HAPUS</button>
                            </a>
                          </td>
                        </tr>
                        <?php $a++;} ?>
                      </tbody>
                    </table>
              </div>
              <!-- PENGELOLA -->
              <!-- lIHAT SISWA -->
              <div class="col-md-9 tab-pane halaman active" id="lihatsiswa" role="tabpanel">
                    <h3>SISTEM INFORMASI PENANGANAN SISWA</h3>
                    <h1>SISWA</h1>
                    <hr>
                    <h4>LIHAT SISWA</h4>
                    <br>
                    <button class="btn btn-primary" type="button" name="button"  data-toggle="modal" data-target="#formtambahsiswa" id="btntambahsiswa">
                      <i class="glyphicon glyphicon-plus"></i>TAMBAH PELANGGARAN SISWA
                    </button>
                    <div class="modal fade" role="dialog" id="formtambahsiswa">
                        <div class="modal-dialog modal-lg modal-content">
                              <button type="button" class="btn" name="button" data-dismiss="modal" id="xclosemodal">x</button>
                              <br><h4><center>SILAHKAN MASUKAN PELANGGARAN SISWA</center></h4> <br>
                              <form class="form-group" action="functions/tambah_siswa_proses.php" method="post">
                                    <div class="">
                                        <label for="nama">NAMA</label>
                                        <input class="form-control" type="text" name="nama_siswa" value="" placeholder="Nama Siswa" required="true" id="nama_siswa" autocomplete="off">
                                        <div class="daftar_nama" id="daftar_nama"></div>
                                    </div> <br>
                                    <div class="">
                                        <label for="pelanggaran">Pelanggaran</label> <br>
                                        <div class="" id="opsipel">
                                          <div class="row" id="opsipelanggaranrow">
                                              <div class="col-md-6 col-xs-6" id="opsipelanggaran">
                                                <select class="form-control" style="margin-bottom: 3%;" name="inputpelanggaran[]" id="inputpel">
                                                  <?php while($opsi_pel = $query_opsi->fetch_object()){?>
                                                    <option value="<?php echo $opsi_pel->jenis; ?>"><?php echo $opsi_pel->jenis;?></option>
                                                    <?php } ?>
                                                </select>
                                              </div>
                                              <div class="col-md-3 col-xs-6" style="width:31%">
                                                  <input class="form-control" type="date" name="tglpelanggaran[]" value="">
                                              </div>
                                          </div>
                                        </div>
                                        <button class="btn btn-success" type="button" name="button" onClick="tambahOpsi()" id="btntambahopsipelanggaran">
                                          <i class="glyphicon glyphicon-plus" style="margin-right: 2%;"></i>TAMBAH PELANGGARAN</button>
                                    </div> <br>
                                    <br>
                                    <input type="hidden" name="idpemberi" value="<?php echo $_SESSION['login_admin']?> ">
                                    <input type="hidden" name="lvl" value="0">
                                    <input type="hidden" name="jenis" value="admin">
                                    <button class="btn btn-success" type="submit" name="button">TAMBAH PELANGGARAN SISWA</button>
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
                        $poinnya = $conn->query('SELECT siswa.id_siswa,siswa.nisn, siswa.nama,SUM(pelanggaran.poin) AS poin FROM pelanggaran_siswa INNER JOIN siswa ON siswa.id_siswa=pelanggaran_siswa.id_siswa INNER JOIN pelanggaran ON pelanggaran.id_pelanggaran=pelanggaran_siswa.id_pelanggaran GROUP BY siswa.nama ORDER BY poin DESC');
                        $i=1;while($result_poin = $poinnya->fetch_object()){
                        $idnya = $result_poin->id_siswa;
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
                            <a href="detail_siswa.php?id_siswa=<?php echo $idnya;?>">
                              <button class="btn btn-success" type="button" name="hapus" id="btndetail">
                                <i class="fa fa-info-circle" aria-hidden="true" style="margin-right: 5px;"></i>DETAIL</button>
                            </a>
                            <a data-toggle="modal" data-target="#hapussiswa<?php echo $i?>">
                                <button class="btn btn-success" type="button" name="hapus" id="btnhapus">
                                  <i class="fa fa-trash-o" aria-hidden="true" style="margin-right: 5px;"></i>HAPUS</button>
                            </a>
                            <style media="screen">
                                #halaman div #lihatsiswa table tbody tr td div .modal-md{
                                    margin-top: 15%;
                                  }
                                #halaman div #lihatsiswa table tbody tr td div .hapusdata{
                                  margin-top: 4%;
                                  font-weight: bold;
                                  font-size: 18pt;
                                }
                                #halaman div #lihatsiswa table tbody tr td div .jenissiswa{
                                  font-size: 12pt;
                                }
                                #halaman div #lihatsiswa table tbody tr td div .apakahyakin{
                                  font-size: 16pt;
                                  font-weight: bold;
                                }
                                #halaman div #lihatsiswa table tbody tr td div .btn{
                                  margin-bottom: 5%;
                                }
                            </style>
                            <div class="modal fade hapussiswa" role="dialog" id="hapussiswa<?php echo $i?>">
                                <div class="modal-dialog modal-md modal-content">
                                    <p class="hapusdata">Hapus Data Pelanggaran Siswa</p>
                                    <p class="jenissiswa"><?php echo $namanya; ?></p>
                                    <p class="apakahyakin">Apakah Anda Yakin?</p>
                                    <a class="btn btn-success" href="functions/hapus_siswa_proses.php?id=<?php echo $idnya;?>">YA</a>
                                    <a class="btn btn-danger" data-dismiss="modal">TIDAK</a> <br> <br>
                                </div>
                            </div>
                          </td>
                        </tr>
                        <?php $i++;}?>
                      </tbody>
                    </table>
              </div>
              <!-- lIHAT SISWA -->


        </div>
        <div class="col-md-2" id="adminright">
          <a href="#" data-toggle="dropdown" id="adminkanan"><img src="images/admin.png" alt="" id="adminpict">ADMIN</a>
          <ul class="dropdown-menu" role="menu" id="menuprofil">
              <li><a href="index.php">HOME</a></li>
              <li><a href="functions/keluar.php">KELUAR</a></li>
          </ul>
        </div>
</div>
<script>
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
<?php include 'footer.php'; ?>
