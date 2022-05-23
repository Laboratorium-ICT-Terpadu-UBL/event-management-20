<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
	<title>Admin Page</title>
</head>
<body>
	<!-- Navbar -->
	<?php require "navbaradmin.php" ?>

	<?php 
	session_start();

	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:index.php?pesan=gagal");
	}

	?>
	<h1>Admin Page</h1>

	<p>Hello <b><?php echo $_SESSION['username']; ?></b> you are logged in as <b><?php echo $_SESSION['level']; ?>.</p>

	<pre>
	<form class="d-flex">
        <a class="btn btn-outline-success" href="data_user.php">User Data</a>
	</pre>

	<form class="d-flex">
        <a class="btn btn-outline-success" href="data_event.php">Event Data</a>
		

</body>
</html>