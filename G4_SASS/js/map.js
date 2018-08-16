google.maps.event.addDomListener(window, 'load', init);
function init() {
  var mapOptions = {
    zoom: 11,

    center: new google.maps.LatLng(25.0339687, 121.5622835), // New York

    styles: [{ "featureType": "landscape", "elementType": "all", "stylers": [{ "color": "#fffbf0" }] }, { "featureType": "poi", "elementType": "all", "stylers": [{ "visibility": "off" }] }, { "featureType": "road", "elementType": "all", "stylers": [{ "saturation": -100 }, { "lightness": 45 }] }, { "featureType": "road.highway", "elementType": "all", "stylers": [{ "visibility": "simplified" }] }, { "featureType": "road.highway", "elementType": "geometry", "stylers": [{ "color": "#fcc00c" }] }, { "featureType": "road.arterial", "elementType": "labels.icon", "stylers": [{ "visibility": "off" }] }, { "featureType": "transit", "elementType": "all", "stylers": [{ "visibility": "off" }] }, { "featureType": "water", "elementType": "all", "stylers": [{ "color": "#fcc00c" }, { "visibility": "on" }] }]
  };

  var mapElement = document.getElementById('map');

  var map = new google.maps.Map(mapElement, mapOptions);

  var marker = new google.maps.Marker({
    position: new google.maps.LatLng(40.6700, -73.9400),
    map: map,
  });
}