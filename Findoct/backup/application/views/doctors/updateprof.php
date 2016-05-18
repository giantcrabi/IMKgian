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

<?php echo form_open_multipart("doctors/update_profile/$doctors_item[Username]"); ?>

    <div class="main">
        <h5>Profile Picture</h5>
        <img src="<?php echo base_url(); ?>uploads/doctors/<?php echo $doctors_item['Foto']; ?>" width="150" height="150" />
        <input type="file" name="foto" size="20" /><br />
    </div>

    <h5>Nama</h5>
    <input type="text" name="nama" size="50" value="<?php echo $doctors_item['Nama'] ?>"/><br />

    <h5>Email</h5>
    <input type="text" name="email" size="50" value="<?php echo $doctors_item['Email'] ?>"/><br />

    <h5>Gelar</h5>
    <input type="text" name="gelar" size="30" value="<?php echo $doctors_item['Gelar'] ?>"/><br />

    <h5>Bidang</h5>
    <input type="text" name="bidang" size="30" value="<?php echo $doctors_item['Bidang'] ?>"/><br />

    <h5>Your Info</h5>
    <textarea name="info" rows="10" /><?php echo $doctors_item['Info'] ?></textarea><br /><br />

    <input type="submit" name="submit" value=" Save Changes " />

</form>

</body>
</html>