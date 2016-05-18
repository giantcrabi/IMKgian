<h2><?php echo $praktek_item['NamaT'] ?></h2>
<a href="update_praktek/<?php echo $praktek_item['IDTPraktek']; ?>">
	<img src="<?php echo base_url(); ?>uploads/edit.png" alt="edit" width="auto" height="auto" title="Edit Tempat">
</a>
<a href="delete/<?php echo $praktek_item['IDTPraktek']; ?>" onclick="if (!confirm('Are you sure?')) return false;">
	<img src="<?php echo base_url(); ?>uploads/del.png" alt="delete" width="auto" height="auto" title="Delete Tempat">
</a>
<div class="main">
    <img src="<?php echo base_url(); ?>uploads/tempatpraktek/<?php echo $praktek_item['Foto']; ?>" width="150" height="150" />
</div>
<h3 class="about">Alamat : </h3>&nbsp;&nbsp;<?php echo $praktek_item['Alamat'] ?><br>
<h3 class="about">Kota : </h3>&nbsp;&nbsp;<?php echo $praktek_item['Kota'] ?><br>
<h3 class="about">Provinsi : </h3>&nbsp;&nbsp;<?php echo $praktek_item['Provinsi'] ?><br>
<h3 class="about">Kode Pos : </h3>&nbsp;&nbsp;<?php echo $praktek_item['KodePos'] ?><br><br>