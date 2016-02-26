<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>IndoHealth System</title>
    <SCRIPT language="javascript" type="text/javascript" src="<?php echo base_url(); ?>assets/ckck.js">
    </script>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="<?php echo base_url(); ?>assets/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->
    <style>
      .body{
        background-image: url('http://westfamilychiropractic.com/diyFiles/extended_family.jpg');
        background-size: cover;
        -webkit-filter: blur(5px);
        z-index: 0;
      }
    </style>
  </head>
  <body class="register-page">
    <div class="register-box">
      <?php if(isset($_GET['login']) && $_GET['login']=='failed'){ ?>
     <div id="successMessage"class="alert  alert-dismissible" style="background-color:#FF4545;"role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Login Gagal!</strong> username dan password salah.</div>
    <?php } ?>

      <div class="register-box-body">
        <p class="login-box-msg"> IndoHealth. Truly Caring. Truly Love. </p>
        <form action="<?php echo base_url(); ?>index.php/anggota/cek_login" method="post" onSubmit="return cek()">

          <div class="form-group has-feedback">
            <input type="Username" class="form-control" name="username" placeholder="Username" required/>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
           
          <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Password" required/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          
          <div class="row">
            <div class="col-xs-8">    
                     <a href="<?php echo base_url();?>index.php/anggota/pendaftaran" class="text-center">Register Now!</a>               
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
            </div><!-- /.col -->
          </div>
        </form>        


        
      </div><!-- /.form-box -->
    </div><!-- /.register-box -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url(); ?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url(); ?>assets/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>