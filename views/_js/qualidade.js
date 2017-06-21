var salvaPerfil;
$(document).ready( function(){
	$('#botao_qualidade').click(function(){

		navigator.geolocation.getCurrentPosition(success, error, {enableHighAccuracy: true});

		if (document.getElementById("salvaPerfil").checked)
			salvaPerfil = true;
		else
			salvaPerfil = false;
		
		function success(pos){
			
			console.log('Sua posição atual é:');
			console.log('	Latitude : ' + pos.coords.latitude);
			console.log('	Longitude: ' + pos.coords.longitude);
			console.log('	Precisão : ' + pos.coords.accuracy + ' metros.');

			$.ajax({ // Testando Download ***************************************
				url: '../controllers/qualidade/download.php',
				method: 'post',
				dataType:"json",
				timeout: 60000,	
				beforeSend: function(){
					$('#botao_qualidade').prop("disabled",true);
					$('#gif_qualidade').show();
				},
				error: function(jqXHR, exception){
					if(exception == 'timeout'){
						caixa_qualidade = document.getElementById('msg-qualidade');
						caixa_qualidade.className = 'msg-erro';
						formataErro(caixa_qualidade,' Tempo máximo de teste ultrapassado. Tente novamente.');
					}else{
						caixa_qualidade = document.getElementById('msg-qualidade');
						caixa_qualidade.className = 'msg-erro';
						formataErro(caixa_qualidade,' Ocorreu um erro interno. Tente novamente');
					}
					$('#botao_qualidade').prop("disabled",false);
					$('#gif_qualidade').hide();
				},
				success: function(download){
					$('#dado-download').html(download['download']);

					$.ajax({ // Testando Upload ***************************************
						url: '../controllers/qualidade/upload.php',
						method: 'post',
						dataType:"json",
						timeout: 30000,
						error: function(jqXHR, exception){
							if(exception == 'timeout'){
								caixa_qualidade = document.getElementById('msg-qualidade');
								caixa_qualidade.className = 'msg-erro';
								formataErro(caixa_qualidade,' Tempo máximo de teste ultrapassado. Tente novamente.');
							}else{
								caixa_qualidade = document.getElementById('msg-qualidade');
								caixa_qualidade.className = 'msg-erro';
								formataErro(caixa_qualidade,' Ocorreu um erro interno. Tente novamente');
							}
							$('#botao_qualidade').prop("disabled",false);
							$('#gif_qualidade').hide();
						},
						success: function(upload){
							$('#dado-upload').html(upload['upload']);

							$.ajax({ // Testando Ping ***************************************
								url: '../controllers/qualidade/latency.php',
								method: 'post',
								dataType:"json",
								timeout: 20000,
								error: function(jqXHR, exception){
									if(exception == 'timeout'){
										caixa_qualidade = document.getElementById('msg-qualidade');
										caixa_qualidade.className = 'msg-erro';
										formataErro(caixa_qualidade,' Tempo máximo de teste ultrapassado. Tente novamente.');
									}else{
										caixa_qualidade = document.getElementById('msg-qualidade');
										caixa_qualidade.className = 'msg-erro';
										formataErro(caixa_qualidade,' Ocorreu um erro interno. Tente novamente');
									}
									$('#botao_qualidade').prop("disabled",false);
									$('#gif_qualidade').hide();
								},
								success: function(ping){
									$('#dado-latency').html(ping['latency']);
									$('#dado-jitter').html(ping['jitter']);

									$.ajax({ // Testando Intencidade ***************************************
										url: '../controllers/qualidade/intensity.php',
										method: 'post',
										dataType:"json",
										timeout: 20000,
										error: function(jqXHR, exception){
											if(exception == 'timeout'){
												caixa_qualidade = document.getElementById('msg-qualidade');
												caixa_qualidade.className = 'msg-erro';
												formataErro(caixa_qualidade,' Tempo máximo de teste ultrapassado. Tente novamente.');
											}else{
												caixa_qualidade = document.getElementById('msg-qualidade');
												caixa_qualidade.className = 'msg-erro';
												formataErro(caixa_qualidade,' Ocorreu um erro interno. Tente novamente');
											}
											$('#botao_qualidade').prop("disabled",false);
											$('#gif_qualidade').hide();
										},
										success: function(intensity){
											$('#dado-intensity').html(intensity['intensity']);

											$.ajax({ // Testando Perda de Pacotes **********************************
												url: '../controllers/qualidade/packetloss.php',
												method: 'post',
												dataType:"json",
												timeout: 20000,
												error: function(jqXHR, exception){
													if(exception == 'timeout'){
														caixa_qualidade = document.getElementById('msg-qualidade');
														caixa_qualidade.className = 'msg-erro';
														formataErro(caixa_qualidade,' Tempo máximo de teste ultrapassado. Tente novamente.');
													}else{
														caixa_qualidade = document.getElementById('msg-qualidade');
														caixa_qualidade.className = 'msg-erro';
														formataErro(caixa_qualidade,' Ocorreu um erro interno. Tente novamente');
													}
													$('#botao_qualidade').prop("disabled",false);
													$('#gif_qualidade').hide();
												},
												success: function(packetloss){
													$('#dado-packetloss').html(packetloss['packetloss']);

													$.ajax({ // Enviando dados para o banco de dados
														url: '../controllers/qualidade-controller.php',
														method: 'post',
														dataType:"json",
														timeout: 20000,
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
															
															if (data['resultado'] == "gravado"){
																caixa_qualidade = document.getElementById('msg-qualidade');
																caixa_qualidade.className = 'msg-success';
																formataSuccess(caixa_qualidade,' Teste realizado com sucesso e gravado no banco');
															}else if (data['resultado'] == "fora do limite"){
																caixa_qualidade = document.getElementById('msg-qualidade');
																caixa_qualidade.className = 'msg-warning';
																formataWarning(caixa_qualidade,' Teste realizado com sucesso mas fora dos limites para gravar no banco de dados');
															}															
														},
														complete: function(){
															$('#botao_qualidade').prop("disabled",false);
															$('#gif_qualidade').hide();
														},
													});	// FIM ENVIANDO DADOS PARA O BANCO DE DADOS **********************
												},
											}); // FIM PERDA DE PACOTES ***************************************
										},
									}); // FIM INTENCIDADE ***************************************
								},
							}); // FIM PING/JITTER ***************************************
						},
					}); // FIM UPLOAD ***************************************
				},
			}); // FIM DOWNLOAD ***************************************
		};

		function error(err){
			$('#botao_qualidade').prop("disabled",true);
			console.warn('ERROR(' + err.code + '): ' + err.message);
			formataErro(document.getElementById('msg-qualidade')," O teste não pode ser realizado pois a localização não está habilitada.")			
		};

		/* Função para formatar as mansagens de erro*/
		function formataErro(elemento,texto){
			elemento.innerHTML = "<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>" + texto;
			elemento.style.display = 'block';
		}

		/* Função para formatar as mansagens de sucesso*/
		function formataSuccess(elemento,texto){
			elemento.innerHTML = "<span class='glyphicon glyphicon glyphicon-ok' aria-hidden='true'></span>" + texto;
			elemento.style.display = 'block';
		}

		/* Função para formatar as mansagens de aviso*/
		function formataWarning(elemento,texto){
			elemento.innerHTML = "<span class='glyphicon glyphicon-warning-sign' aria-hidden='true'></span>" + texto;
			elemento.style.display = 'block';
		}
	});
});