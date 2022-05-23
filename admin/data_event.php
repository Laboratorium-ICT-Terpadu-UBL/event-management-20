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

	<p>Hello <b><?php echo $_SESSION['username']; ?></b> you are logged in as <b><?php echo $_SESSION['level']; ?></b>.</p>

	<h2>Event Data</h2>
<table border="1" cellspacing="0" width=100%>
		
		<?php
		include '..\koneksi.php';
		$select = mysqli_query($koneksi,"SELECT * FROM eventdt");
		while($hasil = mysqli_fetch_array($select)){
		?>	
		<tr style="text-align:center;font-weight:bold;">
				<td><a href="detail_event.php?id=<?php echo $hasil['id_acara'];?>"><?php echo '<img src="data:image/jpeg;base64,' .base64_encode($hasil['img']).'"width="50%" height="auto">';?>
					<br/>
					<a href="detail_event.php?id=<?php echo $hasil['id_acara'];?>"><?php echo $hasil ['nama_acara']?></a>
					<br/>
					<?php echo $hasil ['desc_acara'] ?>
					<br/>
					<br/>
					<br/>
					<hr/>
				</td>
		<?php }
		?>
	</table>

</body>
</html>