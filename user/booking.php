<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="styleuser.css">
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
	<div class="dhero-user">

	<h2 class="herod-user"><b>Event's Data</b></h2>
	<h2 class="bar3"></h2>

  <?php
	include '..\koneksi.php';
	$select = mysqli_query($koneksi,"SELECT * FROM eventdt where id_acara='".$_GET['id']."'"); 
	while($hasil = mysqli_fetch_array($select)){
	?>	

<?php echo '<img class="imgb" src="data:image/jpeg;base64,' .base64_encode($hasil['img']).'">';?>
<div class="namab"><b><?php echo $hasil ['nama_acara'] ?></b></div>
<div class="tglB"><h3>Event Date:</h3><?php echo $hasil ['tgl_acara'] ?></div>
<div class="descb"><h3>Description:</h3><?php echo $hasil ['desc_acara'] ?></div>
<div class="hrgb"><h3>Price:</h3><?php echo $hasil ['hrg_tiket'] ?><div>
    
  
  <?php }
	?>
<div class="section-form">	
	<h2 class="textbkng"><b>Input Personal Data</b></h2>
	<form action="" method="POST" class="section-froml2">
	<div class="form-group1">
            <label><b>Name: </b></label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required/>
        </div>

    <div class="form-group2">
            <label><b>E-Mail: </b></label>
            <input type="email" name="email" class="form-control" placeholder="Masukan E-Mail" required/>
        </div>

	<div class="form-group3">
            <label><b>Phone Number: </b></label>
            <input type="text" name="telp" class="form-control" placeholder="Masukan No. Telepon" required/>
        </div>
	
		<button type="submit" name="booking" value="Booking" class="btnb" require><b>Booking</b></button>
	</form>
</div>
	<?php

		if(isset($_POST['booking'])){

		$insert = mysqli_query($koneksi,"insert into bookingdt (id_user,id_acara,nama_acara,tgl_acara,desc_acara,nama,email,telp,img) 
		values ((select id from user where id='".$_SESSION['id']."'),(select id_acara from eventdt where id_acara='".$_GET['id']."'), 
		(select nama_acara from eventdt where id_acara='".$_GET['id']."'),(select tgl_acara from eventdt where id_acara='".$_GET['id']."'),
		(select desc_acara from eventdt where id_acara='".$_GET['id']."'),'".$_POST['nama']."','".$_POST['email']."','".$_POST['telp']."',
		(select img from eventdt where id_acara='".$_GET['id']."'))");
		
			if($insert){
				echo "Event Successfully Booked";
			}else {
				echo "Event Failed to Order";
			}
		}
	?>
</div>
</body>
</html>