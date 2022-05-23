<!DOCTYPE html>
<html>
<head>
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
	<h1>User Page</h1>

	<p>Hello <b><?php echo $_SESSION['username']; ?></b> you are logged in as <b><?php echo $_SESSION['level']; ?></b>.</p>
     
    <h2>Personal Data</h2>

    <?php
	include '..\koneksi.php'; //koneksi
	$select = mysqli_query($koneksi,"SELECT * FROM user where id ='".$_SESSION['id']."'"); //menampilkan data user
	while($hasil = mysqli_fetch_array($select)){
	?>	
	<p> Name	: <?php echo $hasil['nama'];?><br>
        Username	: <?php echo $hasil['username'];?><br>
		Email	: <?php echo $hasil['email'];?><br>
		Phone Number	: <?php echo $hasil['no_hp'];?><br>

    </p>
	<a class="btn btn-outline-success" href="user_ticket.php">View Ticket</a>
	<?php }
	?>
    

</body>
</html>