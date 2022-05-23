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

    <h2>User Data</h2>
	<table class="table table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Username</th>
      <th scope="col">E-mail</th>
	  <th scope="col">Password</th>
	  <th scope="col">Phone Number</th>
	  <th scope="col">Level</th>
	  <th scope="col">Action</th>
	  
    </tr>
  </thead>

  <?php
	include '..\koneksi.php';
	$select = mysqli_query($koneksi,"SELECT * FROM user "); 
	$x=1;
	while($hasil = mysqli_fetch_array($select)){
	?>

  <tbody>
    <tr>
		<th scope="row"><?php echo $x ?></th>
			<td><?php echo $hasil ['nama'] ?></td>
			<td><?php echo $hasil ['username'] ?></td>
			<td><?php echo $hasil ['email'] ?></td>
			<td><?php echo $hasil ['password'] ?></td>
			<td><?php echo $hasil ['no_hp'] ?></td>
			<td><?php echo $hasil ['level'] ?></td>
            <td><a href="edit_user.php?id=<?php echo $hasil['id'];?>">Edit || </a><a href="hapus_user.php?id=<?php echo $hasil['id'];?>">Delete</a></td>

			
    </tr>
  </tbody>
  <?php $x++; }
	?>
</table>

</body>
</html>


