var map, heatmap, infoWindow,dados;
var heatmapData = [];
var gradient = [
	'rgba(255, 0  , 0  , 0.00)', //Resto do mapa

	'rgba(255, 0  , 0  , 0.70)', //Vermelho
	'rgba(255, 45 , 0  , 0.70)',
	'rgba(255, 90 , 0  , 0.73)',
	'rgba(255, 150, 0  , 0.76)',
	'rgba(255, 195, 0  , 0.79)',
	'rgba(255, 225, 0  , 0.82)',

	'rgba(255, 255, 0  , 0.80)', //Amarelo

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
	var desiredRadiusPerPointInMeters = 280;
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

// **********************************  PLOTANDO MAPA  **********************************

function initMap() {

	map = new google.maps.Map(document.getElementById('map'), {
		center: {lat: -15.760, lng: -47.866},
		zoom: 20,
		mapTypeControl: false,
		streetViewControl: false
	});

	var infoWindow = new google.maps.InfoWindow({map: map});

	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(
			function(position) {
				var pos = {
					lat: position.coords.latitude,
					lng: position.coords.longitude
				};
				map.setCenter(pos);
			},
			
			function() {
				locationError(true, infoWindow, map.getCenter());
			},
			
			{enableHighAccuracy: true}
		);
	}else{
		locationError(false, infoWindow, map.getCenter());
	}

	// var pontosLat = [-15.7452,-15.7454,-15.7456,-15.7458,-15.746,-15.7462,-15.7464,-15.7466,-15.7468,-15.747,-15.7472,-15.7474,-15.7476,-15.7478,-15.748,-15.7482,-15.7484,-15.7486,-15.7488,-15.749,-15.7492,-15.7494,-15.7496,-15.7498,-15.75,-15.7502,-15.7504,-15.7506,-15.7508,-15.751,-15.7512,-15.7514,-15.7516,-15.7518,-15.752,-15.7522,-15.7524,-15.7526,-15.7528,-15.753,-15.7532,-15.7534,-15.7536,-15.7538,-15.754,-15.7542,-15.7544,-15.7546,-15.7548,-15.755,-15.7552,-15.7554,-15.7556,-15.7558,-15.756,-15.7562,-15.7564,-15.7566,-15.7568,-15.757,-15.7572,-15.7574,-15.7576,-15.7578,-15.758,-15.7582,-15.7584,-15.7586,-15.7588,-15.759,-15.7592,-15.7594,-15.7596,-15.7598,-15.76,-15.7602,-15.7604,-15.7606,-15.7608,-15.761,-15.7612,-15.7614,-15.7616,-15.7618,-15.762,-15.7622,-15.7624,-15.7626,-15.7628,-15.763,-15.7632,-15.7634,-15.7636,-15.7638,-15.764,-15.7642,-15.7644,-15.7646,-15.7648,-15.765,-15.7652,-15.7654,-15.7656,-15.7658,-15.766,-15.7662,-15.7664,-15.7666,-15.7668,-15.767,-15.7672,-15.7674,-15.7676,-15.7678,-15.768,-15.7682,-15.7684,-15.7686,-15.7688,-15.769,-15.7692,-15.7694,-15.7696,-15.7698,-15.77,-15.7702,-15.7704,-15.7706,-15.7708,-15.771,-15.7712,-15.7714,-15.7716,-15.7718,-15.772,-15.7722,-15.7724,-15.7726,-15.7728,-15.773,-15.7732,-15.7734,-15.7736,-15.7738,-15.774,-15.7742,-15.7744,-15.7746,-15.7748,-15.775,-15.7752,-15.7754,-15.7756,-15.7758];
	// var pontosLng = [-47.8768,-47.8766,-47.8764,-47.8762,-47.876,-47.8758,-47.8756,-47.8754,-47.8752,-47.875,-47.8748,-47.8746,-47.8744,-47.8742,-47.874,-47.8738,-47.8736,-47.8734,-47.8732,-47.873,-47.8728,-47.8726,-47.8724,-47.8722,-47.872,-47.8718,-47.8716,-47.8714,-47.8712,-47.871,-47.8708,-47.8706,-47.8704,-47.8702,-47.87,-47.8698,-47.8696,-47.8694,-47.8692,-47.869,-47.8688,-47.8686,-47.8684,-47.8682,-47.868,-47.8678,-47.8676,-47.8674,-47.8672,-47.867,-47.8668,-47.8666,-47.8664,-47.8662,-47.866,-47.8658,-47.8656,-47.8654,-47.8652,-47.865,-47.8648,-47.8646,-47.8644,-47.8642,-47.864,-47.8638,-47.8636,-47.8634,-47.8632,-47.863,-47.8628,-47.8626,-47.8624,-47.8622,-47.862,-47.8618,-47.8616,-47.8614,-47.8612,-47.861,-47.8608,-47.8606,-47.8604,-47.8602,-47.86,-47.8598,-47.8596,-47.8594,-47.8592,-47.859,-47.8588,-47.8586,-47.8584,-47.8582,-47.858,-47.8578,-47.8576,-47.8574,-47.8572,-47.857,-47.8568,-47.8566,-47.8564,-47.8562,-47.856,-47.8558,-47.8556,-47.8554,-47.8552];


	// for (var i = 0; i < pontosLng.length; i++) {
	// 	for (var j = 0; j < pontosLat.length; j++) {
	// 		var ni = i.toString();
	// 		var nj = j.toString();
	// 		var marker = new google.maps.Marker({
	// 			position: {lat: pontosLat[j], lng: pontosLng[i]},
	// 			map: map,
	// 			title: "i: " + pontosLat[j] + "j: " + pontosLng[i],
	// 		});
	// 	}
	// }

var conteudo  = "<div class='panel panel-primary' id='infowindow'>";	
	conteudo += 	"<button type='button' class='list-group-item list-group-item active' id='btn-info'><center>Click Para Analisar <img src='_images/teste.svg' id='gif_info'></center></button>";	
	conteudo += 	"<table class='table table-striped table-bordered table-condensed'>";
	conteudo +=			"<tr>	<td>Download</td>	<td id='infodownload'> - </td>	<td>Mbps</td>	</tr>";
	conteudo += 		"<tr>	<td>Upload</td>		<td id='infoupload'>   - </td>	<td>Mbps</td>	</tr>";
	conteudo += 		"<tr>	<td>Ping</td>		<td id='infoping'>     - </td>	<td>ms</td>		</tr>";
	conteudo += 	"</table";
	conteudo += "</div>";

	if($('#session').val() != 0){
		var infoWindows = [];
		map.addListener('click', function(event) {

			var lat  = event.latLng.lat();
			var long = event.latLng.lng();

			if(!(lat > -15.7452 || lat < -15.7758)  && !(long < -47.8768 || long > -47.8552)) {

				infowindow = new google.maps.InfoWindow({
					content: conteudo,
					map: map,
					position: event.latLng,
				}); infoWindows.push(infowindow);

				for (var i = 0; i < infoWindows.length -1; i++) {
					infoWindows[i].setMap(null);
				}
				$('#btn-info').click(function(){
					$('#gif_info').show();
					$.ajax({
						url: '../controllers/infoWindow-controller.php',
						method: 'post',
						dataType:"json",
						data: {lat: lat, long: long},

						success: function(data){
							if(data){
								$('#infodownload').html(data['download_speed']);
								$('#infoupload').html(data['upload_speed']);
								$('#infoping').html(data['latency']);
							}else{
								$('#infodownload').html("Sem Dados");
								$('#infoupload').html("Sem Dados");
								$('#infoping').html("Sem Dados");
							}
							$('#gif_info').hide();
							
						},
						erro: function(jqXHR, exception){
							$('#gif_info').hide();
						},
					});
				});
			}
		});
	};

	//criando o retangulo limite
	var strictBounds = new google.maps.LatLngBounds(
		new google.maps.LatLng(-15.78600, -47.88700), //SO
		new google.maps.LatLng(-15.73500, -47.84500)  //NE
	);

	google.maps.event.addListener(map, 'dragend', function() {
		if (strictBounds.contains(map.getCenter())) return;

		// movendo o mapa para dentro da área estabelecida quando fora dela
		var c = strictBounds.getCenter(),
		x = c.lng(),
		y = c.lat(),
		maxX = strictBounds.getNorthEast().lng(),
		maxY = strictBounds.getNorthEast().lat(),
		minX = strictBounds.getSouthWest().lng(),
		minY = strictBounds.getSouthWest().lat();

		if (x < minX) x = minX;
		if (x > maxX) x = maxX;
		if (y < minY) y = minY;
		if (y > maxY) y = maxY;

		map.setCenter(new google.maps.LatLng(y, x));
	});
	heatmapPlot();
}

// **********************************  PLOTANDO MAPA  **********************************

//Exibe msg de erro caso não consiga geolocalizar o usuário
function locationError(browserHasGeolocation, infoWindow, pos) {
	infoWindow.setPosition(pos);
	infoWindow.setContent(browserHasGeolocation ?
	'Erro: Serviço de Geolocalização falhou.' :
	'Erro: Seu browser não suporta Geolocalização.');
}

function heatmapPlot(){
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
					opacity: 0.6,		
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

