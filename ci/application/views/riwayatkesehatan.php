<!DOCTYPE HTML>
<html>
	<head>
	</head>
	<body>
		<!--<?php echo validation_errors(); ?>
		<?php echo form_open('form'); ?>-->
		<form action="<?php echo base_url(); ?>index.php/crudpenyakit/cek_login" method="post">
		Username: <input type="text" name="username" value="" size="50" /><br>
		Password: <input type="password" name="password" value=""  /><br>
		<!--Nama Penyakit: <input type="text" name="nama_penyakit" value="" size="50" /><br>
		Tanggal Sakit: <input type="date" name="tgl_sakit" value="" size="50" /><br>
		Tanggal Sembuh: <input type="date" name="tgl_sembuh" value="" size="50" /><br>
		Keterangan: <textarea name="keterangan" /></textarea><br>-->
		<button type="submit">Submit</button>
	</form>
	</body>
</html>