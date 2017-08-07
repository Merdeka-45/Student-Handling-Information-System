<?php
include "koneksi.php";
require('../fpdf/fpdf.php');

$nisnprint = $_GET['nisn'];
//Menampilkan data dari tabel di database

$result = $conn->query("SELECT pelanggaran_siswa.tgl_pelanggaran,pelanggaran_siswa.id_pel_sis,siswa.nisn, siswa.nama,pelanggaran.jenis,pelanggaran.poin,pelanggaran_siswa.level,pelanggaran_siswa.pemberi FROM pelanggaran_siswa INNER JOIN siswa ON siswa.id_siswa=pelanggaran_siswa.id_siswa INNER JOIN pelanggaran ON pelanggaran.id_pelanggaran=pelanggaran_siswa.id_pelanggaran WHERE siswa.nisn='$nisnprint'");
$poin = $conn->query("SELECT siswa.nama,SUM(pelanggaran.poin) AS poin FROM pelanggaran_siswa INNER JOIN siswa ON siswa.id_siswa=pelanggaran_siswa.id_siswa INNER JOIN pelanggaran ON pelanggaran.id_pelanggaran=pelanggaran_siswa.id_pelanggaran WHERE siswa.nisn='$nisnprint'");
while($result_poin = $poin->fetch_object()){
  $poin_ku = $result_poin->poin;
}

//Inisiasi untuk membuat header kolom
$column_no = "";
$column_nisn = "";
$column_nama = "";
$column_pelanggaran = "";
$column_poin = "";
$column_jmlpoin = "";
$column_tgl = "";
$column_oleh = "";

//For each row, add the field to the corresponding column
$i=1;while($row = $result->fetch_object())
{
    $nama = $row->nama;
    $nisn = $row->nisn;
    $pelanggaran = $row->jenis;
    $tgl_pelanggaran = $row->tgl_pelanggaran;
    $poin = $row->poin;
    $lvl = $row->level;
    $pemberi = $row->pemberi;
    $tglformat = date("d-M-y", strtotime($tgl_pelanggaran));
    if ($lvl == 0) {
      $pilihpemberi = $conn->query("SELECT nama FROM admin WHERE id_admin=$pemberi");
      $objekpemberi = $pilihpemberi->fetch_object();
      $oleh = $objekpemberi->nama;
    } elseif ($lvl == 1) {
      $pilihpemberi = $conn->query("SELECT nama FROM guru WHERE id_guru=$pemberi");
      $objekpemberi = $pilihpemberi->fetch_object();
      $oleh = $objekpemberi->nama;
    }

    $column_no = $column_no.$i."\n";
    $column_nisn = $column_nisn.$nisn."\n";
    $column_nama = $column_nama.$nama."\n";
    $column_pelanggaran = $column_pelanggaran.$pelanggaran."\n";
    $column_poin = $column_poin.$poin."\n";
    $column_tgl = $column_tgl.$tglformat."\n";
    $column_oleh = $column_oleh.$oleh."\n";
    $column_jmlpoin = $column_oleh.$poin_ku."\n";


//Create a new PDF file
$pdf = new FPDF('L','mm',array(210,297)); //L For Landscape / P For Portrait
$pdf->AddPage();

// Menambahkan Gambar
$pdf->Image('../images/logoprint1.png',50,10,-175);

$pdf->Ln(3);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(125);
$pdf->Cell(30,10,'SEKOLAH MENENGAH ATAS ISLAM TERPADU BINA AMAL',0,0,'C');
$pdf->Ln(6);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(74);
$pdf->Cell(30,10,'Jl. Raya Gunungpati, Ungaran KM 1,5, Kel. Plalangan, Gunungpati, Kota Semarang',0,0,'L');
$pdf->Ln(6);
$pdf->Cell(74);
$pdf->Cell(30,10,'Telp. (024) 6932198 - Email : smaitbinaamal@gmail.com',0,0,'L');
$pdf->Ln(15);
$pdf->SetFont('Arial','B',16);
$pdf->Cell(130);
$pdf->Cell(30,10,'DETAIL PELANGGARAN SISWA',0,0,'C');
$pdf->Ln();
$pdf->SetFont('Arial','B',11);
$pdf->Cell(52);
$pdf->Cell(30,10,"NISN  : $nisn",0,0,'L');
$pdf->Ln(6);
$pdf->Cell(52);
$pdf->Cell(30,10,"Nama : $nama",0,0,'L');
$pdf->Ln();


// Telp. (024) 6932198
// Email : smaitbinaamal@gmail.com

$i++;}
//Fields Name position
$Y_Fields_Name_position = 70;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(77,242,104);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(53);
$pdf->Cell(10,8,'No',1,0,'C',1);
$pdf->SetX(63);
$pdf->Cell(120,8,'Pelanggaran',1,0,'C',1);
$pdf->SetX(183);
$pdf->Cell(20,8,'Poin',1,0,'C',1);
$pdf->SetX(203);
$pdf->Cell(20,8,'Tanggal',1,0,'C',1);
$pdf->SetX(223);
$pdf->Cell(40,8,'Oleh',1,0,'C',1);
$pdf->Ln();

//Table position, under Fields Name
$Y_Table_Position = 78;

//Now show the columns
$pdf->SetFont('Arial','',10);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(53);
$pdf->MultiCell(10,6,$column_no,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(63);
$pdf->MultiCell(120,6,$column_pelanggaran,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(183);
$pdf->MultiCell(20,6,$column_poin,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(203);
$pdf->MultiCell(20,6,$column_tgl,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(223);
$pdf->MultiCell(40,6,$column_oleh,1,'C');

$pdf->Ln(4);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(52);
$pdf->Cell(30,10,"Total Poin : $poin_ku",0,0,'L');
$pdf->Ln(6);
$pdf->Cell(52);
if ($poin_ku >= 100 && $poin_ku <= 500) {
  $status = "BAHAYA";
} elseif ($poin_ku >= 1000 ) {
  $status = "SIAGA I";
} else {
  $status = "AMAN";
}
$pdf->Cell(30,10,"Status : $status",0,0,'L');

$pdf->Output();
?>
