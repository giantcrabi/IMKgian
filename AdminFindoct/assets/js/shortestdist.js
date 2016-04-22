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
			        	outputDiv.innerHTML += '<p><a href="' + array[i].idt + '">' + array[i].to + ': ' + array[i].distance + "&nbsp; (<i>" + array[i].duration + "</i>)" + '</a></p>';
			        }
		        }
		    }
		)
	}

navigator.geolocation.getCurrentPosition(function(position) {
	var YourLatLong = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
	var DestLatLong1 = [
                "Rumah Sakit Mitra Keluarga, Surabaya, Jawa Timur, 60187",
		    	"Rumah Sakit Siloam, Surabaya, Jawa Timur, 60281"
		    ];
	var DestID = ['1','2'];
	//<?php foreach ($places as $places_item){ ?>
	//	DestID.push(<?php echo '"'.$places_item['IDT'].'"'?>);
	//	DestLatLong1.push(<?php echo '"'.$places_item['NAMAT'].', '.$places_item['ALAMAT'].', '.$places_item['KOTA'].', '.$places_item['PROVINSI'].', '.$places_item['KODE POS'].'"'?>);
	//<?php } ?>
		    
	GoogleMapDistance(YourLatLong,DestLatLong1,DestID,"listmap");
});