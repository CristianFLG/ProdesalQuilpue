
var map = '';
var center;

function initialize() 
{

    var mapOptions = {
        zoom: 100,
        center: null,
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
    function coordenadas(position) 
    {
        latitud = position.coords.latitude; /*Guardamos nuestra latitud*/
        longitud = position.coords.longitude; /*Guardamos nuestra longitud*/
        cargarMapa();
    }
    
    if(productores != null)
    {
        for (var i = 0; i < productores["data"].length; i++) 
        {
            for(var j=0 ; j < productores.data[i]["imagen"].length ; j++)
            {  
                for (var r = 0; r < rubros.length; r++) 
                {

                    markers[i] = 
                    [
                        productores.data[i].nombre, 
                        productores.data[i].lat, 
                        productores.data[i].lon
                    ]
            
                    if(rubros[r].id == productores.data[i].id_rubro)
                    {
                        infoWindowContent[i] = 
                        [
                            '<div class="col-sm-4">' +
                            '<p><img src="'+productores.data[i]['imagen'][j].url_img+'" width="80px" height="80px"></p>' + 
                            '</div>'+
                            '<div class="info_content col-sm-8">' +
                            '<h4><a href="../personas/'+productores.data[i].id+'">'+productores.data[i].nombre+'</a></h4>' +

                            '<h4>'+rubros[r].nombre_rubro+'</h4>'+
                            '<p>Abrir en: <a href="https://www.waze.com/ul?ll='+productores.data[i].lat+'%2C'+productores.data[i].lon+'&navigate=yes&zoom=17" target="_blank"><b>Waze</b></a>'+
                            ' o <a href="https://www.google.es/maps?q='+productores.data[i].lat+','+productores.data[i].lon+'&navigate=yes&zoom=17" target="_blank"><b>Map</b></a></p>'+
                            '</div>'
                        ]
                    }
                }
            }
        }
    }
    else
    {
        if(eventos != null)//eventos
        {
            for (var i = 0; i < eventos["data"].length; i++) 
            {
                for(var j=0 ; j < eventos.data[i]["imagens"].length ; j++)
                {  
                    markers[i] = 
                    [
                        eventos.data[i].ubicacion, 
                        eventos.data[i].lat,
                        eventos.data[i].lon
                    ]

                    infoWindowContent[i] = 
                    [
                        '<div class="col-sm-4">' +
                        '<p><img src="'+eventos.data[i]['imagens'][j].url_img+'" width="80px" height="80px"></p>' + 
                        '</div>'+
                        '<div class="info_content col-sm-8">' +
                        '<h4>'+eventos.data[i].titulo+'</h4>' +   
                        '<p>Abrir en: <a href="https://www.waze.com/ul?ll='+eventos.data[i].lat+'%2C'+eventos.data[i].lon+'&navigate=yes&zoom=17" target="_blank"><b>Waze</b></a>'+
                        ' o <a href="https://www.google.es/maps?q='+eventos.data[i].lat+','+eventos.data[i].lon+'&navigate=yes&zoom=17" target="_blank"><b>Map</b></a></p>'+
                        '</div>'
                    ]
                }
            }
        }
    }
    var bounds = new google.maps.LatLngBounds();
    var infoWindow = new google.maps.InfoWindow(), marker, i;
   
  

    for( var i = 0; i < markers.length; i++ ) 
    {
        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
        bounds.extend(position);
        if(productor!=null)
        {
            if(productor.nombre == markers[i][0])
            {
                var icono = 
                    {
                        url: "../images/icono.png", // url
                        scaledSize: new google.maps.Size(50, 50), // scaled size
                        origin: new google.maps.Point(0,0), // origin
                        anchor: new google.maps.Point(0, 0) // anchor
                    };
            }else
                {
                    var icono = 
                    {
                    url: "../images/icono_general.png", // url
                    scaledSize: new google.maps.Size(50, 50), // scaled size
                    origin: new google.maps.Point(0,0), // origin
                    anchor: new google.maps.Point(0, 0) // anchor
                    };  
                }
        }
        else
            {
                var icono = 
                {
                    url: "../images/icono_general.png", // url
                    scaledSize: new google.maps.Size(50, 50), // scaled size
                    origin: new google.maps.Point(0,0), // origin
                    anchor: new google.maps.Point(0, 0) // anchor
                };  
        }

        marker = new google.maps.Marker(
        {
            position: position,
            map: map,
            title: markers[i][0],
            icon:icono
            
        }
        );
        // Add info window to marker    
        google.maps.event.addListener(marker, 'click', (function(marker, i) 
        {
            return function() 
            {
                infoWindow.setContent(infoWindowContent[i][0]);
                infoWindow.open(map, marker);
            }
        })(marker, i));
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

    
