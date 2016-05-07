var geocoder = new google.maps.Geocoder();
var lat = 19.088052;
var lng = -104.297455;

function geocodePosition(pos) {
	geocoder.geocode({
		latLng: pos
		}, function(responses) {
			if (responses && responses.length > 0) {
				updateMarkerAddress(responses[0].formatted_address);
			} else {
				updateMarkerAddress('Cannot determine address at this location.');
			}
		}
	);
}

function updateMarkerStatus(str) {
	document.getElementById('markerStatus').innerHTML = str;
}

function updateMarkerPosition(latLng) {
	document.getElementById('info').innerHTML = [
		latLng.lat(),
		latLng.lng()
	].join(', ');

	// INPUTS
	document.getElementById('markerLat').value = latLng.lat();
	document.getElementById('markerLng').value = latLng.lng();
}

function updateMarkerAddress(str) {
  document.getElementById('adress').innerHTML = str;

  document.getElementById('direccion').value = str;
}

function initLat(lat){

	if (init != "a") {
		lat = document.getElementById('dbLat').value;
	}

	return lat;
}

function initLng(lng){

	if (init != "a") {
		lng = document.getElementById('dbLng').value;
	}

	return lng;
}

function draggable_option(){
	var draggable = true;

	if (init == "v") {
		draggable = false;
	}

	return draggable;
}

function initialize() {
	var latLng = new google.maps.LatLng(initLat(lat), initLng(lng)); // Cordenadas Manzanillo, Valle de las Garzas
	var map = new google.maps.Map(document.getElementById('map'), {
		zoom: 15,
		center: latLng,
		mapTypeId: google.maps.MapTypeId.ROADMAP
  	});

	var marker = new google.maps.Marker({
		position: latLng,
		title: 'Point A',
		map: map,
		draggable: draggable_option() //Draggable False True
	});

	// Update current position info.
	updateMarkerPosition(latLng);
	geocodePosition(latLng);

	// Add dragging event listeners.
	google.maps.event.addListener(marker, 'dragstart', function() {
		updateMarkerAddress('Arrastrando...');
	});

	google.maps.event.addListener(marker, 'drag', function() {
		updateMarkerStatus('Arrastrando...');
		updateMarkerPosition(marker.getPosition());
	});

	google.maps.event.addListener(marker, 'dragend', function() {
		updateMarkerStatus('Arrastrado finalizado');
		geocodePosition(marker.getPosition());
	});
}


// Onload handler to fire off the app.
google.maps.event.addDomListener(window, 'load', initialize);