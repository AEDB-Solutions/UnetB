<!DOCTYPE html>
<html lang="pt-br">

	<head>

		<!-- Inclue o HEAD na página -->
		<?php include "_includes/head.php";?>

	</head>
 
	<body> 
		
		<!-- Inclue o HEADER na página -->
		<?php include "_includes/header.php";?>
		
		<div id="map" class="map"></div>
		
		 <!-- Carrega JS do Google Maps-->
		<script async defer	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAXumgSxD3IY_5VhkxwyEQcbBVOS55H-xQ&libraries=visualization&callback=initMap"></script>
		<script src="_js/mapa.js"></script> <!-- Carrega JS do Google Maps-->
		
		<script src="_js/jquery.min.js"></script> <!-- Carrega JS jquery-->
		<script src="_js/bootstrap.js"></script> <!-- Carrega JS do bootstrap-->
	</body>
</html>
