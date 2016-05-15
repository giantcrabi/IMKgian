<!DOCTYPE HTML>
<html>
<head>
	<title>IndoHealthSystem</title>
	<link rel="shortcut icon" href="logo.png">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
	
<body>
	<?php foreach($penyakit as $d){ ?>

			<p style="font-family:Courier New;font-size:28px"><b><?php echo $d['judul_artikel']; ?><b></p>
			<div class="main">
                <img src="<?php echo base_url(); ?>uploads/penyakit/<?php echo $d['foto']; ?>" width="150" height="150" />
       	 	</div>
       	 	<p><a href="<?php echo "$d[id_artikel]"?>">Lihat Selengkapnya</a></p>			

	<?php } ?>

<p style="text-align: right"><a href="<?php echo base_url()."index.php/crudpenyakit/do_insert"; ?>">Tambah Penyakit</a></p>

<div id="footer">
		<hr>
		<p>Copyright &copy; 2015<p>
		<p>5113100045 | Devira Wiena Pramintya<p>
</div>
</body>
</html>