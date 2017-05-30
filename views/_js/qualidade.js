$(document).ready( function(){





	var lat;
	var long;
	var options = {
		enableHighAccuracy: true,
		timeout: 5000,
		maximumAge: 120000
	};

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

				success: function(data){

					alert(data);
				},

				beforeSend: function(){
					$('#botao_qualidade').button('loading')			
				},

				complete: function(){
					$('#botao_qualidade').button('reset')
				}
			});
		});
	};

	function error(err) {
		$('#botao_qualidade').button('loading')
		console.warn('ERROR(' + err.code + '): ' + err.message);
		formataErro(document.getElementById('msg-qualidade')," Não é possível fazer o teste. Por favor, habilite a localização para continuar.");
	};

	navigator.geolocation.getCurrentPosition(success, error, options);

});




function formataErro(elemento,texto){
	elemento.innerHTML = "<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>" + texto;
	elemento.style.display = 'block';
}