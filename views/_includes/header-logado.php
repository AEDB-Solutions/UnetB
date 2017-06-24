<?php
	if (!isset($_SESSION)) session_start();
	if(!isset($_SESSION['email'])){
		header('location:login-view.php');
	}
?>
<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
	<div class="container-fluid">

		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-left" href="home-login-view.php"><img alt="UnetB" src="_images/logo.png"></a>
		</div>
		
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			
			<ul class="nav navbar-nav navbar-right">
				
				<li><a href="networking-data-view.php">Teste Sua Conexão</a></li>
				<li><a href="information-view.php">Sobre</a></li>
				<li><a href="contact.php">Contato</a></li>
				
				<li class="dropdown btn-primary" >
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false""><?=$_SESSION['nome'];?></a>
					<ul class="dropdown-menu">
						<li><a href="profille-view.php">Perfil</a></li>
						<li><a href="../functions/logout.php">Sair</a></li>
					</ul>
				</li>

			</ul>
		</div>
	</div>
</nav>