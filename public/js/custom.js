
var map = '';
var center;

function initialize() 
{
    var mapOptions = {
      zoom: 16,
      center: new google.maps.LatLng(-33.1686941,-71.1516272),
      scrollwheel: false,
      mapTypeId:'satellite'
    };
   
    map = new google.maps.Map(document.getElementById('map-canvas'),  mapOptions);

    google.maps.event.addDomListener(map, 'idle', function() {
        calculateCenter();
    });
  
    google.maps.event.addDomListener(window, 'resize', function() {
        map.setCenter(center);
       
    });

    new google.maps.Marker(
    {
      position:{lat:-33.1686941,lng:-71.1516272},
      map:map,
      icon:'/images/icono_person.png'
    });
    

    coordenadas();
}

function coordenadas()
{
  var coord = document.getElementById('tablacoord').value;
  var valor = document.getElementByID("divcontenido").innerHTML;
  for (var i = valor.length - 1; i >= 0; i--) 
  {
    window.alert(valor[i]);
  }
  
}

function calculateCenter() 
{
  center = map.getCenter();
}

function loadGoogleMap()
{
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDUTM3gGYTde1pDRWzjXIJVuIqYQCYS_tQ&v=3.exp&sensor=false&' + 'callback=initialize';
    document.body.appendChild(script);
}

// SLIDER
$(function(){
  /* FlexSlider */
  $('.flexslider').flexslider({
      animation: "fade",
      directionNav: false
  });

  new WOW().init();

  loadGoogleMap();
});


