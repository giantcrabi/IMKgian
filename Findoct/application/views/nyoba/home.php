<div class="container-fluid">    
  <div class="row content">
    <h1 style="vertical-align:middle; text-align:center; font-family: bebas neue;">Pencarian Dokter Berdasarkan</h1>
    <div class="col-md-12">
      <br>
      <div class="col-md-4" style="display:table-cell; vertical-align:middle; text-align:center">
        <a href="<?php echo base_url("/maps/dr.Umum"); ?>"><img src="<?php echo base_url('uploads/HomeCircleUmum.png'); ?>" alt="iconFindoct" width="200px" height="200px"></a>
      </div>
      <div class="col-md-4" style="display:table-cell; vertical-align:middle; text-align:center">
        <a href="<?php echo base_url("/nyoba/test"); ?>"><img src="<?php echo base_url('uploads/HomeCircleSpesialis.png'); ?>" alt="iconFindoct" width="200px" height="200px"></a>
      </div>
      <div class="col-md-4" style="display:table-cell; vertical-align:middle; text-align:center">
        <img src="<?php echo base_url('uploads/HomeCirclePenyakit.png'); ?>" alt="iconFindoct" width="200px" height="200px">
      </div>


    </div>
    
    <div class="col-md-12" style="margin-top:20px">
      <div class="col-md-7"> 
        <h1><b>Why Findoct?</b></h1>
        <p>Karena kami menyediakan informasi yang up-to-date mengenai dokter dan klinik dokter di daerah Surabaya.</p>
        <hr>
        <h3>FUN FACT</h3>
        <p>Banyak yang bilang wortel dapat meningkatkan kemampuan melihat seseorang. Kenyataannya, kandungan vitamin A pada wortel bukan meningkatkan kemampuan melihat, tapi menjaga kesehatan organ penglihatan, yakni mata</p>
      </div>
      <div class="col-md-5" >
       <div id="container" style="margin-right:-10px">
          <ul>
              <li><img src="<?php echo base_url('uploads/tempatpraktek/rs-haji.jpg'); ?>" alt="iconFindoct" width="100%" height="auto" /></li>
              <li><img src="<?php echo base_url('uploads/tempatpraktek/RS-husada-utama.jpg'); ?>" alt="iconFindoct" width="100%" height="auto" /></li>
              <li><img src="<?php echo base_url('uploads/tempatpraktek/RSU_Soetomo.jpg'); ?>" alt="iconFindoct" width="100%" height="auto"  /></li>
          </ul>
          <span class="button prevButton"></span>
          <span class="button nextButton"></span>
        </div>
       
        <script src="<?php echo base_url("assets/js/jquery-1.4.2.min.js"); ?>"></script>

        <script>
          $(window).load(function(){
              var pages = $('#container li'), current=0;
              var currentPage,nextPage;
              var timeoutID;
              var buttonClicked=0;

              var handler1=function(){
                buttonClicked=1;
                $('#container .button').unbind('click');
                currentPage= pages.eq(current);
                if($(this).hasClass('prevButton'))
                {
                  if (current <= 0)
                    current=pages.length-1;
                    else
                    current=current-1;
                }
                else
                {

                  if (current >= pages.length-1)
                    current=0;
                  else
                    current=current+1;
                }
                nextPage = pages.eq(current); 
                currentPage.fadeTo('slow',0.3,function(){
                  nextPage.fadeIn('slow',function(){
                    nextPage.css("opacity",1);
                    currentPage.hide();
                    currentPage.css("opacity",1);
                    $('#container .button').bind('click',handler1);
                  }); 
                });     
              }

              var handler2=function(){
                if (buttonClicked==0)
                {
                $('#container .button').unbind('click');
                currentPage= pages.eq(current);
                if (current >= pages.length-1)
                  current=0;
                else
                  current=current+1;
                nextPage = pages.eq(current); 
                currentPage.fadeTo('slow',0.3,function(){
                  nextPage.fadeIn('slow',function(){
                    nextPage.css("opacity",1);
                    currentPage.hide();
                    currentPage.css("opacity",1);
                    $('#container .button').bind('click',handler1);       
                  }); 
                });
                timeoutID=setTimeout(function(){
                  handler2(); 
                }, 4000);
                }
              }

              $('#container .button').click(function(){
                clearTimeout(timeoutID);
                handler1();
              });

              timeoutID=setTimeout(function(){
                handler2(); 
                }, 4000);
              
          });

        </script>
      
    </div>
    
  </div>
</div>
</div>