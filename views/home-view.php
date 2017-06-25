<!DOCTYPE html>
<html lang="pt-br">

	<head>

		<!-- Inclue o HEAD na página -->
		<?php include "_includes/head.php";?>

	</head>

	<body> 

		<!-- Inclue o HEADER na página -->
		<?php 
			if (!isset($_SESSION)) session_start();
			if(!isset($_SESSION['id'])){
				include "_includes/header.php";
			}else
				include "_includes/header-logado.php";
		?>

		<input type="hidden" id="session" value="
			<?php
				if(!isset($_SESSION['id'])){
					echo '0';
				}else
					echo $_SESSION['id'];
			?>
		">

		<div id="map" class="map"></div>
		 
		<script async defer	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA5lst-DG_gwygdX_MR08cEYYUO5p5np5E&libraries=visualization,geometry&callback=initMap"></script> <!-- Carrega JS do Google Maps-->
		<script src="_js/mapa.js"></script> <!-- Carrega JS do Google Maps-->
		<script src="_js/jquery.min.js"></script> <!-- Carrega JS jquery-->
		<script src="_js/bootstrap.js"></script> <!-- Carrega JS do bootstrap-->
	</body>
</html>