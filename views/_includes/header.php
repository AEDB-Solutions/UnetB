<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
	<div class="container-fluid">
		<!-- DEIXA SITE RESPONSIVO -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>

			<a class="navbar-brand" href="home-logout-view.php">UnetB
				<!-- <img alt="Brand" src="_images/logounetb.png" style="margin-top: -25px"> -->
			</a>
		</div>
		
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">		
			
			<ul class="nav navbar-nav navbar-right">

				
				
				<li><a href="#">Teste de Velocidade</a></li>
				<li><a href="information-view.php">Sobre</a></li>
				<li><a href="user-register-view.php">Cadastrar</a></li>
				
				<li>
					<button id="btnLogin" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#logar">
						Entrar
					</button>
				</li>

			</ul>
		</div>
	</div>
</nav>



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

				<button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
				<button id="botao_login" type="button" class="btn btn-primary">Entrar</button>
				
			</div>
		</div>
 	</div>
</div>
<script src="_js/valida_login.js"></script> <!-- Carrega JS para validar login-->
