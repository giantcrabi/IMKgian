<!DOCTYPE HTML>
<html>
<head>
	<title>IndoHealthSystem</title>
	<link rel="shortcut icon" href="logo.png">
	<link rel="stylesheet" type="text/css" href="style.css">
	
<body>
	<script>
	function myFunct(){
	alert("Update sukses");}
</script>

<?php echo validation_errors(); ?>
<?php foreach ($error as $error_item){
		  echo "$error_item";
} ?>

<?php echo form_open_multipart("crudpenyakit/do_update/$update[id_artikel]"); ?>	
<!--<input type="hidden" name="id" value="<?php //echo $id_artikel ?>">!-->
		<p>JNama Penyakit : </p>
		<input type="text" name="judul_artikel" value="<?php echo $update['judul_artikel']?>" cols="100"/><br/>
		<div class="main">
			<p>Foto</p>
			<img src="<?php echo base_url(); ?>uploads/penyakit/<?php echo $update['foto']; ?>" width="150" height="150" />
			<input type="file" name="foto" size="20" /><br />
		</div>
		<p>Deskripsi Penyakit : </p>
		<textarea type="text"  name="deskripsi_artikel" rows="20" cols="100"/><?php echo $update['deskripsi_artikel'] ?></textarea><br/>
		<input type="submit" name="submit" value="UPDATE" />
		<!--<input type="submit" name="submit" value="UPDATE" onclick="myFunct()" />!-->
</form>

<hr>
	<div id="footer">
		<p>Copyright &copy; 2015<p>
		<p>5113100045 | Devira Wiena Pramintya<p>
	</div>
</body>
</head>
</html>