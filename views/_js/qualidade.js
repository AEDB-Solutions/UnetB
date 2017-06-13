$(document).ready( function(){

	var lat;
	var long;

	var options = {
		enableHighAccuracy: true
	};
	
	navigator.geolocation.getCurrentPosition(success, error, options);
	
	function success(pos) {
	
		lat  = pos.coords.latitude;
		long = pos.coords.longitude;
		console.log('Sua posição atual é:');
		console.log('Latitude : ' + lat);
		console.log('Longitude: ' + long);
		console.log('Mais ou menos ' + pos.coords.accuracy + ' metros.');
		$('#botao_qualidade').click(function(){
	
			$.ajax({
				url: '../controllers/qualidade-controller.php',
				method: 'post',
				data: {lat: lat, long: long},
				dataType:"json",

				success: function(data){

					parametros = data;
					$('#dado-download').html(data['download']);
					$('#dado-upload').html(data['upload']);
					$('#dado-intensity').html(data['intensity']);
					$('#dado-latency').html(data['latency']);
					$('#dado-packetloss').html(data['packetloss']);
					$('#dado-jitter').html(data['jitter']);
				},

				beforeSend: function(){
					$('#botao_qualidade').prop("disabled",true);
					$('#gif_qualidade').show();
				},

				complete: function(){
					$('#botao_qualidade').prop("disabled",false);
					$('#gif_qualidade').hide();
				},
				
			});
		});
	};

	function error(err) {
		$('#botao_qualidade').button('loading')
		console.warn('ERROR(' + err.code + '): ' + err.message);
		
	};

	function formataErro(elemento,texto){
		elemento.innerHTML = "<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>" + texto;
		elemento.style.display = 'block';
	}
});




