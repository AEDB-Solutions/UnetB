var map, heatmap, infoWindow;
var gradient = [
	'rgba(255, 0  , 0  , 0)', //Resto do mapa

	'rgba(255, 0  , 0  , 1)', //Vermelho
	'rgba(255, 25 , 0  , 1)',
	'rgba(255, 50 , 0  , 1)',
	'rgba(255, 75 , 0  , 1)',
	'rgba(255, 100, 0  , 1)',
	'rgba(255, 125, 0  , 1)',
	'rgba(255, 150, 0  , 1)',
	'rgba(255, 175, 0  , 1)',
	'rgba(255, 200, 0  , 1)',
	'rgba(255, 225, 0  , 1)',

	'rgba(255, 255, 0  , 1)', //Amarelo

	'rgba(225, 255, 0  , 1)',
	'rgba(200, 255, 0  , 1)',
	'rgba(175, 255, 0  , 1)',
	'rgba(150, 255, 0  , 1)',
	'rgba(125, 255, 0  , 1)',
	'rgba(100, 255, 0  , 1)',
	'rgba(75 , 255, 0  , 1)',
	'rgba(50 , 255, 0  , 1)',
	'rgba(25 , 255, 0  , 1)',
	'rgba(0  , 255, 0  , 1)'  //Verde
]

function initMap() {
	map = new google.maps.Map(document.getElementById('map'), {
		
		center: {lat: -15.763, lng: -47.869},
		zoom: 18,
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
			map.setCenter(pos);
		}, function() {
			handleLocationError(true, infoWindow, map.getCenter());
		});
	}else{
		handleLocationError(false, infoWindow, map.getCenter());
	}

	heatmap = new google.maps.visualization.HeatmapLayer({
		data: getPoints(),
		radius: 200,
		gradient: gradient,
		opacity: 0.2,
		maxIntensity: 10,
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
			{location: new google.maps.LatLng(-15.76070, -47.87050), weight: 30},
			{location: new google.maps.LatLng(-15.76150, -47.87030), weight: 10},
			{location: new google.maps.LatLng(-15.76230, -47.87010), weight: 10},
			{location: new google.maps.LatLng(-15.76310, -47.86980), weight: 10},
			{location: new google.maps.LatLng(-15.76390, -47.86930), weight: 10},
			{location: new google.maps.LatLng(-15.76470, -47.86830), weight: 10},
			{location: new google.maps.LatLng(-15.76550, -47.86690), weight: 10},
		];
}