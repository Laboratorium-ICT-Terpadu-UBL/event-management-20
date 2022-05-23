<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">

  <!-- Load file CSS Bootstrap offline -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="stylecrea.css">
	<title>Creator Page</title>
</head>
<body>
    <!-- Navbar -->
	<?php require "navbarcreator.php" ?>

	<?php 
	session_start();

	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:index.php?pesan=gagal");
	}

	?>
    <br>
	<h1 class="h1-c"><b>Creator Page</b></h1>

    <div class="chero-creator">
	    <h2 class="hero-creator"><span>Hello <b><?php echo $_SESSION['username']; ?></b><span><br>you are logged in as <b><?php echo $_SESSION['level']; ?></b>.</h2>
        <div class="heroc-illu">
		    <img class="illu1" src="../Svg/Coworking.svg" width="680px" height="480px" alt="">
		    <img class="blob1" src="../Svg/Blob 1.svg" width="500px" height="500px" alt="">
		    <img class="blob2" src="../Svg/Blob 2.svg" width="600px" height="600px" alt="">
	    </div>
        <p class="hero-text">Yuk, Kontribusi untuk Negeri Ini dan <br>Buat Acara Mu Sekarang!</p>
        <center><a class="scroll1" href="#create">Create Event</a></center>
    </div>

    <div id="create">
    
    <div class="container-event">
    <h2 class="ecf"><b>Event Creation Form</b></h2>

    <form action="simpan-event.php" method="post" enctype="multipart/form-data">

    <div class="form-group">
            <label>Event Name: </label>
            <input type="text" name="nama_acara" class="form-control" placeholder="Masukan Nama" required/>
        </div>

    <div class="form-group">
        <br/>
            <label>Event Date:</label>
            <input type="date" name="tgl_acara" class="form-control" placeholder="Release Date" required/>
        </div>

	<div class="form-group">
    <br/>
            <label>Description:</label>
            <textarea name="desc_acara" rows="5" class="form-control" placeholder="Enter Event Description" required></textarea>
        </div>

    <div class="form-group">
    <br/>
            <label>Event Held:</label>
            <input class="rd" type="radio" id="Online" name="almt_acara" value="Online" ><label for="online">Online</label>
			<input class="rd" type="radio" id="Offline" name="almt_acara"" value="Offline" ><label for="offline">Offline</label>
        </div>
        
	<div class="form-group">
    <br/>
            <label>Due Date:</label>
            <input type="date" name="tgl_batas"  class="form-control" required>
        </div>

  <div class="form-group">
  <br/>
            <label>Ticket Price:</label>
            <input type="text" name="hrg_tiket"  class="form-control" required>
        </div>

  <div class="form-group">
  <br/>
            <label>Total Participant:</label>
            <input type="text" name="jml_peserta" class="form-control" required>
        </div>

  <br/>
     <div class="form-group">
            <label>Category:</label>
            <input class="rd" type="radio" id="Teknologi" name="kategori" value="Teknologi" ><label for="teknologi">Technology</label>
			<input class="rd" type="radio" id="Kesehatan" name="kategori" value="Kesehatan" ><label for="kesehatan">Health</label>
            <input class="rd" type="radio" id="Pendidikan" name="kategori" value="Pendidikan" "><label for="pendidikan">Education</label>
        </div>

  <div class="form-group">
  <br/>
            <label>Start Time:</label>
            <input type="time" name="jam_mulai" class="form-control" required>
        </div>

  <div class="form-group">
  <br/>
            <label>End Time:</label>
            <input type="time" name="jam_akhir" class="form-control" required>
        </div>

  <div class="form-group">
  <br/>
            <label>Thumbnail:</label>
            <input type="file" name="img" class="form-control" required>
        </div>

        <center><button type="submit" name="submit" class="btn btn-primary">Create Event</button></center>

            </form>
        </div>
    </div>
    <div class="heroc2-illu">
		    <img class="illu2" src="../Svg/Startup.svg" width="680px" height="480px" alt="">
		    <img class="blob3" src="../Svg/Blob (2).svg" width="700px" height="700px" alt="">
		    <img class="blob4" src="../Svg/Blob (3).svg" width="900px" height="900px" alt="">
	</div>
</div>
</body>
</html>