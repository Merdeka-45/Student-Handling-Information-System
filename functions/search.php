<?php
include 'koneksi.php';
if(isset($_POST["query"])){
  $output = '';
  $query = "SELECT * FROM siswa WHERE nama LIKE '%".$_POST["query"]."%'";
  $result = $conn->query($query);
  $output = '<ul class="list-unstyled" id="pilihannama">';
  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_array($result)){
      $output .= '<li>'.$row["nama"].'</li>';
    }
  } else {
    $output .= '<li>Nama Siswa Tidak Ditemukan</li>';
  }
  $output .= '</ul>';
  echo $output;

}


 ?>
