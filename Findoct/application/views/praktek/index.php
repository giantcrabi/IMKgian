<br>
<div class="row">
  <div class="col-md-9"></div>
  <div class="col-md-3">
    <form action="<?php echo site_url('TempatPraktik/cari/');?>" method="POST" class="pull-right">
      <input type="text" name="cari" placeholder="Nama tempat praktek.." ><input type="submit" value="Search">
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
	
	foreach($tp_page as $a){	?>
	
    <div class="col-md-3"><a href="<?php echo site_url('TempatPraktik/info/'.$a->NamaTPraktek);?>" >
      <div class="card">
        <div class="card-image">
          <img src="<?php echo base_url('uploads/tempatpraktek/'.$a->Foto); ?>" alt="iconFindoct" width="100%" height="350px" />
          <span class="card-title"></span> 
        </div>
        <div class="card-content" >
          <?php echo $a->NamaTPraktek; ?>
        
        </div>
     
      </div>
    </a>
    </div>

	<?php }
	 ?>

	 <div class="col-md-12" style="vertical-align:middle; text-align:center;">
  <?php echo $this->pagination->create_links(); ?>
  <div>

</div>

	