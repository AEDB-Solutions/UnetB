<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
	<div class="container-fluid">
		<!-- DEIXA SITE RESPONSIVO -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>

			<a class="navbar-brand" href="<?php echo $_SESSION['HOME_URI'].'home-logout-view.php';?>">UnetB
				<!-- <img alt="Brand" src="_images/logounetb.png" style="margin-top: -25px"> -->
			</a>
		</div>
		
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">		
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuário</a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo $_SESSION['HOME_URI'].'user-register-view.php';?>">Cadastrar</a></li>
						<li><a href="<?php echo $_SESSION['HOME_URI'].'login-view.php';?>">Entrar</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu</a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo $_SESSION['HOME_URI'].'how-to-use-view.php';?>">Como Usar</a></li>
						<li><a href="#">Teste de Velocidade</a></li>
						<li><a href="<?php echo $_SESSION['HOME_URI'].'about-view.php';?>">Sobre</a></li>	
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>