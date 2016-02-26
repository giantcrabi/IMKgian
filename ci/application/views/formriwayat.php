<!DOCTYPE html>
<html>
<head>
	<title>Riwayat Kesehatan</title>
</head>
<body>


<?php echo form_open('crudpenyakit/create'); ?>
    <h5>Username</h5>
    <input type="text" name="username" size="50" /><br />

    <h5>Nama Penyakit</h5>
    <input type="text" name="nama_penyakit" size="50" /><br />

    <h5>Tanggal Sakit</h5>
	<input type="date" name="tgl_sakit" size="50" /><br />

    <h5>Tanggal Sembuh</h5>
    <input type="date" name="tgl_sembuh" size="50" /><br />

    <h5>Keterangan</h5>
    <textarea name="keterangan" rows="10" /></textarea><br /><br />

    <input type="submit" name="submit" value=" Daftar " />

</form>

</body>
</html>