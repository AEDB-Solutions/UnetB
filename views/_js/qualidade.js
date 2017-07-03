var salvaPerfil;
$(document).ready( function(){

	if($('#session').val() != 0){
		$('#salvaPerfil').show();
	}

	$('#botao_qualidade').click(function(){

		if (document.getElementById("caixaSalvaPerfil").checked){
			salvaPerfil = $('#session').val();
		}
		else{
			salvaPerfil = 0;
		}
		$('#salvaPerfil').prop("disabled",false);
		$('#botao_qualidade').prop("disabled",true);
		$('#gif_qualidade').show();
		$('#msg-qualidade').hide();

		$('#dado-download').html('-');
		$('#dado-upload').html('-');
		$('#dado-latency').html('-');
		$('#dado-jitter').html('-');
		$('#dado-intensity').html('-');
		$('#dado-packetloss').html('-');


		navigator.geolocation.getCurrentPosition(success, errors, {enableHighAccuracy: true});		
		
		function success(pos){

			$.ajax({ // Testando Download ***************************************
				url: '../controllers/qualidade/download.php',
				method: 'post',
				dataType:"json",
				//timeout: 60000,
				error: function(jqXHR, exception){
					if(exception == 'timeout'){
						caixa_qualidade = document.getElementById('msg-qualidade');
						formataErro(caixa_qualidade,' Tempo máximo de teste ultrapassado. Tente novamente.');
					}else{
						caixa_qualidade = document.getElementById('msg-qualidade');
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
						timeout: 60000,
						error: function(jqXHR, exception){
							if(exception == 'timeout'){
								caixa_qualidade = document.getElementById('msg-qualidade');
								formataErro(caixa_qualidade,' Tempo máximo de teste ultrapassado. Tente novamente.');
							}else{
								caixa_qualidade = document.getElementById('msg-qualidade');
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
										formataErro(caixa_qualidade,' Tempo máximo de teste ultrapassado. Tente novamente.');
									}else{
										caixa_qualidade = document.getElementById('msg-qualidade');
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
												formataErro(caixa_qualidade,' Tempo máximo de teste ultrapassado. Tente novamente.');
											}else{
												caixa_qualidade = document.getElementById('msg-qualidade');
												formataErro(caixa_qualidade,' Ocorreu um erro interno. Tente novamente');
											}
											$('#botao_qualidade').prop("disabled",false);
											$('#gif_qualidade').hide();
										},
										success: function(intensity){
											$('#dado-intensity').html(intensity['intensity']);
											$('#dado-level' ).html(intensity['nivel']);

											$.ajax({ // Testando Perda de Pacotes **********************************
												url: '../controllers/qualidade/packetloss.php',
												method: 'post',
												dataType:"json",
												timeout: 20000,
												error: function(jqXHR, exception){
													if(exception == 'timeout'){
														caixa_qualidade = document.getElementById('msg-qualidade');
														formataErro(caixa_qualidade,' Tempo máximo de teste ultrapassado. Tente novamente.');
													}else{
														caixa_qualidade = document.getElementById('msg-qualidade');
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
														data:{	id        : salvaPerfil,
																lat       : pos.coords.latitude,
																long      : pos.coords.longitude,
																download  : download['download'],
																upload    : upload['upload'],
																latency   : ping['latency'],
																jitter    : ping['jitter'],
																intensity : intensity['intensity'],
																packetloss: packetloss['packetloss'],
															},
														success: function(data){
															if (data["resultado"] == "gravado"){
																caixa_qualidade = document.getElementById('msg-qualidade');
																formataSuccess(caixa_qualidade,' Teste realizado com sucesso e gravado no banco');
															}else if (data["resultado"] == "fora do limite"){
																caixa_qualidade = document.getElementById('msg-qualidade');
																formataWarning(caixa_qualidade,' Teste realizado com sucesso mas fora dos limites para gravar no banco de dados');
															}
															$('#botao_qualidade').prop("disabled",false);
															$('#gif_qualidade').hide();
														},
														complete: function(){
															$('#botao_qualidade').prop("disabled",false);
															$('#gif_qualidade').hide();
														},
														error: function(jqXHR, exception){
															if(exception == 'timeout'){
																caixa_qualidade = document.getElementById('msg-qualidade');
																formataErro(caixa_qualidade,' Tempo máximo de teste ultrapassado. Tente novamente.');
															}else{
																caixa_qualidade = document.getElementById('msg-qualidade');
																formataErro(caixa_qualidade,' Ocorreu um erro interno. Tente novamente');
															}
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

		function errors(err){
			$('#botao_qualidade').prop("disabled",true);
			$('#gif_qualidade').hide();
			formataErro(document.getElementById('msg-qualidade')," O teste não pode ser realizado pois a localização não está habilitada.")			
		};

		/* Função para formatar as mansagens de erro*/
		function formataErro(elemento,texto){
			$(elemento).addClass('msg-erro');
			elemento.innerHTML = "<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>" + texto;
			elemento.style.display = 'block';
		}

		/* Função para formatar as mansagens de sucesso*/
		function formataSuccess(elemento,texto){
			$(elemento).addClass('msg-success');
			elemento.innerHTML = "<span class='glyphicon glyphicon glyphicon-ok' aria-hidden='true'></span>" + texto;
			elemento.style.display = 'block';
		}

		/* Função para formatar as mansagens de aviso*/
		function formataWarning(elemento,texto){
			$(elemento).addClass('msg-warning');
			elemento.innerHTML = "<span class='glyphicon glyphicon-warning-sign' aria-hidden='true'></span>" + texto;
			elemento.style.display = 'block';
		}
	});
});