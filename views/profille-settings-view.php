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
			$user_dt = getUserData($_SESSION['id'])
		?>

	

		<div class="pai">
			<div class="filho">
				<div class="container">
					<div class="row">
						<div class= "well col-md-4 col-sm-6 col-xs-12 col-md-offset-4 col-sm-offset-3 modal-body">
							
							<div class="modal-header">
								<center><h1 class="modal-title">Editar Informações</h1></center>
							</div>
							
							<form action="" method="post" id='form-settings' enctype='multipart/form-data'>

					
								<div class="form-group">
									<label for="email">E-mail</label>
									<input type="email" class="form-control" id='email' name="email" placeholder="Informe o E-mail" value = "<?=$user_dt['email']?>">
									<span class='' id="msg-email"></span>
								</div>
								<div class="form-group">
									<label for= 'name'> Nome </label>
									<input type="text" name="name" class = "form-control" id = "name" placeholder="Digite seu nome" value="<?= $user_dt['name']?>">
									<span class='' id="msg-name"></span>
								</div>
								<div class="form-group">
									<label for= 'lastpassword'> Senha Atual</label>
									<input type="password" name="lastpassword" class = "form-control" id = "lastpassword" placeholder="Digite sua senha atual">
									<span class='' id="msg-lastpassw"></span>
								</div>

								<div class="form-group">
									<label for= 'newpassword'> Nova Senha</label>
									<input type="password" name="newpassword" class = "form-control" id = "newpassword" placeholder="Digite uma nova senha.">
									<span class='' id="msg-newpassw"></span>
								</div>

								<div class="form-group">
									<label for= 'confnewpassword'> Confirmação da senha</label>
									<input type="password" name="confnewpassword" class = "form-control" id = "confnewpassword" placeholder="Confirme a nova senha.">
									<span class='' id="msg-confnewpassw"></span>
								</div>

								<div class="form-group">
									<label for= 'course'> Curso</label>
									<select name="course" class = "form-control" id = "course"><?php showcourse();?></select>
									<span class='' id="msg-course"></span>
								</div>

								<div class="form-group">
									<label for= 'matricula'> Matrícula</label>
									<input type="text" name="matricula" class = "form-control" id = "matricula" placeholder="Digite sua matrícula." value="<?= $user_dt['matricula']?>" maxlength="10" OnKeyPress="formatar('##/#######', this)">
									<span class='' id="msg-matricula"></span>
								</div>

								<div class="form-group">
									<label for= 'cellphone'> Celular </label>
									<input type="text" name="cellphone" class = "form-control cellphone" id = "cellphone" placeholder="Celular: 99 9 9999-9999" value="<?= $user_dt['cellphone']?>" maxlength="14" OnKeyPress="formatar('## # ####-####', this)">
									<span class='' id="msg-cellphone"></span>
								</div>

								<div class="modal-footer">									
									<button  value="" type="button" class="btn btn-primary btn-lg" id="edit-button" > Salvar <img src="_images/teste.svg" id="gif_registro"></button>
								</div>

								<div class='' id='msg-settings'></div>
								<h6><i>*Para salvar as novas informações você deve informar sua senha atual.</i></h6>

							</form><!-- /formulário-->
							
						</div> <!-- /caixa do formulário-->
					</div> <!-- /row-->
				</div> <!-- /conteiner-->
			</div> <!-- filho -->
		</div> <!-- pai -->

		 <script src="_js/profille-validate.js"></script> <!-- Carrega JS para validar informações -->
		<script src="_js/jquery.min.js"></script> <!-- Carrega JS jquery-->
		<script src="_js/bootstrap.js"></script> <!-- Carrega JS do bootstrap-->	
	</body>
</html>