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

	$query = "INSERT INTO `networking_data` (`lat`, `long`, `download_speed`, `upload_speed`, `intensity`, `latency`, `packetloss`, `jitter`) VALUES ($lat, $long, $download_speed, $upload_speed, $intensity, $latency, $packetloss, $jitter);";
	
	$mySQL = new MySQL;
	$executaQuery = $mySQL->executeQuery($query);
	$mySQL->disconnect();
	

	//mysqli_query($mySQL,"INSERT INTO `networking_data` (`lat`, `long`, `download_speed`, `upload_speed`, `intensity`, `latency`, `packetloss`, `jitter`) VALUES ($lat, $long, $download_speed, $upload_speed, $intensity, $latency, $packetloss, $jitter);");
	
	sleep(1);

	$parametros = array(
		"download"   => "$download_speed",
		"upload"     => "$upload_speed",
		"intensity"  => "$intensity",
		"latency"    => "$latency",
		"packetloss" => "$packetloss",
		"jitter"     => "$jitter",
		
	);
	echo json_encode($parametros);
?>