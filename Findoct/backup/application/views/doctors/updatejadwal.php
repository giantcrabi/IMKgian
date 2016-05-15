<!DOCTYPE html>
<html>
<head>
	<title>My Form</title>
</head>
<body>

<h1><?php echo $title; ?></h1>
<?php echo validation_errors(); ?>

<?php echo form_open("doctors/edit_jadwal/$doctors_item[Username]/$praktek_item[IDTPraktek]"); ?>

    <h4><?php echo $praktek_item['NamaT'].', '.$praktek_item['Alamat'].', '.$praktek_item['Kota'] ?></h4>

    <h4>Jadwal(pukul xx:xx-xx:xx) :</h4>
    <h5>Senin</h5>
    <input type="text" name="senin" size="30" value="<?php echo $doctor_praktek['Senin']; ?>" /><br />

    <h5>Selasa</h5>
    <input type="text" name="selasa" size="30" value="<?php echo $doctor_praktek['Selasa']; ?>" /><br />

    <h5>Rabu</h5>
    <input type="text" name="rabu" size="30" value="<?php echo $doctor_praktek['Rabu']; ?>" /><br />

    <h5>Kamis</h5>
    <input type="text" name="kamis" size="30" value="<?php echo $doctor_praktek['Kamis']; ?>" /><br />

    <h5>Jumat</h5>
    <input type="text" name="jumat" size="30" value="<?php echo $doctor_praktek['Jumat']; ?>" /><br />

    <h5>Sabtu</h5>
    <input type="text" name="sabtu" size="30" value="<?php echo $doctor_praktek['Sabtu']; ?>" /><br />

    <h5>Minggu</h5>
    <input type="text" name="minggu" size="30" value="<?php echo $doctor_praktek['Minggu']; ?>" /><br /><br />

    <input type="submit" name="submit" value=" Save Changes " />

</form>

</body>