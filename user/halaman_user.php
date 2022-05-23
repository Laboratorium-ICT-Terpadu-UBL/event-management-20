<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="styleuser.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
	<title>User Page</title>
</head>
<body>
	<!-- Navbar -->
	<?php require "navbaruser.php" ?>

	<?php 
	session_start();

	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:index.php?pesan=gagal");
	}

	?>
	<h1 class="h1-u"><b>User Page</b></h1>

	<div class="uhero-user">
	<h2 class="hero-user">Hello <b><?php echo $_SESSION['username']; ?></b><br> you are logged in as <b><?php echo $_SESSION['level']; ?></b>.</h2>
		<div class="herou-illu">
		    <img class="illu1" src="../Svg/Chat.svg" width="680px" height="480px" alt="">
		    <img class="blob1" src="../Svg/Blob 1.svg" width="500px" height="500px" alt="">
		    <img class="blob2" src="../Svg/Blob 2.svg" width="600px" height="600px" alt="">
	    </div>
		<p class="hero-text">Yuk, Ikuti Beragam Acara Edukatif <br>Dari Seluruh Indonesia!</p>
		<center><a class="scroll1" href="#event">Event</a></center>
	</div>


	<div id="event">
	<center>
	<h2 class="upcom"><b>Upcoming Events<b></h2>
	</center>
	
	
		
	<?php
	include '..\koneksi.php';
	$select = mysqli_query($koneksi,"SELECT * FROM eventdt");
	while($hasil = mysqli_fetch_array($select)){
	?>	
			<div class="acara">
				<ul></ul>
				<center><li><a class="img-creator" href="detail.php?id=<?php echo $hasil['id_acara'];?>"><?php echo '<img class="img" src="data:image/jpeg;base64,' .base64_encode($hasil['img']).'"width="320px" height="160px">';?></li>
				<br>
				<center><li><a href="detail.php?id=<?php echo $hasil['id_acara'];?>"><?php echo $hasil ['nama_acara']?></a></li>
				<center><li><?php $kalimat = $hasil['desc_acara'];
								$cetak=substr($kalimat,0,20)."..";
								echo $cetak?></li></center>
				</ul>
			</div>
	<?php }
	?>
	</div>
	
</body>
</html>