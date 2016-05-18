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

<?php echo form_open_multipart("praktek/update_praktek/$praktek_item[IDTPraktek]"); ?>

    <div class="main">
        <h5>Foto Tempat</h5>
        <img src="<?php echo base_url(); ?>uploads/tempatpraktek/<?php echo $praktek_item['Foto']; ?>" width="150" height="150" />
        <input type="file" name="foto" size="20" /><br />
    </div>

    <h5>Nama Tempat</h5>
    <input type="text" name="namat" size="50" value="<?php echo $praktek_item['NamaT'] ?>"/><br />

    <h5>Alamat</h5>
    <input type="text" name="alamat" size="50" value="<?php echo $praktek_item['Alamat'] ?>"/><br />

    <h5>Kota</h5>
    <input type="text" name="kota" size="30" value="<?php echo $praktek_item['Kota'] ?>"/><br />

    <h5>Provinsi</h5>
    <input type="text" name="provinsi" size="30" value="<?php echo $praktek_item['Provinsi'] ?>"/><br />

    <h5>Kode Pos</h5>
    <input type="text" name="kodepos" size="30" value="<?php echo $praktek_item['KodePos'] ?>"/><br /><br />

    <input type="submit" name="submit" value=" Save Changes " />

</form>

</body>
</html>