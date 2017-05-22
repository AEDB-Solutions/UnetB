<?php	
	if (!isset($_SESSION)) session_start();
	if(!isset($_SESSION['email'])){
		header('location:login-view.php');
	}
?>


<!DOCTYPE html>
<html lang="pt-br">

	<head>

		<!-- INCLUE O HEAD NA PÁGINA -->
		<?php include "_includes/head.php";?>

	</head>

	<body>

		<!-- INCLUE O HEADER NA PÁGINA -->
		<?php include "_includes/header-logado.php";?>

		<div class="container">
			<h3 style="margin-top: 50px;">Bem Vindo(a) <?php echo $_SESSION['nome'];?></h3>
		</div>
		
		<script src="_js/jquery.min.js"></script> <!-- Carrega JS jquery-->
		<script src="_js/bootstrap.js"></script> <!-- Carrega JS do bootstrap-->
	</body>
</html>