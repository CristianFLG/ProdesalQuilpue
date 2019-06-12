
var map = '';
var center;

function initialize() 
{
    var mapOptions = {
      zoom: 16,
      center: new google.maps.LatLng(-33.1686941,-71.1516272),

      scrollwheel: false,
      mapTypeId: google.maps.MapTypeId.HYBRID  
    };
   
    map = new google.maps.Map(document.getElementById('map-canvas'),  mapOptions);

    google.maps.event.addDomListener(map, 'idle', function() {
        calculateCenter();
    });
  
    google.maps.event.addDomListener(window, 'resize', function() {
        map.setCenter(center);
       
    });
    coordenadas();


}



function coordenadas()
{

    var markers = [];
    var infoWindowContent = [];
  if(productores != null)
  {
    for (var i = 0; i < productores["data"].length; i++) 
    {
      for(var j=0 ; j < productores.data[i]["imagen"].length ; j++)
      {  
        markers[i] = [
        productores.data[i].nombre, 
        productores.data[i].lat, 
        productores.data[i].lon
        ]
        
        infoWindowContent[i] = 
        [
          '<div class="col-sm-4">' +
          '<p><img src="'+productores.data[i]['imagen'][j].url_img+'" width="80px" height="80px"></p>' + 
          '</div>'+
          '<div class="info_content col-sm-4">' +
          '<h4><a href="../personas/'+productores.data[i].id+'">'+productores.data[i].nombre+'</a></h4>' +
          '</div>'

        ]
      }
    }
  }
  else
      {
      if(productor != null)
        {
        markers[i] = [
        productor.data[i].nombre, 
        productor.data[i].lat, 
        productor.data[i].lon
        ]
        
        infoWindowContent[i] = 
        [
          '<div class="col-sm-4">' +
          '<p><img src="'+productor.data[i]['imagen'][j].url_img+'" width="80px" height="80px"></p>' + 
          '</div>'+
          '<div class="info_content col-sm-4">' +
          '<h4><a href="../personas/'+productor.data[i].id+'">'+productor.data[i].nombre+'</a></h4>' +
          '</div>'

        ]
      }
    }
  
      var bounds = new google.maps.LatLngBounds();
      var infoWindow = new google.maps.InfoWindow(), marker, i;
    
    // Place each marker on the map  
   for( i = 0; i < markers.length; i++ ) 
   {
        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
        bounds.extend(position);
        marker = new google.maps.Marker({
            position: position,
            map: map,
            title: markers[i][0],
            animation: google.maps.Animation.DROP
        });


        // Add info window to marker    
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infoWindow.setContent(infoWindowContent[i][0]);
                infoWindow.open(map, marker);
            }
        }),(marker, i));
        // Center the map to fit all markers on the screen
        map.fitBounds(bounds);
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

    
