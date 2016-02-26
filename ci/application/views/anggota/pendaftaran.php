
  <div class="register-page">
    <div class="register-box">
  
      <div id="successMessage"class="alert alert-success alert-dismissible" style="display:none;"role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Register Success!</strong> Thank You for registering in IndoHealth.</div>
      <div class="register-box-body">
        <p class="login-box-msg">Register New Account</p>
        <form id="daftar" action="<?php echo base_url(); ?>index.php/anggota/daftar" method="post">
          <div class="form-group has-feedback">
            <input type="text" id="firstname" class="form-control" name="firstname"placeholder="First Name" required/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
           <div class="form-group has-feedback">
            <input type="text" class="form-control " id="lastname" name="lastname" placeholder="Last Name" required/>
            <span class="glyphicon glyphicon-credit-card form-control-feedback"></span>
          </div>
           <div class="form-group has-feedback">
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required/>
            <span class="glyphicon glyphicon-home form-control-feedback"></span>
          </div>
        
          <div class="form-group has-feedback">
            <input type="password" class="form-control" id="txtNewPassword" name="password" placeholder="Password" required/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            <div class="registrationFormAlert" id="divCheckPasswordMatch"></div>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="re" id="txtConfirmPassword" class="form-control" placeholder="Retype password" required/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
         <div class="form-group has-feedback">
            <input type="date" class="form-control" id="birthday" name="birthday" placeholder="Birthday" required/>
            <span class="glyphicon glyphicon-home form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" id="gender" name="gender" placeholder="Gender" required/>
            <span class="glyphicon glyphicon-home form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">    
                      <a href="<?php echo site_url(); ?>/anggota/index" class="text-center">Already Have an Account??</a>       
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button id="submit" type="submit" class="btn btn-primary btn-block btn-flat">REGISTER</button>
            </div><!-- /.col -->
          </div>
        </form>        
        
      </div><!-- /.form-box -->
    </div><!-- /.register-box -->

    <!-- jQuery 2.1.4 --
    
    <!-- iCheck -->
    <!--<script src="<?php echo base_url(); ?>assets/plugins/iCheck/icheck.min.js" type="text/javascript"></script>-->
    
    <script>
      $(function () {
        // $('input').iCheck({
        //   checkboxClass: 'icheckbox_square-blue',
        //   radioClass: 'iradio_square-blue',
        //   increaseArea: '20%' // optional
        // });
        $(document).ready(function () {
           $("#txtConfirmPassword").keyup(checkPasswordMatch);
        })
         $('#daftar input').tooltipster({
            trigger: 'custom',
            onlyOne: false,
            position: 'right'
        });
         $('#daftar').validate({ // initialize the plugin
            errorPlacement: function (error, element) {
                var lastError = $(element).data('lastError'),
                    newError = $(error).text();
                
                $(element).data('lastError', newError);
                                
                if(newError !== '' && newError !== lastError){
                    $(element).tooltipster('content', newError);
                    $(element).tooltipster('show');
                }
            },
            success: function (label, element) {
                $(element).tooltipster('hide');
            },
            rules: {
                firstname: {
                    required: true
                },
                lastname: {
                    required: true
                },
                email: {
                    required:true,
                    email:true
                },
            }
        });

        $('#submit').click(function(e){
         /* e.preventDefault();
          if(!$('#daftar').valid())return;
          else($('#daftar').valid())
          {
            e.preventDefault();
          }*/
          
          var message2="<div class='row'><div class='col-md-12'> \
                        <div class='col-md-3'> \
                                    \
                        </div>                  \
                        <div class='col-md-6'>  \
                            Password Anda Tidak Sama \
                        </div>                  \
                      </div>"
          var message="<div class='row'><div class='col-md-12'> \
                        <div class='col-md-3'> \
                          First Name          \
                        </div>                  \
                        <div class='col-md-6'>  \
                            "+$('#firstname').val()+" \
                        </div>                  \
                      </div>                  \
                      <div class='col-md-12'> \
                        <div class='col-md-3'> \
                          Lastname         \
                        </div>                  \
                        <div class='col-md-6'>  \
                            "+$('#lastname').val()+" \
                        </div>                  \
                      </div>                  \
                      <div class='col-md-12'> \
                        <div class='col-md-3'> \
                          Birthday       \
                        </div>                  \
                        <div class='col-md-6'>  \
                            "+$('#birthday').val()+" \
                        </div>                  \
                      </div>                  \
                      <div class='col-md-12'> \
                        <div class='col-md-3'> \
                          Email        \
                        </div>                  \
                        <div class='col-md-6'>  \
                            "+$('#email').val()+" \
                        </div>                  \
                      </div>                  \
                      <div class='col-md-12'> \
                        <div class='col-md-3'> \
                          Gender          \
                        </div>                  \
                        <div class='col-md-6'>  \
                            "+$('#gender').val()+" \
                        </div>                  \
                      </div>"

          var password = $("#txtNewPassword").val();
          var confirmPassword = $("#txtConfirmPassword").val();

          if (password == confirmPassword) 
          {
            bootbox.dialog({
              message: message,
              title: "Are you sure with this data?",
              buttons: {
                danger: {
                  label: "Batal!",
                  className: "btn-danger",
                  callback: function() {
                    
                  }
                },
                success: {
                  label: "OK",
                  className: "btn-success",
                  callback: function() {
                   $.ajax({
                      url: "<?php echo base_url(); ?>index.php/anggota/daftar",
                      type: 'post',
                      dataType: 'json',
                      data: $("#daftar").serialize(),
                      success: function(data) {
                       if(data.status=='sukses')
                       {
                        $('#successMessage').show();
                       }
                       $('#daftar').trigger("reset");
                      }
                    });
                      
                  }
                }
              }
            });
          }
          else
          {
            return;
          }
        })
        function checkPasswordMatch() {
            var password = $("#txtNewPassword").val();
            var confirmPassword = $("#txtConfirmPassword").val();

            if (password != confirmPassword)
                $("#divCheckPasswordMatch").html("Passwords do not match!");
            else
                $("#divCheckPasswordMatch").html("Passwords match.");
        }
      });
    </script>
    

  </body>
</html>