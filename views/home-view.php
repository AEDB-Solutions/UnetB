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

		<div class="panel panel-primary" id="infowindow" style="display: none;">
			<div class="panel-body">
				<ul class="list-group">
					<li class="list-group-item">Cras justo odio</li>
					<li class="list-group-item">Dapibus ac facilisis in</li>
					<li class="list-group-item">Morbi leo risus</li>
					<li class="list-group-item">Porta ac consectetur ac</li>
					<li class="list-group-item">Vestibulum at eros</li>
				</ul>
			</div>
		</div>

		 
		<script async defer	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA5lst-DG_gwygdX_MR08cEYYUO5p5np5E&libraries=visualization,geometry&callback=initMap"></script> <!-- Carrega JS do Google Maps-->
		<script src="_js/mapa.js"></script> <!-- Carrega JS do Google Maps-->
		<script src="_js/jquery.min.js"></script> <!-- Carrega JS jquery-->
		<script src="_js/bootstrap.js"></script> <!-- Carrega JS do bootstrap-->
	</body>
</html>