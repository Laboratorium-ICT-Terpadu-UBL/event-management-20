<!DOCTYPE html>
<html>
	<head>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"> 
	<!-- Load file CSS Bootstrap offline -->
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<body>
<!-- Navbar -->
<?php require "navbar.php" ?>
<?php
//Include file koneksi ke database
include 'koneksi.php';

//menerima nilai dari kiriman form pendaftaran
$nama=$_POST["nama"];
$username=$_POST["username"];
$email=$_POST["email"];
$password=($_POST["password"]); //untuk password digunakan enskripsi md5
$no_hp=$_POST["no_hp"];
$level=$_POST["level"];



//Query input menginput data kedalam tabel anggota
  $sql="insert into user (nama,username,email,password,no_hp,level) values
		('$nama','$username','$email','$password','$no_hp','$level')";

//Mengeksekusi/menjalankan query diatas	
  $hasil=mysqli_query($koneksi,$sql);

//Kondisi apakah berhasil atau tidak
  if ($hasil) {
	echo "Berhasil simpan data anggota";
	exit;
  }
else {
	echo "Gagal simpan data anggota";
	exit;
}  

?>


		</body>
	</head>
</html>
