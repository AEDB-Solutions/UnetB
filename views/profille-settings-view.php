<!DOCTYPE html>
<html lang="pt-br">

	<head>

		<!-- INCLUE O HEAD NA PÁGINA -->
		<?php include "_includes/head.php";?>

	</head>

	<body>

		<!-- INCLUE O HEADER NA PÁGINA -->
		<?php include "_includes/header-logado.php";?>

		<div class="pai">
			<div class="filho">
				<div class="container">
					<div class="row">
						<div class= "well col-md-4 col-sm-6 col-xs-12 col-md-offset-4 col-sm-offset-3 modal-body">
							
							<div class="modal-header">
								<h1 class="modal-title">Editar Informações</h1>
								<i>Digite apenas nos campos que deseja alterar ou incluir algo.</i>
							</div>
							
							<form action="" method="post" id='form-settings' enctype='multipart/form-data'>

					
								<div class="form-group">
									<label for="email">E-mail</label>
									<input type="email" class="form-control" id='email' name="email" placeholder="Informe o E-mail">
									<span class='msg-erro msg-email'></span>
								</div>
								<div class="form-group">
									<label for= 'name'> Nome </label>
									<input type="text" name="name" class = "form-control" id = "name" placeholder="Digite seu nome">
									<span class='msg-erro msg-name'></span>
								</div>
								<div class="form-group">
									<label for= 'lastpassword'> Senha Atual</label>
									<input type="password" name="lastpassword" class = "form-control" id = "lastpassword" placeholder="Digite sua senha atual">
									<span class='msg-erro msg-lastpassw'></span>
								</div>

								<div class="form-group">
									<label for= 'newpassword'> Nova Senha</label>
									<input type="password" name="newpassword" class = "form-control" id = "newpassword" placeholder="Digite uma nova senha.">
									<span class='msg-erro msg-newpassw'></span>
								</div>

								<div class="form-group">
									<label for= 'confnewpassword'> Confirmação da senha</label>
									<input type="password" name="confnewpassword" class = "form-control" id = "confnewpassword" placeholder="Confirme a nova senha.">
									<span class='msg-erro msg-confnewpassw'></span>
								</div>

								<div class="form-group">
									<label for= 'course'> Curso</label>
									<input type="text" name="course" class = "form-control" id = "course" placeholder="Digite o seu curso.">
									<span class='msg-erro msg-course'></span>
								</div>

								<div class="form-group">
									<label for= 'matricula'> Matrícula</label>
									<input type="text" name="matricula" class = "form-control" id = "matricula" placeholder="Digite sua matrícula.">
									<span class='msg-erro msg-matricula'></span>
								</div>

								<div class="form-group">
									<label for= 'cellphone'> Celular: </label>
									<input type="text" name="cellphone" class = "form-control" id = "cellphone" placeholder="Digite seu número de celular.">
									<span class='msg-erro msg-cellphone'></span>
								</div>

								<div class="modal-footer">
									
									<button  value="" type="button" class="btn btn-primary btn-lg" id="edit-button" > Editar <img src="_images/teste.svg" id="gif_registro"></button>
								</div>

								<div class='' id='msg-settings'></div>

							</form><!-- /formulário-->
							
						</div> <!-- /caixa do formulário-->
					</div> <!-- /row-->
				</div> <!-- /conteiner-->
			</div> <!-- filho -->
		</div> <!-- pai -->

		<script src="_js/profille-validate.js"></script> <!-- Carrega JS para validar informações-->
		<script src="_js/jquery.min.js"></script> <!-- Carrega JS jquery-->
		<script src="_js/bootstrap.js"></script> <!-- Carrega JS do bootstrap-->	
	</body>
</html>