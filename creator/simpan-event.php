<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
	<title></title>
</head>
<body>

    <!-- Navbar -->
	<?php require "navbarcreator.php" ?>

</body>
</html>

<?php
//Include file koneksi ke database
include '../koneksi.php';
session_start();

//menerima nilai dari kiriman form pendaftaran
$nama_acara=$_POST["nama_acara"];
$tgl_acara=$_POST["tgl_acara"];
$desc_acara=$_POST["desc_acara"];
$almt_acara=$_POST["almt_acara"];
$tgl_batas=$_POST["tgl_batas"];
$hrg_tiket=$_POST["hrg_tiket"];
$jml_peserta=$_POST["jml_peserta"];
$kategori=$_POST["kategori"];
$jam_mulai=$_POST["jam_mulai"];
$jam_akhir=$_POST["jam_akhir"];
$img= addslashes(file_get_contents($_FILES['img']['tmp_name']));

//Query input menginput data kedalam tabel anggota
  $sql="insert into eventdt (id_creator,nama_acara,tgl_acara,desc_acara,almt_acara,tgl_batas,hrg_tiket,jml_peserta,kategori,jam_mulai,jam_akhir,img) values
		('".$_SESSION['id']."','$nama_acara','$tgl_acara','$desc_acara','$almt_acara','$tgl_batas','$hrg_tiket','$jml_peserta','$kategori','$jam_mulai','$jam_akhir','$img')";

//Mengeksekusi/menjalankan query diatas	
  $hasil=mysqli_query($koneksi,$sql);

//Kondisi apakah berhasil atau tidak
  if ($hasil) {
	echo "Berhasil Membuat Event";
	echo " ";
	exit;
  }
else {
	echo "Gagal Membuat Event";
	exit;
}  

?>