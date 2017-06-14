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
		<?php include "_includes/header-logado.php" ?>
		<div id="map" class="map"></div>
		 <!-- Carrega JS do Google Maps-->
		<script async defer	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA5lst-DG_gwygdX_MR08cEYYUO5p5np5E&libraries=visualization,geometry&callback=initMap"></script>
		<script src="_js/mapa.js"></script> <!-- Carrega JS do Google Maps-->
		<script src="_js/jquery.min.js"></script> <!-- Carrega JS jquery-->
		<scripT src="_js/bootstrap.js"></script> <!-- Carrega JS do bootstrap-->
		<script typ></script>
	</body>
</html>