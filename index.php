<!DOCTYPE html>
<html>
<head>
	<title>Login - Event Management Apps</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
 
</head>
<body>
	<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="gagal"){
			echo "<div class='alert'>Username and Password do not match!</div>";
		}
	}
	?>
 
	<div class="form-box">
		<h1><b>Login Here</b></h1>
		<form action="cek_login.php" method="post">
            <div class="input-box">
                <i class="far fa-user-circle"></i>
			    <input type="text" name="username" placeholder="Username">
            </div>

            <div class="input-box">
                <i class="fas fa-key"></i>
			    <input type="password" name="password" placeholder="Password">
            </div>
			<button type="submit" class="tombol_login"><b>LOGIN</b></button>
		</form>

		<center>
		<a class="tombol_login" target="_blank" href="form-pendaftaran.php"><b>REGISTER</b></a></center>
	</div>

	<div class="login-illu">
		<img class="illu1" src="Svg/Study online.svg" width="680px" height="480px" alt="">
		<p class="desc-log"><b>Kembangkan Minat dan Bakat<br>Dalam Satu Klik</b></p>
	</div>
    </body>
</html>