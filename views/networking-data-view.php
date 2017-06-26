<!DOCTYPE html>
<html lang="pt-br">

	<head>

		<!-- INCLUE O HEAD NA PÁGINA -->
		<?php include "_includes/head.php";?>

	</head>

	<body>

		<!-- INCLUE O HEADER NA PÁGINA -->
		<?php 
			if (!isset($_SESSION)) session_start();
			if(!isset($_SESSION['id'])){
				include "_includes/header.php";
			}else
				include "_includes/header-logado.php";
		?>

		<div class="pai">
			<div class="filho">
				<div class="container">
					<div class="row">
						<div class= "well col-md-4 col-sm-6 col-xs-12 col-md-offset-4 col-sm-offset-3">

							<center><h3><b>UnB Wireless</b></h3></center>

							<div>

								<table  class="table table-striped table-bordered table-condensed">

									<tr>
										<th>Parâmetro</th>
										<th class="dados-qualidade">Medida</th>
										<th class="dados-qualidade">Unidade</th>
										
									</tr>

									<tr>
										<td>Download</td>
										<td class="dados-qualidade" id="dado-download">-</td>
										<td class="dados-qualidade">Mbps</td>
									</tr>

									<tr>
										<td>Upload</td>
										<td class="dados-qualidade" id="dado-upload">-</td>
										<td class="dados-qualidade">Mbps</td>
									</tr>

									<tr>
										<td>Ping</td>
										<td class="dados-qualidade" id="dado-latency">-</td>
										<td class="dados-qualidade">ms</td>
									</tr>

									<tr>
										<td>Jitter</td>
										<td class="dados-qualidade" id="dado-jitter">-</td>
										<td class="dados-qualidade">ms</td>
									</tr>

									<tr>
										<td>Intensidade</td>
										<td class="dados-qualidade" id="dado-intensity">-</td>
										<td class="dados-qualidade">dBm</td>
									</tr>

									<tr>
										<td>Perda de Pacotes</td>
										<td class="dados-qualidade" id="dado-packetloss">-</td>
										<td class="dados-qualidade">%</td>
									</tr>

								</table>

							</div>

							<button  value="" type="button" class="btn btn-primary btn-lg btn-block" id="botao_qualidade">Testar <img src="_images/teste.svg" id="gif_qualidade"></button>

							<div class='' id='msg-qualidade'></div>
							<div class="checkbox checkbox-inline" id="salvaPerfil">
								<input type="checkbox" id="caixaSalvaPerfil"><p class="text-primary"> Salvar informações no meu perfil.</p>
							</div>

						</div>
					</div>
				</div> 
			</div>
		</div>

		<script src="_js/jquery.min.js"></script> <!-- Carrega JS jquery-->
		<script src="_js/bootstrap.js"></script> <!-- Carrega JS do bootstrap-->
		<script src="_js/qualidade.js"></script>
	</body>
</html>