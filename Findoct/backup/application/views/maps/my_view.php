	<div class="container-fluid">
		<?php 
			if(!empty($identitasdok)){
				echo "<span><h1>";
				echo $identitasdok;
				echo "</h1></span>";
			}
		?>    
		<div class="row content">
			<div class="col-md-7"> 
				<?php echo $map['html']; ?>
			</div>
			<div class="col-md-5 sidenav">
				<h2>Daftar Tempat Praktek Dari Jarak Terdekat Hingga Terjauh</h2>
				<table id="listmap" style="padding: 15px">
				
				</table>
			</div>
		</div>
		<div id="directionsDiv"></div>
	</div>
	<script>
		function compare(a,b) {
		  if (a.distance > b.distance)
		    return 1;
		  if (a.distance < b.distance)
		    return -1;
		  return 0;
		}

		function GoogleMapDistance(YourLatLong,DestLatLong,DestID,DestNama,DestGelar,item)
			{
			    var service = new google.maps.DistanceMatrixService();
			    service.getDistanceMatrix(
			    {
				    origins: [YourLatLong],
				    destinations: DestLatLong,
				    travelMode: google.maps.TravelMode.DRIVING,
				    unitSystem: google.maps.UnitSystem.METRIC,
				    avoidHighways: false,
				    avoidTolls: false
			    }, function callback(response, status)
				    {
				        if (status != google.maps.DistanceMatrixStatus.OK) {
				            alert('Error was: ' + status);
				        }
				        else {
					        var origins = response.originAddresses;
					        var destinations = response.destinationAddresses;
					        var outputDiv = document.getElementById(item);
					        outputDiv.innerHTML = '';
					        var array = [];
					          for (var i = 0; i < origins.length; i++)
					          {
					              var results = response.rows[i].elements;
					              for (var j = 0; j < results.length; j++)
					              {
					                  var element = results[j];
					                  array.push({ nama: DestNama[j], gelar: DestGelar[j], idt: DestID[j], from: origins[i], to: destinations[j], distance: element.distance.text, duration: element.duration.text });
					              }
					          }
					        array.sort(compare);
					        for (var i = 0; i < array.length; i++) {
					        	outputDiv.innerHTML += "<tr><a href=" + '"' + "<?php echo base_url('maps'); ?>" + "/" + array[i].gelar + "/" + array[i].nama + "/" + array[i].idt + '"' + ">" + array[i].nama + ', ' + array[i].gelar + ', ' + array[i].to + ': ' + array[i].distance + "&nbsp; (<i>" + array[i].duration + "</i>)" + '</a></tr>';
					        }
				        }
				    }
				)
			}

		navigator.geolocation.getCurrentPosition(function(position) {
			var YourLatLong = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
			var DestLatLong1 = [];
			var DestID = [];
			var DestNama = [];
			var DestGelar = [];
			<?php foreach ($places as $places_item){ ?>
				DestID.push(<?php echo '"'.$places_item['IDT'].'"'?>);
				DestNama.push(<?php echo '"'.$places_item['EMAIL'].'"'?>);
				DestGelar.push(<?php echo '"'.$places_item['GELAR'].'"'?>);
				<?php if(!empty($places_item['KODEPOS'])){ ?>
					DestLatLong1.push(<?php echo '"'.$places_item['NAMATPRAKTEK'].', '.$places_item['KOTA'].', '.$places_item['PROVINSI'].', '.$places_item['KODEPOS'].'"'?>);
				<?php } ?>
				<?php if(empty($places_item['KODEPOS'])){ ?>
					DestLatLong1.push(<?php echo '"'.$places_item['NAMATPRAKTEK'].', '.$places_item['KOTA'].', '.$places_item['PROVINSI'].'"'?>);
				<?php }
			} ?>
				    
			GoogleMapDistance(YourLatLong,DestLatLong1,DestID,DestNama,DestGelar,"listmap");
		});
	</script>