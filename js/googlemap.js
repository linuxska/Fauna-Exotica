  function initialize() {
    var latlng = new google.maps.LatLng(28.096373, -15.455629);
    var myOptions = {
      zoom: 16,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.SATELLITE
    }
    var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

    var image = 'img/logo-mapa.png';

    var myLatLng = new google.maps.LatLng(28.096873, -15.455920);
    var beachMarker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        icon: image
    });
  } 
  