<?php

	require_once "../classes/class-UnetbDB.php";   //arquivo para a classe que conecta ao banco de dados

	require_once "../functions/xxx.php"; //arquivo calcula download
	require_once "../functions/xxx.php"; //arquivo calcula upload
	require_once "../functions/xxx.php"; //arquivo calcula intencidade
	require_once "../functions/latency_average.php"; //arquivo calcula latencia e jitter
	require_once "../functions/xxx.php"; //arquivo calcula perda de pacotes
	


	$mySQL = new MySQL;
	$mySQL->executeQuery("INSERT INTO qualidade (lat, long, password, download_speed, upload_speed, intensidade, latencia, packetloss, jitter) 
						  VALUES ('10.1','10.1','10.1','10.1','10.1','10.1','10.1','10.1')");
?>