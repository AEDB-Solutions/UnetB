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
	var desiredRadiusPerPointInMeters = 200;
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
	
	var pontosLng = [-15.745200,-15.745400,-15.745600,-15.745800,-15.746000,-15.746200,-15.746400,-15.746600,-15.746800,-15.747000,-15.747200,-15.747400,-15.747600,-15.747800,-15.748000,-15.748200,-15.748400,-15.748600,-15.748800,-15.749000,-15.749200,-15.749400,-15.749600,-15.749800,-15.750000,-15.750200,-15.750400,-15.750600,-15.750800,-15.751000,-15.751200,-15.751400,-15.751600,-15.751800,-15.752000,-15.752200,-15.752400,-15.752600,-15.752800,-15.753000,-15.753200,-15.753400,-15.753600,-15.753800,-15.754000,-15.754200,-15.754400,-15.754600,-15.754800,-15.755000,-15.755200,-15.755400,-15.755600,-15.755800,-15.756000,-15.756200,-15.756400,-15.756600,-15.756800,-15.757000,-15.757200,-15.757400,-15.757600,-15.757800,-15.758000,-15.758200,-15.758400,-15.758600,-15.758800,-15.759000,-15.759200,-15.759400,-15.759600,-15.759800,-15.760000,-15.760200,-15.760400,-15.760600,-15.760800,-15.761000,-15.761200,-15.761400,-15.761600,-15.761800,-15.762000,-15.762200,-15.762400,-15.762600,-15.762800,-15.763000,-15.763200,-15.763400,-15.763600,-15.763800,-15.764000,-15.764200,-15.764400,-15.764600,-15.764800,-15.765000,-15.765200,-15.765400,-15.765600,-15.765800,-15.766000,-15.766200,-15.766400,-15.766600,-15.766800,-15.767000,-15.767200,-15.767400,-15.767600,-15.767800,-15.768000,-15.768200,-15.768400,-15.768600,-15.768800,-15.769000,-15.769200,-15.769400,-15.769600,-15.769800,-15.770000,-15.770200,-15.770400,-15.770600,-15.770800,-15.771000,-15.771200,-15.771400,-15.771600,-15.771800,-15.772000,-15.772200,-15.772400,-15.772600,-15.772800,-15.773000,-15.773200,-15.773400,-15.773600,-15.773800,-15.774000,-15.774200,-15.774400,-15.774600,-15.774800,-15.775000,-15.775200,-15.775400,-15.775600,-15.775800];

	map = new google.maps.Map(document.getElementById('map'), {
		center: {lat: -15.763, lng: -47.869},
		zoom: 14,
		mapTypeControl: false,
		streetViewControl: false
	});

	function addMarker(location, map) {

		var marker = new google.maps.Marker({
			position: {lat: location, lng: -47.87700},
			map: map
		});
	}
	
	for (var i = 0; i < pontosLng.length; i++) {
		addMarker(pontosLng[i], map);
	}
	
	










	//Superior esquerdo
	var marker = new google.maps.Marker({
		position: {lat: -15.74500, lng: -47.87700},	
		map: map,
		label: "SE",
	});
	//Superior direito
	var marker = new google.maps.Marker({
		position: {lat: -15.74500, lng: -47.85500},
		map: map,
		label: "SD",
	});	
	//inferior esquerdo
	var marker = new google.maps.Marker({
		position: {lat: -15.77600, lng: -47.87700},
		map: map,
		label: "IE",
	});
	//inferior direito
	var marker = new google.maps.Marker({
		position: {lat: -15.77600, lng: -47.85500},
		map: map,
		label: "ID",
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

