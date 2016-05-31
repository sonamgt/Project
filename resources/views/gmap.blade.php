@extends('app')

@section('htmlheader_title')
    Google Map
@endsection

<html> 
<head> 
  <meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
  <title>Google Maps </title> 
  <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
</head> 
<body>
  <div id="map" style="width: 1200px; height: 600px;"></div>
  
  <script >
    // Define your locations: HTML content for the info window, latitude, longitude
 //   var locations = [
    //  ['<h4>Bondi Beach</h4>', -33.890542, 151.274856],
    //  ['<h4>Coogee Beach</h4>', -33.923036, 151.259052],
    //  ['<h4>Cronulla Beach</h4>', -34.028249, 151.157507],
    //  ['<h4>Manly Beach</h4>', -33.80010128657071, 151.28747820854187],
    //  ['<h4>Maroubra Beach</h4>', -33.950198, 151.259302]
  //  ];
     
    var locations		=	[
    <?php 
    
    
    foreach ($users as $user){?>
         ['<?php echo $user['academics'];?>', <?php echo $user['latitude'];?>,<?php echo $user['longitude'];?>,<?php echo $user['id'];?> ],   	
    <?php }?>
    ];
    
    // Setup the different icons and shadows
    var iconURLPrefix = 'http://maps.google.com/mapfiles/ms/icons/';
    
    var icons = [
      iconURLPrefix + 'red-dot.png',
      iconURLPrefix + 'green-dot.png',
      iconURLPrefix + 'blue-dot.png',
      iconURLPrefix + 'orange-dot.png',
      iconURLPrefix + 'purple-dot.png',
      iconURLPrefix + 'pink-dot.png',      
      iconURLPrefix + 'yellow-dot.png'
    ]
    var iconsLength = icons.length;

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 10,
      center: new google.maps.LatLng(28.613939, 28.613939),
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      mapTypeControl: false,
      streetViewControl: false,
      panControl: false,
      zoomControlOptions: {
         position: google.maps.ControlPosition.LEFT_BOTTOM
      }
    });

    var infowindow = new google.maps.InfoWindow({
      maxWidth: 160
    });

    var markers = new Array();
    
    var iconCounter = 0;
    
    // Add the markers and infowindows to the map
    for (var i = 0; i < locations.length; i++) {  
      var marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map,
        icon: icons[iconCounter],
        name: locations[i][0]
      });

      markers.push(marker);
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
           
            var url = '{{ URL::route('showInfo','location')}}';
            url = url.replace('location', locations[i][3]);
           // console.log(url);
          infowindow.setContent('<a href="'+url+'">'+locations[i][0]+'</a>');
        //  infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
      
      iconCounter++;
      // We only have a limited number of possible icon colors, so we may have to restart the counter
      if(iconCounter >= iconsLength) {
      	iconCounter = 0;
      }
    }

    function autoCenter() {
      //  Create a new viewpoint bound
      var bounds = new google.maps.LatLngBounds();
      //  Go through each...
      for (var i = 0; i < markers.length; i++) {  
				bounds.extend(markers[i].position);
      }
      //  Fit these bounds to the map
      map.fitBounds(bounds);
    }
    autoCenter();
  </script> 
</body>
</html>

