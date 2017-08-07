<?php include 'header.php'; ?>
<div class="form_login">
    <div class="row">
      <div class="col-md-5">
      </div>
      <div class="col-md-3" id="formlogin" style="border-radius:5px;">

            <img src="images/logoBA.png" alt="" id="pictlogin">
            <form class="form-group" action="functions/masuk.php" action="post">
                <select class="form-control" name="pilihanid">
                    <option name="jenis" value="admin">Admin</option>
                    <option name="jenis" value="guru">Guru</option>
                    <option name="jenis" value="siswa">Siswa/Orang Tua</option>
                </select> <br>
                  <input class="form-control" type="text" name="idlogin" value="" placeholder="ID anda"> <br>
                  <input class="form-control" type="password" name="password" value="" placeholder="Password anda"> <br>
                <button class="btn btn-success" type="submit" id="tombolmasuk">Masuk</button>
            </form>
      </div>

    </div>
</div>
<?php include 'footer.php'; ?>
