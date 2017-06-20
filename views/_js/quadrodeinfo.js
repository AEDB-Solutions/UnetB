var map = new google.maps.Map(document.getElementById('map-canvas'), options);

  var marker;
  var infowindow;
  var messagewindow;


      infowindow = new google.maps.InfoWindow({
        content: document.getElementById('form')
      })

      messagewindow = new google.maps.InfoWindow({
        content: document.getElementById('message')
      });

      google.maps.event.addListener(map, 'click', function(event) {
        var position = event.latLng;
      console.log(position)
        marker = new google.maps.Marker({
          position: position,
          map: map,
          animation: google.maps.Animation.DROP,
          draggable: true
          });
        
        google.maps.event.addListener(marker, 'click', function() {
          infowindow.open(map, marker);
          
        });
      });
    }
