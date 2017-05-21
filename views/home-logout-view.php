<!DOCTYPE html>
<html lang="pt-br">

	<head>

		<script src="_js/bootstrap.js"></script> <!-- Carrega JS do bootstrap-->
		<script src="_js/jquery.min.js"></script> <!-- Carrega JS jquery-->

		<!-- INCLUE O HEAD NA PÁGINA -->
		<?php include "_includes/head.php";?>

	</head>
 
	<body> 	
		
		<!-- INCLUE O HEADER NA PÁGINA -->
		<?php include "_includes/header.php";?>
		
		<div id="map" class="map"></div>
		

	</body>
	
	<script async defer 
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAXumgSxD3IY_5VhkxwyEQcbBVOS55H-xQ&libraries=visualization&callback=initMap">
	</script> <!-- Carrega JS do Google Maps-->

	<script src="_js/mapa.js"></script> <!-- Carrega JS do Google Maps-->
	<script src="_js/jquery.min.js"></script> <!-- Carrega JS jquery-->
	<script src="_js/bootstrap.js"></script> <!-- Carrega JS do bootstrap-->
</html>
