<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="stylecrea.css">
	<title>Creator Page</title>
</head>
<body>

    <!-- Navbar -->
	<?php require "navbarcreator.php" ?>

	<?php 
	session_start();

	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:index.php?pesan=gagal");
	}

	?>
	<h1>Creator Page</h1>

	<p>Hello <b><?php echo $_SESSION['username']; ?></b> you are logged in as <b><?php echo $_SESSION['level']; ?></b>.</p>

	<center>
	<h2>My Event Data</h2>
	</center>

	<?php
	include '..\koneksi.php';
	$select = mysqli_query($koneksi,"SELECT * FROM eventdt where id_creator='".$_SESSION['id']."'");
	while($hasil = mysqli_fetch_array($select)){
	?>	
			<div class="acara">
				<ul>
				<center><li><a href="detail_event.php?id=<?php echo $hasil['id_acara'];?>"><?php echo '<img class="img" src="data:image/jpeg;base64,' .base64_encode($hasil['img']).'"width="320px" height="160px">';?></li></center>
				<br>
				<center><li><a href="detail_event.php?id=<?php echo $hasil['id_acara'];?>"><?php echo $hasil ['nama_acara']?></a></li></center>

				<center><li><?php $kalimat = $hasil['desc_acara'];
								$cetak=substr($kalimat,0,20)."..";
								echo $cetak?></li></center>
				</ul>
			</div>
	<?php }
	?>
</body>
</html>