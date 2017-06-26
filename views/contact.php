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
						<div class= "well col-md-4 col-sm-6 col-xs-12 col-md-offset-4 col-sm-offset-3 modal-body">
							
							<div class="modal-header">
								<h1 class="modal-title">Fale Conosco</h1>
							</div>
							
							<form id='form-contato' method="POST" action="http://formspree.io/unetbcontato@gmail.com">

								<div class="form-group">
									<label for="name-contato">Nome</label>
									<input type="text" class="form-control" id="name-contato" name="Nome" placeholder="Nome">
									<span class='msg-name'></span> <!-- mensagem de erro -->
								</div>

								<div class="form-group">
									<label for="email-contato">E-mail</label>
									<input type="email" class="form-control" id="email-contato" name="E-mail" placeholder="E-mail">
									<span class='msg-email'></span> <!-- mensagem de erro -->
								</div>

								<div class="form-group">
									<label for="assunto-contato">Assunto</label>
									<input type="assunto" class="form-control" id="assunto-contato" name="Assunto" placeholder="Assunto">
									<span class='msg-assunto'></span> <!-- mensagem de erro -->
								</div>

								<div class="form-group">
									<label for="texto-contato">Mensagem</label>
									<textarea class="form-control" id="texto-contato" name="Mensagem" placeholder="Mensagem"></textarea>	
									<span class='msg-texto'></span> <!-- mensagem de erro -->
								</div>

								<div class="modal-footer">									
									<button type="" class="btn btn-primary btn-lg" id='botao_contato'>Enviar <img src="_images/teste.svg" id="gif_registro"></button>
								</div>
								
								
								<input type="hidden" name="_next" value="http://localhost/UnetB/views/contact.php" />
								<input type="hidden" name="_subject" value="" id="assunto"/>
								<input type="hidden" name="_language" value="pt" />
								

								<div class='' id='msg-contato'></div>

							</form><!-- /formulário-->
							
						</div> <!-- /caixa do formulário-->
					</div> <!-- /row-->
				</div> <!-- /conteiner-->
			</div> <!-- filho -->
		</div> <!-- pai -->
		
		<script src="_js/jquery.min.js"></script> <!-- Carrega JS jquery-->
		<script src="_js/bootstrap.js"></script> <!-- Carrega JS do bootstrap-->
		<script src="_js/valida_contato.js"></script> <!-- Carrega JS para validar Mensagem-->
	</body>
</html>