<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="styleuser.css">
	<title>Detail Acara</title>
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
	<div class="dhero-user">
	<h1 class="herod-user"><b>Event's Detail</b></h1>
	<h2 class="herod-text">Hello <b><?php echo $_SESSION['username']; ?></b><br> you are logged in as <b><?php echo $_SESSION['level']; ?></b>.</h2>

	<h2 class="h2-2"><b>Event's Data</b></h2>
	<h2 class="bar"></h2>
	<h2 class="bar2"></h2>


	<?php
	include '..\koneksi.php';
	$select = mysqli_query($koneksi,"SELECT * FROM eventdt where id_acara='".$_GET['id']."'"); 
	while($hasil = mysqli_fetch_array($select)){
	?>

			<?php echo '<img class="imgd" src="data:image/jpeg;base64,' .base64_encode($hasil['img']).'">';?>
      		<div class="nama"><b><?php echo $hasil ['nama_acara'] ?></b></div>
			<div class="tgl"><h3>Event Date:</h3><?php echo $hasil ['tgl_acara'] ?></div>
			<div class="desc"><h3>Description:</h3><?php echo $hasil ['desc_acara'] ?></div>
			<div class="almt"><h3>Event Held:</h3><?php echo $hasil ['almt_acara'] ?></div>
			<div class="hrg"><?php echo $hasil ['hrg_tiket'] ?></div>
			<div class="kat"><?php echo $hasil ['kategori'] ?></div>
			<div class="tglb"><h3>Due Date:</h3><?php echo $hasil ['tgl_batas'] ?></div>
			<div class="jamm"><h3>Start Time:</h3><?php echo $hasil ['jam_mulai'] ?></div>
			<a class="booking" href="booking.php?id=<?php echo $hasil['id_acara'];?>">Booking</a>
    
  	<?php }
	?>
	</div>
  
</body>
</html>