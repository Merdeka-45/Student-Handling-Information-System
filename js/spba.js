$(document).ready(function() {
  $(document).on('click', '#btnhapuspel', function(){
    $(this).parents('#opsitambahan').remove();
  });
  $(document).on('click', '#btntambahopsipelanggaran', function(){
    var opsi = $('#inputpel').html();
    $('#opsipel').append("<div id='opsitambahan' class='row'><div class='col-md-6 col-xs-6'><select class='form-control' name='inputpelanggaran[]' id='inputpel'>"+opsi+"</select></div> <div class='col-md-3' style='width:31%;'><input class='form-control' type='date' name='tglpelanggaran[]'></div> <div class='col-md-2'><button class='btn btn-danger btnhapuspel' type='button' style='margin-bottom: 3%;' name='button' id='btnhapuspel'>HAPUS</button></div><br></div>");
  });

});

function openNav() {
    document.getElementById("sidebar").style.width = "300px";
    document.getElementById("isihalaman").style.marginLeft = "300px";
    document.getElementById("isihalaman").style.marginTop = "-5.5%";
    document.getElementById("lihatpel").style.marginLeft = "300px";
    document.getElementById("lihatpel").style.marginTop = "-5.5%";
    document.getElementById("lihatadmin").style.marginLeft = "300px";
    document.getElementById("lihatadmin").style.marginTop = "-5.5%";
    document.getElementById("lihatguru").style.marginLeft = "300px";
    document.getElementById("lihatguru").style.marginTop = "-5.5%";
    document.getElementById("lihatsiswa").style.marginLeft = "300px";
    document.getElementById("lihatsiswa").style.marginTop = "-5.5%";

}
/* Set the width of the side navigation to 0 and the left margin of the page content to 0 */
function closeNav() {
    document.getElementById("sidebar").style.width = "0";
    document.getElementById("isihalaman").style.marginLeft = "0";
    document.getElementById("isihalaman").style.marginTop = "0";
    document.getElementById("lihatpel").style.marginLeft = "0";
    document.getElementById("lihatpel").style.marginTop = "0";
    document.getElementById("lihatadmin").style.marginLeft = "0";
    document.getElementById("lihatadmin").style.marginTop = "0";
    document.getElementById("lihatguru").style.marginLeft = "0";
    document.getElementById("lihatguru").style.marginTop = "0";
    document.getElementById("lihatsiswa").style.marginLeft = "0";
    document.getElementById("lihatsiswa").style.marginTop = "0";
}
/*collapse menu - accordion*/
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].onclick = function(){
        this.classList.toggle("active");
        this.nextElementSibling.classList.toggle("show");
    }
}
// function tambahOpsi() {
//   var opsi = $('#inputpel').html();
//
//   $('#opsipelanggaran').append("<div class='opsipelanggaran1' id='cobaan'><select class='form-control' name='inputpelanggaran[]' id='inputpel'>"+opsi+"</select> <button class='btn btn-danger btnhapuspel' type='button' style='margin-bottom: 3%;' name='button' id='btnhapuspel1'>HAPUS</button> </div> <br>");
// }

/*pencarian otomatis*/
