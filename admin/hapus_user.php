<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <!-- Load file CSS Bootstrap offline -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
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

    <?php
    include '../koneksi.php';

        //Query input menginput data kedalam tabel anggota
        $sql="delete from user where id='".$_GET['id']."'";

        //Mengeksekusi/menjalankan query diatas	
        $hasil=mysqli_query($koneksi,$sql);

        //Kondisi apakah berhasil atau tidak
        if ($hasil) {
	        echo "Data Successfully Deleted";
	        exit;
        }
        else {
	        echo "Data Failed to Delete";
	        exit;
        }  
    
?>
</div>
</body>
</html>