<!DOCTYPE html>
<html lang="pt-br">

	<head>

		<!-- INCLUE O HEAD NA PÁGINA -->
		<?php include "_includes/head.php";?>

	</head>

	<body>

		<!-- Inclue o HEADER na página -->
		<?php 
			if (!isset($_SESSION)) session_start();
			if(!isset($_SESSION['id'])){
				header('location:home-view.php');
			}else
				include "_includes/header-logado.php";

			require_once "../controllers/profille-info.php";
		?>

		<div class="pai">
			<div class="filho">
				<div class="container">
					<div class="row">
						<div class= "well col-md-4 col-sm-6 col-xs-12 col-md-offset-4 col-sm-offset-3 modal-body">
							<div class="modal-header">
								<center><h1 class="modal-title">Seu Perfil</h1></center>
									<b>	Nome: </b> <?=$data['name'];?> </br></br>
									<b>	Email: </b>  <?=$data['email'];?> </br></br>
									<b>	Celular: </b> <?=$data['cellphone'];?> </br></br>
									<b> Curso: </b> <?=$data['course'];?> </br></br>
									<b> Matrícula: </b> <?=$data['matricula'];?> </br></br>
								<a id="btnEdit" href="profille-settings-view.php" class="btn btn-primary btn-lg">
									Editar
								</a>
							</div>
						</div>							
					</div> <!-- /row-->
				</div> <!-- /conteiner-->
			</div> <!-- filho -->
		</div> <!-- pai -->
		
		<script src="_js/jquery.min.js"></script> <!-- Carrega JS jquery-->
		<scripT src="_js/bootstrap.js"></script> <!-- Carrega JS do bootstrap-->

	</body>
</html>