<br>
<div class="row">
	<div class="col-md-8"></div>
	<div class="col-md-2">
		<form action='' id="formSpesialis2" class="pull-right">
			<select id="spesialisSelector" style="width: 150px; height: 24.72px;">

				<option value="#">--Pilih Spesialis--</option>
				<?php foreach ($data_gelar as $value) { ?>

				<option value="<?php echo $value['Gelar'] ?>"><?php echo $value['Gelar'] ?></option>
				<?php } 	?>

			</select>
			<button id="btn" action="submit">Search</button>
		</form>
	</div>
	<div class="col-md-2">
		<form action="<?php echo site_url('Doctors/cari/');?>" method="POST" class="pull-right">
			<input type="text" name="cari" placeholder="Nama dokter.."><input type="submit" value="Search">
		</form>
	</div>
</div>


<?php
	echo "<h1 style=\"vertical-align:middle; text-align:center; font-family: bebas neue;\">";
	echo $title;
	echo "</h1>";
?>
 
<div class="row">
	

	<?php 
	
	foreach($dokter_page as $a){	?>
	
    <div class="col-md-3"><a href="<?php echo site_url('Doctors/info/'.$a->Email);?>" style="text-decoration:none;">
      <div class="card">
        <div class="card-image">
          <img src="<?php echo base_url('uploads/doctors/'.$a->Foto); ?>" alt="iconFindoct" width="100%" height="400px" />
          <span class="card-title">
          </span>
           
        </div>
        <div class="card-content" >
          <?php echo $a->Nama; ?>, <?php echo $a->Gelar; ?>
        </div>
      </div>
      </a>
    </div>

	<?php }	?>
	<div class="col-md-12" style="vertical-align:middle; text-align:center;">
  		<?php echo $this->pagination->create_links(); ?>
  	<div>

</div>


