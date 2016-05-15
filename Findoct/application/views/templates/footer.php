	<footer class="container-fluid text-center">
		<p>Contact Us</p>
	</footer>
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