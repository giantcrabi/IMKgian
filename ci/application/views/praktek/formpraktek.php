<!DOCTYPE html>
<html>
<head>
	<title>My Form</title>
</head>
<body>

<h1><?php echo $title; ?></h1>
<?php echo validation_errors(); ?>
<?php foreach ($error as $error_item){
	  echo "$error_item";
} ?>

<?php echo form_open_multipart('praktek/create'); ?>

	<h5>Nama Tempat</h5>
    <input type="text" name="namat" size="50" /><br />

    <h5>Foto Tempat</h5>
    <input type="file" name="foto" size="20" /><br />

    <h5>Alamat</h5>
    <input type="text" name="alamat" size="70" /><br />

    <h5>Kota</h5>
    <input type="text" name="kota" size="30" /><br />

    <h5>Provinsi</h5>
    <input type="text" name="provinsi" size="30" /><br />

    <h5>Kode Pos</h5>
    <input type="text" name="kodepos" size="10" /><br /><br />

    <input type="submit" name="submit" value=" Register " />

</form>

</body>
</html>
