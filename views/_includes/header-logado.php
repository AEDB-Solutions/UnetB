<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
	<div class="container-fluid">
		<!-- DEIXA SITE RESPONSIVO -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>

			<a class="navbar-brand" href="home-login-view.php">UnetB <span class="glyphicon glyphicon-signal">
				<!--img alt="Brand" src="_images/logo.png" style="margin-top: -25px"-->
			</a>
		</div>
		
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">		
			<ul class="nav navbar-nav navbar-right">
				<li><a href="home-login-view.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Usuário</a>
					<ul class="dropdown-menu">
						<li><a href="?">Perfil</a></li>
						<li><a href="../functions/logout.php">Sair</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-align-justify"></span> Menu</a>
					<ul class="dropdown-menu">
						<li><a href="how-to-use-view.php">Como Usar</a></li>
						<li><a href="#">Teste de Velocidade</a></li>
						<li><a href="about-view.php">Sobre</a></li>	
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>