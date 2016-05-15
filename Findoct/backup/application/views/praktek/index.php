<?php foreach ($praktek as $praktek_item): ?>

        <h2><?php echo "$praktek_item[NamaT]".', '."$praktek_item[Alamat]".', '."$praktek_item[Kota]" ?></h2>
        <div class="main">
                <img src="<?php echo base_url(); ?>uploads/tempatpraktek/<?php echo $praktek_item['Foto']; ?>" width="150" height="150" />
        </div>
        <p><a href="<?php echo "$praktek_item[IDTPraktek]"?>">Lihat Selengkapnya</a></p>

<?php endforeach ?>