var map, heatmap, infoWindow;
var gradient = [
	'rgba(255, 0  , 0  , 0)', //Resto do mapa

	'rgba(255, 0  , 0  , 0.67)', //Vermelho
	'rgba(255, 45 , 0  , 0.70)',
	'rgba(255, 90 , 0  , 0.73)',
	'rgba(255, 150, 0  , 0.76)',
	'rgba(255, 195, 0  , 0.79)',
	'rgba(255, 225, 0  , 0.82)',


	'rgba(255, 255, 0  , 0.70)', //Amarelo

	'rgba(225, 255, 0  , 0.85)',
	'rgba(195, 255, 0  , 0.88)',
	'rgba(150 , 255, 0  , 0.91)',
	'rgba(90 , 255, 0  , 0.94)',
	'rgba(45 , 255, 0  , 0.97)',
	'rgba(0  , 255, 0  , 1)'  //Verde
]

function initMap() {
	map = new google.maps.Map(document.getElementById('map'), {
		
		center: {lat: -15.763, lng: -47.869},
		zoom: 16,
		mapTypeControl: false,
		streetViewControl: false
	
	});
	
	infoWindow = new google.maps.InfoWindow({map: map});

	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(function(position) {
			var pos = {
				lat: position.coords.latitude,
				lng: position.coords.longitude
			};

			infoWindow.setPosition(pos);
			infoWindow.setContent('Localização Encontrada.');
			
		}, function() {
			handleLocationError(true, infoWindow, map.getCenter());
		});
	}else{
		handleLocationError(false, infoWindow, map.getCenter());
	}

	heatmap = new google.maps.visualization.HeatmapLayer({
		
		data: getPoints(),
		radius: 50,
		gradient: gradient,
		opacity: 0.4,		
		map: map

	});
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
	infoWindow.setPosition(pos);
	infoWindow.setContent(browserHasGeolocation ?
	'Erro: Serviço de Geolocalização falhou.' :
	'Erro: Seu browser não suporta Geolocalização.');
}



function getPoints() {
	return [
			{location: new google.maps.LatLng(-15.76070, -47.87050), weight: 0},
			{location: new google.maps.LatLng(-15.76150, -47.87030), weight: 0},
			{location: new google.maps.LatLng(-15.76230, -47.87010), weight: 0},
			{location: new google.maps.LatLng(-15.76310, -47.86980), weight: 0},
			{location: new google.maps.LatLng(-15.76390, -47.86930), weight: 0},
			{location: new google.maps.LatLng(-15.76470, -47.86830), weight: 0},
			{location: new google.maps.LatLng(-15.76550, -47.86690), weight: 0},
		];
}