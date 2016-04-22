<!DOCTYPE html>
<html>
<head>
	<script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jquery-2.1.3.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
	<script type="text/javascript">var centreGot = false;</script>
	<?php echo $map['js']; ?>
</head>
<body>
	<span><h1><?php echo $identitasdok['Nama'].', '.$identitasdok['Gelar'] ?></h1></span>
	<div id="contmap">
		<div id="grafikmap" style="float: left; width: 50%">
			<?php echo $map['html']; ?>
		</div>
		<div style="hidden: overflow">
			<h2>Daftar Tempat Praktek Dari Jarak Terdekat Hingga Terjauh</h2>
			<table id="listmap" style="padding: 15px">
			
			</table>
		</div>
	<div id="directionsDiv" style="clear: both"></div>
	<script>
		function compare(a,b) {
		  if (a.distance > b.distance)
		    return -1;
		  if (a.distance < b.distance)
		    return 1;
		  return 0;
		}

		function GoogleMapDistance(YourLatLong,DestLatLong,DestID,item)
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
					                  array.push({ idt: DestID[j], from: origins[i], to: destinations[j], distance: element.distance.text, duration: element.duration.text });
					              }
					          }
					        array.sort(compare);
					        for (var i = 0; i < array.length; i++) {
					        	outputDiv.innerHTML += '<tr><a href="' + array[i].idt + '">' + array[i].to + ': ' + array[i].distance + "&nbsp; (<i>" + array[i].duration + "</i>)" + '</a></tr>';
					        }
				        }
				    }
				)
			}

		navigator.geolocation.getCurrentPosition(function(position) {
			var YourLatLong = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
			var DestLatLong1 = [];
			var DestID = [];
			<?php foreach ($places as $places_item){ ?>
				DestID.push(<?php echo '"'.$places_item['IDT'].'"'?>);
				DestLatLong1.push(<?php echo '"'.$places_item['NAMAT'].', '.$places_item['KOTA'].', '.$places_item['PROVINSI'].', '.$places_item['KODEPOS'].'"'?>);
			<?php } ?>
				    
			GoogleMapDistance(YourLatLong,DestLatLong1,DestID,"listmap");
		});

	</script>
</body>
</html>