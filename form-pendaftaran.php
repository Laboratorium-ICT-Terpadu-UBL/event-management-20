<!DOCTYPE html>
<html>
<head>
<title>Register - Event Management Apps</title>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"> 
    <!-- Load file CSS Bootstrap offline -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<!-- Navbar -->
<?php require "navbar.php" ?>

<div class="container-regis">

<h2 class="daft-text"><b>Member Registration Form</b></h2>

    <form action="simpan-pendaftaran.php" method="post">

    <div class="form-group">
            <label><b>Name: </b></label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required/>
        </div>

    <div class="form-group">
            <label><b>Username: </b></label>
            <input type="text" name="username" class="form-control" placeholder="Masukan Username" required/>
        </div>

	<div class="form-group">
            <label><b>E-mail: </b></label>
            <input type="email" name="email" class="form-control" placeholder="Masukan Email" required/>
        </div>

    <div class="form-group">
            <label><b>Password: </b></label>
            <input type="password" name="password" class="form-control" placeholder="Masukan Password" required />
        </div>
        
	<div class="form-group">
            <label><b>Phone Number: </b></label>
            <input type="number" name="no_hp" class="form-control" placeholder="Masukan No HP" required/>
        </div>

    <div class="form-group">
        <label><b>Access Level: </b></label>
            <select name="level">
                <option value="user">User</option>
                <option value="creator">Creator</option> 
            </select>
        </div>

        <button type="submit" name="submit" class="btn-regis"><b>Register</b></button>

    </form>
</div>
    <div class="regis-illu">
		<img class="illu1" src="Svg/Hirerring.svg" width="680px" height="480px" alt="">
		<p class="reg-log"><b>Mari Bergabung Dengan Ratusan Teman<br>Dengan Minat Yang Sama</b></p>
	</div>
</body>
</html>