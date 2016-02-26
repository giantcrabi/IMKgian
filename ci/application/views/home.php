<!DOCTYPE HTML>
<html>
	<head>
		<title>INDOHEALTHS</title>
		<link href="<?php echo base_url();?>AssetsHari/CSS/bootstrap.css" rel='stylesheet' type='text/css' />
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="<?php echo base_url();?>AssetsHari/JS/jquery.min.js"></script>
		 <!-- Custom Theme files -->
		<link href="<?php echo base_url();?>AssetsHari/CSS/style.css" rel='stylesheet' type='text/css' />
   		 <!-- Custom Theme files -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		</script>
		 <!---- start-smoth-scrolling---->
		<script type="text/javascript" src="<?php echo base_url();?>AssetsHari/JS/move-top.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>AssetsHari/JS/easing.js"></script>
        <script src="<?php echo base_url();?>AssetsHari/JS/jquery.js"></script>
        <!-- bxSlider Javascript file -->
        <script src="<?php echo base_url();?>AssetsHari/JS/jquery.bxslider.js"></script>
        <!-- bxSlider CSS file -->
        <link href="<?php echo base_url();?>AssetsHari/JS/jquery.bxslider.css" rel="stylesheet" />
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
		</script>
		 <!---- start-smoth-scrolling---->
		<!----webfonts--->
		<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
		<!---//webfonts--->
		<!----start-top-nav-script---->
		<script>
			$(function() {
				var pull 		= $('#pull');
					menu 		= $('nav ul');
					menuHeight	= menu.height();
				$(pull).on('click', function(e) {
					e.preventDefault();
					menu.slideToggle();
				});
				$(window).resize(function(){
	        		var w = $(window).width();
	        		if(w > 320 && menu.is(':hidden')) {
	        			menu.removeAttr('style');
	        		}
	    		});
			});
		</script>
            <script type="text/javascript">
$(document).ready(function(){
  $('.bxslider').bxSlider();
});
</script>
    <style>
        #footer p{
   	text-align: center;
    font-size: 20px;
    font-family: Buxton Sketch;
    color: black;
    margin-right: 10px;
    margin-bottom: 10px;

}
#footer img{
    float: right;
    width: 35px;
    height: 35px;
    border: none;
    margin-top: 5px;
    margin-left: 5px;
    margin-right: 5px;
}
        
#footer li{
	display : inline;
	font-family: Euphemia;
	font-size: 25px;
    font-style: bold;
    margin: 15px 15px;
	}
    </style>
	</head>
	<body>
		<!----- start-header---->
			<div id="home" class="header">
					<div class="top-header">
						<div class="container">
						<div class="logo">
							<a href="#"><img src="<?php echo base_url();?>AssetsHari/images/LogoWebsite.png" title="doctor"/></a>
						</div>
						<!----start-top-nav---->
                         
						 <nav class="top-nav">
							<ul class="top-nav">
								<li class="active"><a href="#home" class="scroll">Home </a></li>
								<li><a href="#about" class="scroll">Penyakit</a></li>
								<li><a href="<?php echo base_url(); ?>index.php/anggota" >Login</a></li>
								<li><a href="#footer" class="scroll">About Us</a></li>
							</ul>
							<a href="#" id="pull"><img src="images/menu-icon.png" title="menu" /></a>
						</nav>
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
		<!----- //End-header---->
		<!----start-slider-script---->
			<script src="js/responsiveslides.min.js"></script>
			 <script>
			    // You can also use "$(window).load(function() {"
			    $(function () {
			      // Slideshow 4
			      $("#slider4").responsiveSlides({
			        auto: true,
			        pager: true,
			        nav: true,
			        speed: 500,
			        namespace: "callbacks",
			        before: function () {
			          $('.events').append("<li>before event fired.</li>");
			        },
			        after: function () {
			          $('.events').append("<li>after event fired.</li>");
			        }
			      });
			
			    });
			  </script>
        
            	<div id="home">
		<section class="gambar">
<ul class="bxslider">
  <li><img src="http://www.kittivisianlife.com/wp-content/uploads/2010/04/WHDdoitforlife5.jpg" alt="Slide" title="Quotes That Will Free Your Mind" width=100% height="450" /></li>
  <li><img src="http://www.bridgetteraes.com/wp-content/uploads/2011/12/world-aids-day.jpg" alt="Slide" title="Quotes That Will Free Your Mind" width=100% height="450" /></li>
     <li><img src="http://ste.india.com/sites/default/files/2015/04/06/343558-ft.jpg" alt="Slide" title="Quotes That Will Free Your Mind" width=100% height="450" /></li>
</ul>
</section>
		
	</div>
			
			<div id="about" class="about">
				<div class="container">
					<div class="header about-header text-center">
						<h2>IndoHealth System</h2>
						<p>We are truly caring for people's health. The health is number one human need. Truly caring. Truly love.</p>
					</div>
					<!---- About-grids ---->
					<div class="about-grids">
						<div class="col-md-4">
							<div class="about-grid">
								<img src="http://icons.iconarchive.com/icons/icons8/android/512/Healthcare-Cancer-Ribbon-icon.png" title="name" />
								<span class="t-icon1">COba </span>
								<div class="about-grid-info text-center">
									<h3><a href="#">Children's specialist</a></h3>
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer.</p>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="about-grid n-about-grid n-about-grid1">
								<img src="images/img2.jpg" title="name" />
								<span class="t-icon1"> </span>
								<div class="about-grid-info text-center">
									<h3><a href="#">Women's specialist</a></h3>
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer.</p>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="about-grid n-about-grid n-about-grid2">
								<img src="images/img3.jpg" title="name" />
								<span class="t-icon2"> </span>
								<div class="about-grid-info text-center">
									<h3><a href="#">men's specialist</a></h3>
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer.</p>
								</div>
							</div>
						</div>
						<div class="clearfix"> </div>
					</div>
					<!---- About-grids ---->
				</div>
				
			</div>
			
						<!--<div class="contact-grids">
							<h3>contact us</h3>
							<div class="col-md-5 contact-grid-left">
								<h4>contact information</h4>
								<ul>
									<li><span class="cal"> </span><label>Monday - Friday :</label><small>9:30 AM to 6:30 PM</small></li>
									<li><span class="pin"> </span><label>Address :</label><small>123 Some Street , London, UK, CP 123</small></li>
									<li><span class="phone"> </span><label>Phone :</label><small>(032) 987-1235</small></li>
									<li><span class="fax"> </span><label>Fax :</label><small>(123) 984-1234</small></li>
									<li><span class="mail"> </span><label>Email :</label><small> info@doctor.com</small></li>
								</ul>
							</div>
							<div class="col-md-7 contact-grid-right">
								<h4>leave us a message</h4>
								<form>
									<input type="text" value="Name:" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name:';}">
									<input type="text" value="Email:" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email:';}">
									<input type="text" value="Phone No:" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Phone No:';}">
									<textarea rows="2" cols="70" onfocus="if(this.value == 'Message:') this.value='';" onblur="if(this.value == '') this.value='Message:';">Message:</textarea>
									<input type="submit" value="SEND MESSAGE" />
								</form>
							</div>
							<div class="clearfix"> </div>
						</div>
						<!---- contact-grids ---->
     
        <div id="footer">
		<p>Copyright &copy; 2015<p>
        <p>IndoHealth System. Truly Caring. Truly Love.</p>
		<p>Devira W.P. | Harry Tan | Gian Bastian | Stanley L. | Arya Pras.<p>
		<ul>
				<li><a href="https://www.facebook.com/devirawiena"><img title="Devira Wiena Pramintya" src="https://fbcdn-profile-a.akamaihd.net/hprofile-ak-xfp1/v/t1.0-1/p160x160/1377580_10152203108461729_809245696_n.png?oh=b2a948e839b50b5c02f62af1b9ee278f&oe=559C5F7D&__gda__=1440484360_11a746ddd6fc8758f87c8c407a25a100" alt="Devira Wiena Pramintya"></a></li>
				<li><a href="https://twitter.com/devirawiena"><img title="Devira Wiena Pramintya" src="https://www.disabledperson.com/assets/twitter-c672cb9df8e989adcf9bf40245afad20.png" alt="Devira Wiena Pramintya"></a></li>
				<li><a href="https://instagram.com/devirawiena"><img title="Devira Wiena Pramintya" src="http://www.ithb.ac.id/userfiles/image/instagram-logo-icon.png" alt="Devira Wiena Pramintya"><a></li>
				<li><a href="https://path.com/devirawiena"><img title="Devira Wiena Pramintya" src="path.png" alt="Devira Wiena Pramintya"><a></li>
		</ul>
		</div>
				
			<!---- contact ---->
			<div class="clearfix"> </div>
			<!--- copy-right ---->
			<div class="copy-right">
				<div class="container">
				<div class="copy-right-left">
					
					<script type="text/javascript">
									$(document).ready(function() {
										/*
										var defaults = {
								  			containerID: 'toTop', // fading element id
											containerHoverID: 'toTopHover', // fading element hover id
											scrollSpeed: 1200,
											easingType: 'linear' 
								 		};
										*/
								
                                        <p>Truly Caring. Truly Love.</p>
										$().UItoTop({ easingType: 'easeOutQuart' });
										
									});
								</script>
				
                
				</div>
				
				<div class="clearfix"> </div>
			</div>
			</div>
			<!--- copy-right ---->
	</body>
</html>

