<?php foreach ($news as $news_item): ?>

        <h3><?php echo $news_item['KTP'] ?></h3>
        <p>Nama : <?php echo $news_item['Nama'] ?></p>
        <p>Alamat : <?php echo $news_item['Alamat'] ?></p>
        <p>Umur : <?php echo $news_item['Umur'] ?></p>
        <p>Status Kawin : <?php echo $news_item['StatusKawin'] ?></p>
        <p>Pekerjaan : <?php echo $news_item['Pekerjaan'] ?></p>
        <p>Slip Gaji : <?php echo $news_item['SlipGaji'] ?></p>
        
<?php endforeach ?>