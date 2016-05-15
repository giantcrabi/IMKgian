<!DOCTYPE HTML>
<html>
<head>
	<title>IndoHealthSystem</title>
	<link rel="shortcut icon" href="logo.png">
	<link rel="stylesheet" type="text/css" href="style.css">
	
<body>
	<!-- <h2>Welcome back <?php //echo $namauser['firstname']; ?> <br> <?php //echo $namauser['lastname']; ?> <h2> !-->
	<!--<?php
	/*	include "koneksi.php"
		session_start();

		if(isset($_SESSION['username'])){
			$username = ucfirst($_SESSION['username']);

			if (isset($_POST['submit'])){
				$judul = $_POST['title'];
				$deskripsi = $_POST['deskripsi'];
				//$nama_penulis = $_POST ['nama_penulis'];
				//$username_penulis = $_POST ['username_penulis'];

				$sql = "INSERT INTO artikel (judul_artikel, deskripsi_artikel) VALUES ('$judul', '$deskripsi')";
				$result = $conn->query($sql);
				echo "Artikel berhasil ditambahkan :)";
			}
			
			}
			else{
				header('Location: login.php');
				die();

		} */
	?>!-->
	<!--<h1>Welcome, <?php //echo $username; ?></h1>!-->

	<?php echo validation_errors(); ?>
	<?php foreach ($error as $error_item){
		  echo "$error_item";
	} ?>

	<?php echo form_open_multipart('crudpenyakit/do_insert'); ?>
		<!--<p>Ussername : </p>
		<input type="text" name="username_penulis" cols="100"/><br/>
		<p>Nama Penulis : </p>
		<input type="text" name="nama_penulis" cols="100"/><br/>!-->
		<p>Nama Penyakit : </p>
		<input type="text" name="judul_artikel" cols="100"/><br />
		<p>Foto</p>
		<input type="file" name="foto" size="20" /><br />
		<p>Deskripsi Penyakit : </p>
		<textarea name="deskripsi_artikel" rows="20" cols="100"></textarea><br />
		<input type="submit" name="submit" value="Post Penyakit" />
		<br>
	</form>

	<hr>
	<div id="footer">
		<p>Copyright &copy; 2015<p>
		<p>5113100045 | Devira Wiena Pramintya<p>
	</div>
</body>
</head>
</html>