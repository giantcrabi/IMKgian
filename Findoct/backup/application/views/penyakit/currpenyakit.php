<!DOCTYPE HTML>
<html>
<head>
	<title>IndoHealthSystem</title>
	<link rel="shortcut icon" href="logo.png">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
	
<body>
	<script>
		function myFunction(){
		alert("Delete sukses");
	}
	</script>

			<h2><?php echo $d['judul_artikel']; ?></h2>
			<div class="main">
                <img src="<?php echo base_url(); ?>uploads/penyakit/<?php echo $d['foto']; ?>" width="150" height="150" />
       	 	</div>
			<p style="text-align:justify; font-family:Maiandra GD; font-size:15px"><?php echo $d['deskripsi_artikel']; ?></p>

			<a href="<?php echo base_url()."index.php/crudpenyakit/do_delete/".$d['id_artikel']; ?>"><input type="button" class="submit" value="Delete" onclick="myFunction()" /></a>
			<a href="<?php echo base_url()."index.php/crudpenyakit/do_update/".$d['id_artikel']; ?>"><input type="button" class="submit" value="Update"/></a>

			<h3>Dokter Ahli</h3>

			<table border="1">
				<tr>
					<th>Nama Dokter</th>
					<th>Gelar</th>
					<th>Bidang</th>
				</tr>
<?php if(count($penyakit_doctor) > 0) {
		for($i = 0; $i < count($penyakit_doctor); $i++) { ?>
			<tr>
		    	<td><a href="<?php echo base_url(); ?>index.php/doctors/<?php echo $nama_dokter[$i]['Username'] ?>"><?php echo $nama_dokter[$i]['Nama'] ?></a></td>
		    	<td><?php echo $nama_dokter[$i]['Gelar'] ?></td>
		    	<td><?php echo $nama_dokter[$i]['Bidang'] ?></td>
		    </tr>
<?php }
	} ?>
</table>
			

<div id="footer">
		<hr>
		<p>Copyright &copy; 2015<p>
		<p>5113100045 | Devira Wiena Pramintya<p>
</div>

</body>
</html>