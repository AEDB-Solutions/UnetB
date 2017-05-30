<?php

	require_once "../classes/class-UnetbDB.php";   //arquivo para a classe que conecta ao banco de dados

	// require_once "../functions/xxx.php"; //arquivo calcula download
	// require_once "../functions/xxx.php"; //arquivo calcula upload
	// require_once "../functions/xxx.php"; //arquivo calcula intencidade
	// require_once "../functions/latency_average.php"; //arquivo calcula latencia e jitter
	// require_once "../functions/xxx.php"; //arquivo calcula perda de pacotes
	

	$lat            = $_POST['lat'];
	$long           = $_POST['long'];
	$download_speed = 10.6;
	$upload_speed   = 20.6;
	$intensity      = 30.6;
	$latency        = 40.6;
	$packetloss     = 50.6;
	$jitter         = 60.6;

	$mySQL = mysqli_connect('127.0.0.1','root','','unetb');
	return $mySQL->executeQuery(return $mySQL->executeQuery("INSERT INTO user (name, email, password) VALUES ('{$this->name}','{$this->email}','{$this->password}')");
	
	mysqli_query($mySQL,"INSERT INTO networking_data (lat, long, download_speed, upload_speed, intensity, latency, packetloss, jitter) 
						                VALUES ('10','10.1','10.1','10.1','10.1','10.1','10.1','10.1')");
	
	sleep(1);

	echo "Chegou no final"
?>