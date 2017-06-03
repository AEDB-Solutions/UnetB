<?php

	require_once "../classes/class-UnetbDB.php";   //arquivo para a classe que conecta ao banco de dados

	require_once "../functions/speed_download.php"; //arquivo calcula download
	require_once "../functions/speed_upload.php";
	require_once "../functions/intensidade.php"; //arquivo calcula intensidade
	require_once "../functions/latency_average.php"; //arquivo calcula latencia e jitter
	require_once "../functions/packetloss.php"; //arquivo calcula perda de pacotes
	require_once "../functions/get_access_point.php"; //arquivo que pega o endereço MAC do access point

	$lat            = $_POST['lat'];
	$long           = $_POST['long'];
	$download_speed = round($info, 2);
	$upload_speed   = $info_up3;
	$intensity      = checkIntensity();
	$latency        = $result["latency"];
	$packetloss     = checkPacketLoss('164.41.4.26', 4);
	$jitter_tt   = $result["jitter"];
	$access_point = get_access_point();
	

	$query = "INSERT INTO `networking_data` (`lat`, `long`, `download_speed`, `upload_speed`, `intensity`, `latency`, `packetloss`, `jitter`, `access_point`) VALUES ($lat, $long, $download_speed, $upload_speed, $intensity, $latency, $packetloss, $jitter_tt, '$access_point' );";
	
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
		"jitter"     => "$jitter_tt",
		
	);
	echo json_encode($parametros);
?>