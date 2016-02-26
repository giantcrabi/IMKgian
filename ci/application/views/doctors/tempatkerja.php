<!DOCTYPE html>
<html>
<head>
	<title>My Form</title>
</head>
<body>

<h1><?php echo $title; ?></h1>
<?php echo validation_errors(); ?>

<?php echo form_open("doctors/tempat_kerja/$doctors_item[Username]"); ?>

    <h4>Tempat Praktek</h4>
    <select name="idtpraktek">
        <?php foreach ($praktek as $praktek_item) { ?>
            <option value="<?php echo $praktek_item['IDTPraktek'] ?>"><?php echo $praktek_item['NamaT'].', '.$praktek_item['Alamat'].', '.$praktek_item['Kota'] ?></option>
        <?php } ?>
    </select>

    <h4>Jika tempat praktek anda tidak terdapat di daftar, <a href="<?php echo base_url(); ?>index.php/praktek/create">Click Here</a></h4>

    <h4>Jadwal(pukul xx:xx-xx:xx) :</h4>
    <h5>Senin</h5>
    <input type="text" name="senin" size="30" /><br />

    <h5>Selasa</h5>
    <input type="text" name="selasa" size="30" /><br />

    <h5>Rabu</h5>
    <input type="text" name="rabu" size="30" /><br />

    <h5>Kamis</h5>
    <input type="text" name="kamis" size="30" /><br />

    <h5>Jumat</h5>
    <input type="text" name="jumat" size="30" /><br />

    <h5>Sabtu</h5>
    <input type="text" name="sabtu" size="30" /><br />

    <h5>Minggu</h5>
    <input type="text" name="minggu" size="30" /><br /><br />

    <input type="submit" name="submit" value=" Tambah " />

</form>

</body>
</html>