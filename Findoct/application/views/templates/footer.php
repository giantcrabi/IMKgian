	<div id="footer" class="footer-distributed">

		<div class="footer-right">

			<a href="#"><i class="fa fa-facebook"></i></a>
			<a href="#"><i class="fa fa-twitter"></i></a>
			<a href="#"><i class="fa fa-linkedin"></i></a>
			<a href="#"><i class="fa fa-github"></i></a>

		</div>

		<div class="footer-left">
			<p style="font-size: 18px">Findoct &copy; 2016</p>
		</div>

	</div>

	<script type="text/javascript" src="<?php echo base_url("assets/js/jquery-2.1.3.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>

	<script>
		$(function() {
			$('#btn').hide();

			$('#spesialisSelector').on('change', function() {
				if($('#spesialisSelector').val() == "#"){
					$('#btn').hide();
				}
				else{
					$('#btn').show();
				}
			});

			$('#formSpesialis').submit(function(){
				var select_value = $('#spesialisSelector').val();
				$(this).attr('action', "http://localhost/Findoct/maps/" + select_value);
			});

			$('#formSpesialis2').submit(function(){
				var select_value = $('#spesialisSelector').val();
				$(this).attr('action', "http://localhost/Findoct/doctors/" + select_value);
			});

			$('#map_canvas').css('height', '100%');
		});
	</script>
</body>
</html>