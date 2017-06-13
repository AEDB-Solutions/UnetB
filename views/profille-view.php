<?php
	require_once "../controllers/profille-controller.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

	<head>

		<!-- INCLUE O HEAD NA PÁGINA -->
		<?php include "_includes/head.php";?>

	</head>

	<body>
		<div class="pai">
			<div class="filho">
				<div class="container">
					<div class="row">
						<div class= "well col-md-4 col-sm-6 col-xs-12 col-md-offset-4 col-sm-offset-3 modal-body">
							<div class="modal-header">
								<h1 class="modal-title">Informações do Usuário</h1>
									<?php 
										showData();
									 ?>
								<button  value="" type="button" class="btn btn-primary btn-lg" id='edit'>Editar <img src="_images/teste.svg" id="gif_registro"></button>
							</div>
						</div>							
					</div> <!-- /row-->
				</div> <!-- /conteiner-->
			</div> <!-- filho -->
		</div> <!-- pai -->

		<?php include "_includes/header-logado.php" ?>
		<script src="_js/jquery.min.js"></script> <!-- Carrega JS jquery-->
		<scripT src="_js/bootstrap.js"></script> <!-- Carrega JS do bootstrap-->
	</body>
</html>