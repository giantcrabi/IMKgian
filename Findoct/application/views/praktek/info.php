


<!-- <div class="container"> -->
<?php echo '<h1 >'.$tpraktek[0]['NamaTPraktek'].'</h1><br>'; ?>
<?php //var_dump($tpraktek) ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <img src="<?php echo base_url('uploads/tempatpraktek/'.$tpraktek[0]['Foto']); ?>" style="width:540px;height:400px;" /></td>
        </div>
        <div class="col-md-4" style="font-size: 15px;">
            <h3><b>Alamat</b></h3>
            <p><?php echo $tpraktek[0]['Alamat'];?></p>
            <br />
            <h3><b>Kota</b></h3>
            <p><?php echo $tpraktek[0]['Kota'];?></p>
            <br />
            <h3><b>Provinsi</b></h3>
            <p><?php echo $tpraktek[0]['Provinsi'];?></p>
            <br />
            <h3><b>Kode Pos</b></h3>
            <p><?php 
                if($tpraktek[0]['KodePos'] == ""){
                    echo "-";
                }
                else{
                    echo $tpraktek[0]['KodePos'];
                }
            ?></p>
            <br />
        </div>
    </div>
</div>

<div class="table-responsive">
    <table id="mytable" class="table table-hover" style="font-size: 15px">
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
        <tr>
            <td class="text-left"><?php echo anchor('Doctors/info/'.$d['Email'], $d['Nama'].', '.$d['Gelar']);?></td>
            <td><?php echo $d['Senin'] ?></td>
            <td><?php echo $d['Selasa'] ?></td></td>
            <td><?php echo $d['Rabu'] ?></td>
            <td><?php echo $d['Kamis'] ?></td></td>
            <td><?php echo $d['Jumat'] ?></td>
            <td class="text-left"><a href="<?php echo base_url('maps'.'/'.$d['Gelar'].'/'.$d['Nama'].'/'.$d['IDTPraktek']);?>">Lihat Rute</a></td>      
        </tr>
        </tbody>
        <?php } ?>
    </table>
</div>