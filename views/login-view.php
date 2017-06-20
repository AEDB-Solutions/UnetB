<!-- Modal -->
<div class="modal fade" id="logar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Fazer Login</h4>
			</div>

			<div class="modal-body">

				<form action='' method="post" id='form-login' enctype='multipart/form-data'>

					<div class="form-group">
						<label for="email">E-mail</label>
						<input type="email" class="form-control" id="email-login" name="email" placeholder="Informe o E-mail">
						<span class='msg-erro msg-email-login'></span>
					</div>

					<div class="form-group">
						<label for="password">Senha</label>
						<input type="password" class="form-control" id="password-login" name="password" placeholder="Informe a Senha">
						<span class='msg-erro msg-password-login'></span>
					</div>

					
					<span class='' id='msg-login'></span>

				</form>

			</div> <!-- Conteudo do modal -->

			<div class="modal-footer">
				<a type="button" class="btn btn-default" href="register-view.php">Não tenho conta</a>
				<button type="button" class="btn btn-primary" id="botao_login">Entrar <img src="_images/teste.svg" id="gif_login"></button>
				
			</div>
		</div>
 	</div>
</div>
<script src="_js/valida_login.js"></script> <!-- Carrega JS para validar login-->