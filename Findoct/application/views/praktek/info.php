


<!-- <div class="container"> -->
<?php echo '<h1 >'.$tpraktek[0]['NamaTPraktek'].'</h1><br>'; ?>
<?php //var_dump($tpraktek) ?>


<div class="row">


  <!-- <div class="col-md-6"><a href="<?php //echo site_url('TempatPraktik/info/'.$tpraktek[0]['NamaTPraktek']);?>"><?php echo $tpraktek[0]['NamaTPraktek']; ?>    <?php echo $tpraktek[0]['Gelar']; ?></a><br>
   -->
   
    <!-- <table style="border-spacing: 2px; padding:2px; width:50%;"> -->
    <table class="table-responsive">
    <table class="table" style="width:50%;">
        <tr><td rowspan="4">
            <img src="<?php echo base_url('uploads/tempatpraktek/'.$tpraktek[0]['Foto']); ?>" style="width:500px;height:auto;"/></td>
            <td><?php echo 'Alamat   : '.$tpraktek[0]['NamaTPraktek'];?></td>
        </tr>
       
        <tr><td><?php echo 'Kota     : '.$tpraktek[0]['Kota'];?></td></tr>
        <tr><td><?php echo 'Provinsi : '.$tpraktek[0]['Provinsi'];?></td></tr>
        <tr><td><?php echo 'Kode Pos : '.$tpraktek[0]['KodePos'];?></td></tr>
 
        <tr>

        </tr>
    </table>
    </table>
    <br>
    <br>

</div>
  
   <div class="table-responsive">
                    <table id="mytable" class="table table-hover">
                        <thead>
                            <th>Nama Dokter</th>
                            <th>Senin</th>
                            <th>Selasa</th>
                            <th>Rabu</th>
                            <th>Kamis</th>
                            <th>Jumat</th>
                            <th>Rute</th>
                            <!-- <th>Rute</th> -->
                        </thead>
                        <?php foreach ($doktor as $d) { ?>
                        <tbody>
                            </tr>
                                <td class="text-left"><?php echo anchor('Doctors/info/'.$d['Email'], $d['Nama'].','.$d['Gelar']);?></td>
                                <td class="text-left"><?php echo $d['Senin'] ?></td>
                                <td class="text-left"><?php echo $d['Selasa'] ?></td></td>
                                <td class="text-left"><?php echo $d['Rabu'] ?></td>
                                <td class="text-left"><?php echo $d['Kamis'] ?></td></td>
                                <td class="text-left"><?php echo $d['Jumat'] ?></td>
                                <td class="text-left"><a href="<?php echo base_url('maps'.'/'.$d['Gelar'].'/'.$d['Nama'].'/'.$d['IDTPraktek']);?>">Lihat Rute</a></td>
                                
                            </tr>
                        </tbody>
                        <?php } ?>
                    </table>
                </div>