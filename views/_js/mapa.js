var map, heatmap, infoWindow;
var dados;

var heatmapData = [];
var gradient = [
	'rgba(255, 0  , 0  , 0.00)', //Resto do mapa

	'rgba(255, 0  , 0  , 0.67)', //Vermelho
	'rgba(255, 45 , 0  , 0.70)',
	'rgba(255, 90 , 0  , 0.73)',
	'rgba(255, 150, 0  , 0.76)',
	'rgba(255, 195, 0  , 0.79)',
	'rgba(255, 225, 0  , 0.82)',


	'rgba(255, 255, 0  , 0.70)', //Amarelo

	'rgba(225, 255, 0  , 0.85)',
	'rgba(195, 255, 0  , 0.88)',
	'rgba(150 , 255, 0  ,0.91)',
	'rgba(90 , 255, 0  , 0.94)',
	'rgba(45 , 255, 0  , 0.97)',
	'rgba(0  , 255, 0  , 1.00)'  //Verde
];



//********************************NÃO ALTERAR ESSAS FUNÇÕES ********************************//
var TILE_SIZE = 256;

function bound(value, opt_min, opt_max){
	if (opt_min !== null) value = Math.max(value, opt_min);
	if (opt_max !== null) value = Math.min(value, opt_max);
	return value;
}
function degreesToRadians(deg){
	return deg * (Math.PI / 180);
}
function radiansToDegrees(rad){
	return rad / (Math.PI / 180);
}
function MercatorProjection() {
	this.pixelOrigin_ = new google.maps.Point(TILE_SIZE / 2,TILE_SIZE / 2);
	this.pixelsPerLonDegree_ = TILE_SIZE / 360;
	this.pixelsPerLonRadian_ = TILE_SIZE / (2 * Math.PI);
}
MercatorProjection.prototype.fromLatLngToPoint = function (latLng,opt_point){
	var me = this;
	var point = opt_point || new google.maps.Point(0, 0);
	var origin = me.pixelOrigin_;

	point.x = origin.x + latLng.lng() * me.pixelsPerLonDegree_;

	// NOTE(appleton): Truncating to 0.9999 effectively limits latitude to
	// 89.189.  This is about a third of a tile past the edge of the world
	// tile.
	var siny = bound(Math.sin(degreesToRadians(latLng.lat())), - 0.9999,0.9999);
	point.y = origin.y + 0.5 * Math.log((1 + siny) / (1 - siny)) * -me.pixelsPerLonRadian_;
	return point;
};
MercatorProjection.prototype.fromPointToLatLng = function (point){
	var me = this;
	var origin = me.pixelOrigin_;
	var lng = (point.x - origin.x) / me.pixelsPerLonDegree_;
	var latRadians = (point.y - origin.y) / -me.pixelsPerLonRadian_;
	var lat = radiansToDegrees(2 * Math.atan(Math.exp(latRadians)) - Math.PI / 2);
	return new google.maps.LatLng(lat, lng);
};
//********************************NÃO ALTERAR ESSAS FUNÇÕES ********************************//



function getNewRadius(){
	var desiredRadiusPerPointInMeters = 500;
	var numTiles = 1 << map.getZoom();
	var center = map.getCenter();
	var moved = google.maps.geometry.spherical.computeOffset(center, 1000, 90); /*1000 meters to the right*/
	var projection = new MercatorProjection();
	var initCoord = projection.fromLatLngToPoint(center);
	var endCoord = projection.fromLatLngToPoint(moved);
	var initPoint = new google.maps.Point(initCoord.x * numTiles,initCoord.y * numTiles);
	var endPoint = new google.maps.Point(endCoord.x * numTiles,endCoord.y * numTiles);
	var pixelsPerMeter = (Math.abs(initPoint.x-endPoint.x))/10000.0;
	var totalPixelSize = Math.floor(desiredRadiusPerPointInMeters*pixelsPerMeter);
	//console.log(totalPixelSize); //Mostra o resultado no console
	return totalPixelSize;
}

function initMap() {
	map = new google.maps.Map(document.getElementById('map'), {
		
		center: {lat: -15.763, lng: -47.869},
		zoom: 16,
		mapTypeControl: false,
		streetViewControl: false
	
	});
	
	// infoWindow = new google.maps.InfoWindow({map: map});

	// if (navigator.geolocation) {
	// 	navigator.geolocation.getCurrentPosition(function(position) {
	// 		var pos = {
	// 			lat: position.coords.latitude,
	// 			lng: position.coords.longitude
	// 		};

	// 		infoWindow.setPosition(pos);
	// 		infoWindow.setContent('Localização Encontrada.');
			
	// 	}, function() {
	// 		handleLocationError(true, infoWindow, map.getCenter());
	// 	});
	// }else{
	// 	handleLocationError(false, infoWindow, map.getCenter());
	// }


	testando();
}

//Exibe msg de erro caso não consiga geolocalizar o usuário
function handleLocationError(browserHasGeolocation, infoWindow, pos) {
	infoWindow.setPosition(pos);
	infoWindow.setContent(browserHasGeolocation ?
	'Erro: Serviço de Geolocalização falhou.' :
	'Erro: Seu browser não suporta Geolocalização.');
}

function testando(){
	$(document).ready( function(){
		$.ajax({
			url: '../funcoes_de_parametrizacao/calculadora.php',
			method: 'post',
			dataType:"json",

			success: function(data){
				for (var key in data) {
					dados =	{location: new google.maps.LatLng(data[key]['lat'], data[key]['long']), weight: data[key]['peso']};
					heatmapData.push(dados);
				}

				heatmap = new google.maps.visualization.HeatmapLayer({
					data: heatmapData,
					//radius: 50,
					gradient: gradient,
					//opacity: 0.4,		
					map: map,
					radius: getNewRadius(),
				});

				google.maps.event.addListener(map, 'zoom_changed', function () {
					heatmap.setOptions({radius:getNewRadius()});
				});

			},
		});
	});	
}

