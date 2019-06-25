function initMap() {
  navigator.geolocation.getCurrentPosition(function (position) {
    var origin = new google.maps.LatLng(
     /*position.coords.latitude,
     position.coords.longitude*/
      -12.0240527, -77.1142247
    );
    var destination = new google.maps.LatLng(
      -11.956821, -77.0798796
    );
    createMap(origin, destination);
  }, onError);
}

function createMap(origin, destination) {
  var mapData = {
    zoom: 13,
    center: origin,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }
  
  // creamos el mapa y el marcador
  var map = new google.maps.Map(document.getElementById('map'), mapData);
  var originMarker = createMarker(map, origin, 'Tu estás aquí');
  var destinationMarker = createMarker(map, destination, 'Estamos aquí', true);
  
  // vamos a dibujar la ruta cuando se haga click en '¿Cómo llegar?'
  var howArrive = document.getElementById('how-arrive');
  howArrive.addEventListener('click', function() {
    drawRoute(map, origin, destination);
    originMarker.setMap(null);
    destinationMarker.setMap(null);
  });
}

function createMarker(map, position, title, isDestination) {
  var marker = new google.maps.Marker({
    map: map,
    draggable: true, // permite moverse
    animation: google.maps.Animation.BOUNCE,
    position: position,
    title: title
  });
  // si se va a crear el marcador destino, entonces
  // se le pone un marcador personalizado (amarillo)
  if(isDestination) {
    marker.setIcon('https://i.imgur.com/TFDuAHr.png?1');
  }
  return marker;
}

function drawRoute(map, origin, destination) {
  var directionsService = new google.maps.DirectionsService();
  var directionsDisplay = new google.maps.DirectionsRenderer();
  
  directionsDisplay.setMap(map);
  directionsService.route({
    origin: origin,
    destination: destination,
    // puedes escoger entre 'WALKING', 'TRANSIT' y 'BICYCLING'
    travelMode: 'DRIVING'
  }, function(response, status) {
    if(status === 'OK') {
      directionsDisplay.setDirections(response);
    } else {
      alert('No se pudo establecer el recorrido. ', status);
    }
  });
}

function onError(err) {
  console.log(err);
}