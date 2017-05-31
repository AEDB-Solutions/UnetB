<!DOCTYPE html>
<html lang="pt-br">

	<head>

		<!-- INCLUE O HEAD NA PÁGINA -->
		<?php include "_includes/head.php";?>

	</head>

	<body>

		<!-- INCLUE O HEADER NA PÁGINA -->
		<?php include "_includes/header.php";?>

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
										<th>Medida</th> 
										
									</tr>
									
									<trs>
										<td>Download</td>
										<td class="dados-qualidade">-</td>
										
									</tr>
									
									<tr>
										<td>Upload</td>
										<td class="dados-qualidade">-</td>
									</tr>

									<tr>
										<td>Ping</td>
										<td class="dados-qualidade">-</td>
									</tr>

									<tr>
										<td>Intencidade</td>
										<td class="dados-qualidade">-</td>
									</tr>

									<tr>
										<td>Perda de Pacotes</td>
										<td class="dados-qualidade">-</td>
									</tr>

									<tr>
										<td>Jitter</td>
										<td class="dados-qualidade">-</td>
									</tr>
								
								</table>

							</div>

							<button  value="" type="button" class="btn btn-primary btn-lg btn-block" id="botao_qualidade">Testar</button>
							<br/>
							<div class='' id='msg-qualidade'></div>

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