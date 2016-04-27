<?php
$this->load->view('template/head');
?>



<!--tambahkan custom css disini-->
<!-- iCheck -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/iCheck/flat/blue.css') ?>" rel="stylesheet" type="text/css" />
<!-- Morris chart -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/morris/morris.css') ?>" rel="stylesheet" type="text/css" />
<!-- jvectormap -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/jvectormap/jquery-jvectormap-1.2.2.css') ?>" rel="stylesheet" type="text/css" />
<!-- Date Picker -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/datepicker/datepicker3.css') ?>" rel="stylesheet" type="text/css" />
<!-- Daterange picker -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/daterangepicker/daterangepicker-bs3.css') ?>" rel="stylesheet" type="text/css" />
<!-- bootstrap wysihtml5 - text editor -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') ?>" rel="stylesheet" type="text/css" />

<?php
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>


<!-- Main content -->


<!-- Content -->
<section>
<body>
    <section id="feature" class="transparent-bg">
        <div class="container">
            <div class="center wow fadeInDown">
                <div class="center wow fadeInDown">
                    <h2>Tabel Dokter</h2>
                    <a align="text-right" href="<?php  echo site_url('Menu/Dokter/view_create_data');?>" class="btn btn-success btn-lg" role="button" style="float: left;">Tambah Dokter</a></span><br><br><br><br>
                </div>
                <div class="table-responsive">
                    <table id="mytable" class="table table-hover">
                        <thead>
                            <th>Email</th>
                            <th>Nama</th>
                            <th>Ubah</th>
                            <th>Hapus</th>
                        </thead>
                        <?php foreach ($data as $key) { ?>
                        <tbody>
                            </tr>
                                <td class="text-left"><?php echo $key['Gelar'] ?></td>
                                <td class="text-left"><?php echo $key['NamaGelar'] ?></td></td>
                                <td class="text-left"><a class="btn btn-warning btn-xs" href="<?php  echo site_url('Menu/Gelar/view_update_data/'.$key['Gelar']);?>"><span class="glyphicon glyphicon-edit"></span> Ubah</a> 
                                <td class="text-left"><a class="btn btn-danger btn-xs" href="<?php  echo site_url('Menu/Gelar/view_delete/'.$key['Gelar']);?>"><span class="glyphicon glyphicon-remove"></span> Hapus</a></td>
                            </tr>
                        </tbody>
                        <?php } ?>
                    </table>
                </div>
                
            </div>
        </div><!--/.container-->
    </section><!--/#feature-->
</body>

</section>
<?php
$this->load->view('template/js');
?>


<?php
$this->load->view('template/foot');
?>