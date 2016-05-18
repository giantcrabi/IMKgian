


<!-- <div class="container"> -->
<div class="row">


  <div class="col-md-6"><h1><?php echo $dokter[0]['Nama']; ?>, <?php echo $dokter[0]['Gelar']; ?></h1><br>
  <img src="<?php echo base_url('uploads/doctors/'.$dokter[0]['Foto']); ?>" style="width:auto;height:400px;" /><br><br></div>


</div>
  
<div class="table-responsive">
    <table id="mytable" class="table table-hover" style="font-size: 15px">
        <thead>
            <th>Nama Tempat Praktek</th>
            <th>Senin</th>
            <th>Selasa</th>
            <th>Rabu</th>
            <th>Kamis</th>
            <th>Jumat</th>
            <th>Rute</th>
        </thead>
        <?php foreach ($dokter_tpraktek as $d) { ?>
        <tbody>
        <tr>
            <td class="text-left"><?php echo anchor('TempatPraktik/info/'.$d['NamaTPraktek'],$d['NamaTPraktek']);?></td>
            <td><?php echo $d['Senin'] ?></td>
            <td><?php echo $d['Selasa'] ?></td></td>
            <td><?php echo $d['Rabu'] ?></td>
            <td><?php echo $d['Kamis'] ?></td></td>
            <td><?php echo $d['Jumat'] ?></td>
            <td class="text-left"><a href="<?php echo base_url('maps'.'/'.$dokter[0]['Gelar'].'/'.$dokter[0]['Nama'].'/'.$d['IDTPraktek']);?>">Lihat Rute</a></td>
        </tr>
        </tbody>
        <?php } ?>
    </table>
</div>