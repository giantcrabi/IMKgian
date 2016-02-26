<?php foreach ($doctors as $doctors_item): ?>

        <h2><?php echo "$doctors_item[Nama]".', '."$doctors_item[Gelar]" ?></h2>
        <div class="main">
                <img src="<?php echo base_url(); ?>uploads/doctors/<?php echo $doctors_item['Foto']; ?>" width="150" height="150" />
        </div>
        <p><a href="<?php echo "$doctors_item[Username]"?>">Lihat Profil</a></p>

<?php endforeach ?>