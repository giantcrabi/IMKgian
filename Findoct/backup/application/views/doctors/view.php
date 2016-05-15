<h2><?php echo $doctors_item['Nama'] ?></h2>
<a href="update_profile/<?php echo $doctors_item['Username']; ?>">
	<img src="<?php echo base_url(); ?>uploads/edit.png" alt="edit" width="auto" height="auto" title="Edit Profile">
</a>
<a href="delete/<?php echo $doctors_item['Username']; ?>" onclick="if (!confirm('Are you sure?')) return false;">
	<img src="<?php echo base_url(); ?>uploads/del.png" alt="delete" width="auto" height="auto" title="Delete Profile">
</a>
<div class="main">
    <img src="<?php echo base_url(); ?>uploads/doctors/<?php echo $doctors_item['Foto']; ?>" width="150" height="150" />
</div>
<h3 class="about">Email : </h3>&nbsp;&nbsp;<?php echo $doctors_item['Email'] ?><br>
<h3 class="about">Gelar : </h3>&nbsp;&nbsp;<?php echo $doctors_item['Gelar'] ?><br>
<h3 class="about">Bidang : </h3>&nbsp;&nbsp;<?php echo $doctors_item['Bidang'] ?><br>
<h3>Info : </h3><p><?php echo $doctors_item['Info'] ?></p>

<h3>Daftar Penyakit yang Ditangani</h3>

<?php echo validation_errors(); ?>

<?php echo form_open("doctors/$doctors_item[Username]"); ?>
	<table>
		<tr>Daftar Penyakit</tr>
		<tr>
		    <select name="id_artikel">
		        <?php foreach ($penyakit as $penyakit_item) { ?>
		            <option value="<?php echo $penyakit_item['id_artikel'] ?>"><?php echo $penyakit_item['judul_artikel'] ?></option>
		        <?php } ?>
		    </select>
		</tr>
		<tr><input type="submit" name="submit" value=" Tambah " /></tr>
	</table>
</form>

<h5>Jika penyakit yang anda tangani tidak terdapat di daftar, <a href="<?php echo base_url(); ?>index.php/crudpenyakit/add_penyakit">Click Here</a></h5>

<table border="1">
	<tr>
		<th>Nama Penyakit</th>
	</tr>
<?php if(count($doctor_penyakit) > 0) {
		for($i = 0; $i < count($doctor_penyakit); $i++) { ?>
			<tr>
		    	<td><?php echo $nama_penyakit[$i]['judul_artikel'] ?></td>
		    </tr>
<?php }
	} ?>
</table>
<br>

<h3>Jadwal dan Tempat Praktek</h3>
<a href="tempat_kerja/<?php echo $doctors_item['Username']; ?>">
	Tambah Tempat Praktek
</a>
<table border="1">
	<tr>
		<th>Nama Tempat</th>
		<th>Senin</th>
		<th>Selasa</th>
		<th>Rabu</th>
		<th>Kamis</th>
		<th>Jumat</th>
		<th>Sabtu</th>
		<th>Minggu</th>
	</tr>
<?php if(count($doctor_praktek) > 0) {
		for($i = 0; $i < count($doctor_praktek); $i++) { ?>
			<tr>
		    	<td><?php echo $nama_praktek[$i]['NamaT'].', '.$nama_praktek[$i]['Alamat'].', '.$nama_praktek[$i]['Kota'] ?></td>
		    	<td><?php echo $doctor_praktek[$i]['Senin'] ?></td>
		    	<td><?php echo $doctor_praktek[$i]['Selasa'] ?></td>
		    	<td><?php echo $doctor_praktek[$i]['Rabu'] ?></td>
		    	<td><?php echo $doctor_praktek[$i]['Kamis'] ?></td>
		    	<td><?php echo $doctor_praktek[$i]['Jumat'] ?></td>
		    	<td><?php echo $doctor_praktek[$i]['Sabtu'] ?></td>
		    	<td><?php echo $doctor_praktek[$i]['Minggu'] ?></td>
		    	<td>
		    		<a href="edit_jadwal/<?php echo $doctors_item['Username'].'/'.$doctor_praktek[$i]['IDTPraktek']; ?>">
						<img src="<?php echo base_url(); ?>uploads/edit.png" alt="edit" width="auto" height="auto" title="Edit Jadwal">
					</a>
				</td>
				<td>
					<a href="delete_kerja/<?php echo $doctors_item['Username'].'/'.$doctor_praktek[$i]['IDTPraktek']; ?>" onclick="if (!confirm('Are you sure?')) return false;">
						<img src="<?php echo base_url(); ?>uploads/del.png" alt="delete" width="auto" height="auto" title="Delete Tempat Kerja">
					</a>
				</td>
		    </tr>
<?php }
	} ?>
</table>
<br>
<a href="<?php echo base_url(); ?>index.php/maps/<?php echo $doctors_item['Username']; ?>/">
	Lihat Tempat Praktek Menggunakan Google Map
</a>