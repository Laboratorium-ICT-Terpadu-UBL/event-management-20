<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
	<title>Detail Acara</title>
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
	<h1>Detail Acara</h1>

	<p>Hello <b><?php echo $_SESSION['username']; ?></b> you are logged in as <b><?php echo $_SESSION['level']; ?></b>.</p>

	<h2>Data Acara</h2>
	<table class="table table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Event Name</th>
      <th scope="col">Release Date</th>
      <th scope="col">Description</th>
	  <th scope="col">Event Held</th>
	  <th scope="col">Ticket Price</th>
	  <th scope="col">Total Participant</th>
	  <th scope="col">Category</th>
	  <th scope="col">Due Date</th>
	  <th scope="col">Start Time</th>
	  <th scope="col">End Time</th>
	  <th scope="col">Thumbnail</th>
	  
    </tr>
  </thead>

  <?php
	include '..\koneksi.php';
	$select = mysqli_query($koneksi,"SELECT * FROM eventdt where id_acara='".$_GET['id']."'"); 
	while($hasil = mysqli_fetch_array($select)){
	?>

  <tbody>
    <tr>
		<th scope="row">1</th>
      		<td><?php echo $hasil ['nama_acara'] ?></td>
			<td><?php echo $hasil ['tgl_acara'] ?></td>
			<td><?php echo $hasil ['desc_acara'] ?></td>
			<td><?php echo $hasil ['almt_acara'] ?></td>
			<td><?php echo $hasil ['hrg_tiket'] ?></td>
			<td><?php echo $hasil ['jml_peserta'] ?></td>
			<td><?php echo $hasil ['kategori'] ?></td>
			<td><?php echo $hasil ['tgl_batas'] ?></td>
			<td><?php echo $hasil ['jam_mulai'] ?></td>
			<td><?php echo $hasil ['jam_akhir'] ?></td>
			<td><?php echo '<img src="data:image/jpeg;base64,' .base64_encode($hasil['img']).'"width="100%" height="auto">';?></td>
    </tr>
  </tbody>
  <?php }
	?>

    <br/>
	<table class="table table">
		<thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">E-mail</th>
      <th scope="col">Phone Number</th>

	  
    </tr>
  </thead>
    <br/>
    
	<?php
	include '..\koneksi.php'; //koneksi

	//mengambil data dari eventdt yang sesuai dengan id acara yg kita klik. 
	//syntax ('".$_GET['id']."') digunakan untuk mendapatkan id acara, dari banner acara yg kita klik.
	$select = mysqli_query($koneksi,"SELECT * FROM bookingdt where id_acara='".$_GET['id']."'"); 
	$x=1;
	while($hasil = mysqli_fetch_array($select)){
	?>
	<tr style="text-align:center;font-weight:bold;">
			<td><?php echo $x?></td>
			<td><?php echo $hasil ['nama'] ?></td>
			<td><?php echo $hasil ['email'] ?></td>
			<td><?php echo $hasil ['telp'] ?></td>
	<?php $x++; }
	?>

</table>

<?php
$select = mysqli_query($koneksi,"SELECT * FROM eventdt where id_acara='".$_GET['id']."'");
while($hasil = mysqli_fetch_array($select)){
	?>

		<form class="d-flex"><pre></pre>
		<a class="btn btn-outline-success" href="cetak.php?id=<?php echo $hasil['id_acara'];?>">Print</a>
	<?php }
	?>

</body>
</html>