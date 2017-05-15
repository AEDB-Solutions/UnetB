<!DOCTYPE html>
<html lang="pt-br">

	<head>

		<script src="_js/jquery.min.js"></script> <!-- Carrega JS jquery-->
		<script src="_js/bootstrap.js"></script> <!-- Carrega JS do bootstrap-->

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
							
							<center><h1 class="title-form">Login</h1></center>
							
							<form action='' method="post" id='form-login' enctype='multipart/form-data'>

								<div class="form-group">
									<label for="email">E-mail</label>
									<input type="email" class="form-control" id="email" name="email" placeholder="Informe o E-mail">
									<span class='msg-erro msg-email'></span>
								</div>

								<div class="form-group">
									<label for="password">Senha</label>
									<input type="password" class="form-control" id="password" name="password" placeholder="Informe a Senha">
									<span class='msg-erro msg-password'></span>
								</div>


								<input type="hidden" name="acao" value="incluir">
								<button type="button" class="btn btn-primary btn-lg btn-block" id='botao_login'>Entrar</button><br/>
								
								<span class='' id='msg-login'></span>

							</form><!-- /formulário-->
							
						</div> <!-- /caixa do formulário-->
					</div> <!-- /row-->
				</div> <!-- /conteiner-->
			</div> <!-- filho -->
		</div> <!-- pai -->
	
	<script src="_js/valida_login.js"></script> <!-- Carrega JS para validar login-->
	</body>	
</html>