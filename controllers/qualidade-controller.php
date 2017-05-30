<?php

	require_once "../classes/class-UnetbDB.php";   //arquivo para a classe que conecta ao banco de dados

	require_once "../functions/xxx.php"; //arquivo calcula download
	require_once "../functions/xxx.php"; //arquivo calcula upload
	require_once "../functions/xxx.php"; //arquivo calcula intencidade
	require_once "../functions/xxx.php"; //arquivo calcula latencia
	require_once "../functions/xxx.php"; //arquivo calcula perda de pacotes
	require_once "../functions/xxx.php"; //arquivo calcula jitter


	$mySQL = new MySQL;
	$mySQL->executeQuery("INSERT INTO qualidade (lat, long, password, download_speed, upload_speed, intensidade, latencia, packetloss, jitter) 
						  VALUES ('{}','{}','{}','{}','{}','{}','{}','{}')");
?>