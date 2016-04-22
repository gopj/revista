var map;
var zoomLevel;
var marker;

function initialize() {

    var myLatlng = new google.maps.LatLng(19.088052, -104.297455);
    var myOptions = {
        zoom: 15,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
    }


    var map = new google.maps.Map(document.getElementById('map_canvas'), myOptions);
    var zoomLevel = map.getZoom();

    marker = new google.maps.Marker({
        position: myLatlng,
        map: map,
        draggable: true
    });

    // Update current position info.
    updateMarkerPosition(myLatlng);

    // Add dragging event listeners.
    google.maps.event.addListener(marker, 'dragstart', function() {
        updateMarkerAddress('Dragging...');
    });

    google.maps.event.addListener(map, 'zoom_changed', function() {
        updateZoomLevel(map.getZoom());
    });

    google.maps.event.addListener(marker, 'drag', function() {
        updateMarkerStatus('Dragging...');
        updateMarkerPosition(marker.getPosition());
    });

    google.maps.event.addListener(marker, 'dragend', function() {
        updateMarkerStatus('Drag ended');
        geocodePosition(marker.getPosition());
    });
};

var geocoder = new google.maps.Geocoder();

function geocodePosition(pos) {
    geocoder.geocode({
        latLng: pos
    }, function(responses) {
        if (responses && responses.length > 0) {
            updateMarkerAddress(responses[0].formatted_address);
        } else {
            updateMarkerAddress('Cannot determine address at this location.');
        }
    });
}

function updateZoomLevel(zoomLevel) {
    document.getElementById('zoomLevel').innerHTML = zoomLevel;

}

function updateMarkerStatus(str) {
    document.getElementById('markerStatus').innerHTML = str;
}

function updateMarkerPosition(myLatlng) {
    document.getElementById('info').innerHTML = [
        myLatlng.lat(),
        myLatlng.lng()
        ].join(', ');
}

function updateMarkerAddress(str) {
    document.getElementById('address').innerHTML = str;
}

function moveMarker() {
    var lat = parseFloat(document.getElementById('markerLat').value);
    var lng = parseFloat(document.getElementById('markerLng').value);
    var newLatLng = new google.maps.LatLng(lat, lng);
    marker.setPosition(newLatLng)
}


google.maps.event.addDomListener(window, 'load', initialize);var map;
var zoomLevel;
var marker;


function initialize() {
    var myLatlng = new google.maps.LatLng(19.088052, -104.297455);
    var myOptions = {
        zoom: 15,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
    }


    var map = new google.maps.Map(document.getElementById('map_canvas'), myOptions);
    var zoomLevel = map.getZoom();

    marker = new google.maps.Marker({
        position: myLatlng,
        map: map,
        draggable: true
    });

    // Update current position info.
    updateMarkerPosition(myLatlng);

    // Add dragging event listeners.
    google.maps.event.addListener(marker, 'dragstart', function() {
        updateMarkerAddress('Dragging...');
    });

    google.maps.event.addListener(map, 'zoom_changed', function() {
        updateZoomLevel(map.getZoom());
    });

    google.maps.event.addListener(marker, 'drag', function() {
        updateMarkerStatus('Dragging...');
        updateMarkerPosition(marker.getPosition());
    });

    google.maps.event.addListener(marker, 'dragend', function() {
        updateMarkerStatus('Drag ended');
        geocodePosition(marker.getPosition());
    });
};

var geocoder = new google.maps.Geocoder();

function geocodePosition(pos) {
    geocoder.geocode({
        latLng: pos
    }, function(responses) {
        if (responses && responses.length > 0) {
            updateMarkerAddress(responses[0].formatted_address);
        } else {
            updateMarkerAddress('Cannot determine address at this location.');
        }
    });
}

function updateZoomLevel(zoomLevel) {
    document.getElementById('zoomLevel').innerHTML = zoomLevel;

}

function updateMarkerStatus(str) {
    document.getElementById('markerStatus').innerHTML = str;
}

function updateMarkerPosition(myLatlng) {
    document.getElementById('info').innerHTML = [
        myLatlng.lat(),
        myLatlng.lng()
    ].join(', ');
}

function updateMarkerAddress(str) {
    document.getElementById('address').innerHTML = str;
}

function moveMarker() {
    var lat = parseFloat(document.getElementById('markerLat').value);
    var lng = parseFloat(document.getElementById('markerLng').value);
    var newLatLng = new google.maps.LatLng(lat, lng);
    marker.setPosition(newLatLng)
}


google.maps.event.addDomListener(window, 'load', initialize);
