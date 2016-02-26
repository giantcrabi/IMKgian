<?php
	include "koneksi.php";
	$update = $_GET['id'];
	$sql = "SELECT * FROM artikel WHERE id_artikel='$update'";
	$result= mysqli_query($conn, $sql);

	while ($row = $result->fetch_assoc()){
			$id = $row['id_artikel'];
			$judul = $row['judul_artikel'];
			$deskripsi = $row['deskripsi_artikel'];
	}

?>

<?php 
include "koneksi.php";
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>IndoHealthSystem</title>
	<link rel="shortcut icon" href="logo.png">
	<link rel="stylesheet" type="text/css" href="style.css">
	
<body>
	<div id="header">
		<ul>
			 <li class="logo"><a href="index.php"><img src="logo1.png" ></a></li>
			<!-- <li class="logo"><a href="index.php"><img title="HOME" src="https://cdn3.iconfinder.com/data/icons/buildings-places/512/Home-512.png" width="55" height="55" alt="HOME"></a></li>
            <li class="logo"><a href="artikel.php"><img title="ARTIKEL" src="https://cdn0.iconfinder.com/data/icons/huge-black-icons/512/Notes.png" width="55" height="55" alt="ARTIKEL"></a></li>
            <a href="list_upload.php"><img title="FILE" src="https://cdn3.iconfinder.com/data/icons/metro-generic/512/open_file-512.png" width="55" height="55" alt="FILE"></a></li> -->
            <li><a href="artikel.php" style="font-family: Buxton Sketch; font-size:30px">ARTIKEL</a><li>  
            <li><a href="list_upload.php" style="font-family: Buxton Sketch; font-size:30px">FILE</a><li>  
            <li><a href="login.php" style="font-family: Buxton Sketch; font-size:30px">LOGIN</a><li>
            <li><a href="logout.php" style="font-family: Buxton Sketch; font-size:30px">LOGOUT</a><li>
            	<li class="logo"><a href="index.php"><img title="HOME" src="https://cdn3.iconfinder.com/data/icons/buildings-places/512/Home-512.png" width="55" height="55" alt="HOME"></a></li>
		</ul>
	</div>

	<script>
	function myFunct(){
	alert("Update sukses");
}
</script>

<form method="GET" action="update1.php">
		<input type="hidden" name="id" value="<?php echo $id?>">
		<p>Judul Artikel : </p>
		<input type="text" name="title" value="<?php echo $judul?>" cols="100"/><br/>
		<p>Deskripsi Artikel : </p>
		<textarea type="text"  name="deskripsi" rows="20" cols="100"/><?php echo $deskripsi ?></textarea><br/>
		<input type="submit" name="submit" value="UPDATE" onclick="myFunct()" />
</form>

<hr>
	<div id="footer">
		<p>Copyright &copy; 2015<p>
		<p>5113100045 | Devira Wiena Pramintya<p>
		<ul>
				<li><a href="https://www.facebook.com/devirawiena"><img title="Devira Wiena Pramintya" src="https://fbcdn-profile-a.akamaihd.net/hprofile-ak-xfp1/v/t1.0-1/p160x160/1377580_10152203108461729_809245696_n.png?oh=b2a948e839b50b5c02f62af1b9ee278f&oe=559C5F7D&__gda__=1440484360_11a746ddd6fc8758f87c8c407a25a100" alt="Devira Wiena Pramintya"></a></li>
				<li><a href="https://twitter.com/devirawiena"><img title="Devira Wiena Pramintya" src="https://www.disabledperson.com/assets/twitter-c672cb9df8e989adcf9bf40245afad20.png" alt="Devira Wiena Pramintya"></a></li>
				<li><a href="https://instagram.com/devirawiena"><img title="Devira Wiena Pramintya" src="http://www.ithb.ac.id/userfiles/image/instagram-logo-icon.png" alt="Devira Wiena Pramintya"><a></li>
				<li><a href="https://path.com/devirawiena"><img title="Devira Wiena Pramintya" src="path.png" alt="Devira Wiena Pramintya"><a></li>
		</ul>
		</div>
</body>
</head>
</html>