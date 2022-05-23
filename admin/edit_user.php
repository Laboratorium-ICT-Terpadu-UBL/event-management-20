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

<div class="container">
<h2>Edit Member Data</h2>
    
    <form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
            <label>Name:</label>
            <input type="text" name="nama" class="form-control" placeholder="Enter Name" />
        </div>

    <div class="form-group">
            <label>Username: </label>
            <input type="text" name="username" class="form-control" placeholder="Enter Username" />
        </div>
    
    <div class="form-group">
            <label>E-Mail: </label>
            <input type="text" name="email" class="form-control" placeholder="Enter Email" />
        </div>

    <div class="form-group">
            <label>Password: </label>
            <input type="password" name="password" class="form-control" placeholder="Enter Password" />
        </div>

    <div class="form-group">
            <label>Phone Number: </label>
            <input type="text" name="no_hp" class="form-control" placeholder="Enter Phone Number" />
        </div>

</br>
        <button type="submit" name="edit" class="btn btn-primary">Update</button>
    </form>

    <?php
    include '../koneksi.php';
    if(isset($_POST['edit'])){
    //menerima nilai dari kiriman form pendaftaran
        $nama=$_POST["nama"];
        $username=$_POST["username"];
        $email=$_POST["email"];
        $password=($_POST["password"]); //untuk password digunakan enskripsi md5
        $telp=$_POST["no_hp"];
        $id = $_GET['id'];

        //Query input menginput data kedalam tabel anggota
        $sql="update user set nama='$nama',username='$username',email='$email',password='$password',no_hp='$telp',level='$level' where id='$id'";

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
    }
?>
</div>
</body>
</html>