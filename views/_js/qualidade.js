$(document).ready( function(){
	$('#botao_qualidade').click(function(){
	
		navigator.geolocation.getCurrentPosition(success, error, {enableHighAccuracy: true});
	
		function success(pos){
			
			console.log('Sua posição atual é:');
			console.log('	Latitude : ' + pos.coords.latitude);
			console.log('	Longitude: ' + pos.coords.longitude);
			console.log('	Precisão : ' + pos.coords.accuracy + ' metros.');

			$.ajax({ // Testando Download ***************************************
				url: '../controllers/qualidade/download.php',
				method: 'post',
				dataType:"json",
				success: function(download){
					$('#dado-download').html(download['download']);

					$.ajax({ // Testando Upload ***************************************
						url: '../controllers/qualidade/upload.php',
						method: 'post',
						dataType:"json",
						success: function(upload){
							$('#dado-upload').html(upload['upload']);

							$.ajax({ // Testando Ping ***************************************
								url: '../controllers/qualidade/latency.php',
								method: 'post',
								dataType:"json",
								success: function(ping){
									$('#dado-latency').html(ping['latency']);
									$('#dado-jitter').html(ping['jitter']);

									$.ajax({ // Testando Intencidade ***************************************
										url: '../controllers/qualidade/intensity.php',
										method: 'post',
										dataType:"json",
										success: function(intensity){
											$('#dado-intensity').html(intensity['intensity']);

											$.ajax({ // Testando Perda de Pacotes **********************************
												url: '../controllers/qualidade/packetloss.php',
												method: 'post',
												dataType:"json",
												success: function(packetloss){
													$('#dado-packetloss').html(packetloss['packetloss']);
													
													$.ajax({ // Enviando dados para o banco de dados
														url: '../controllers/qualidade-controller.php',
														method: 'post',
														data:{	lat       : pos.coords.latitude,
																long      : pos.coords.longitude,
																download  : download['download'],
																upload    : upload['upload'],
																latency   : ping['latency'],
																jitter    : ping['jitter'],
																intensity : intensity['intensity'],
																packetloss: packetloss['packetloss'],
															},
														success: function(data){															
															console.log(data);
														},											
													});	// FIM ENVIANDO DADOS PARA O BANCO DE DADOS
												},

												complete: function(){
													$('#botao_qualidade').prop("disabled",false);
													$('#gif_qualidade').hide();
												},
											}); // FIM PERDA DE PACOTES ***************************************
										},
									}); // FIM INTENCIDADE ***************************************
								},
							}); // FIM PING/JITTER ***************************************
						},
					}); // FIM UPLOAD ***************************************
				},

				beforeSend: function(){
					$('#botao_qualidade').prop("disabled",true);
					$('#gif_qualidade').show();
				},

			}); // FIM DOWNLOAD ***************************************
		};

		function error(err){
			$('#botao_qualidade').prop("disabled",true);
			console.warn('ERROR(' + err.code + '): ' + err.message);
			formataErro(document.getElementById('msg-qualidade')," O teste não pode ser realizado pois a localização não está habilitada.")			
		};

		function formataErro(elemento,texto){
			elemento.innerHTML = "<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>" + texto;
			elemento.style.display = 'block';
		}
	});
});