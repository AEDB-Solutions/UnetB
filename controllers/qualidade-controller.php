<?php

	require_once "../classes/class-UnetbDB.php";      //arquivo para a classe que conecta ao banco de dados	
	require_once "../functions/speed_download.php";   //arquivo calcula download
	require_once "../functions/speed_upload.php";     //arquivo calcula upload
	require_once "../functions/latency_average.php";  //arquivo calcula latencia e jitter	
	require_once "../functions/intensidade.php";      //arquivo calcula intensidade	
	require_once "../functions/packetloss.php";       //arquivo calcula perda de pacotes
	require_once "../functions/get_access_point.php"; //arquivo que pega o endereço MAC do access point

	$pj             = pingJitter("www.unb.br");
	
	$lat            = $_POST['lat'];
	$long           = $_POST['long'];
	$latency        = $pj["latency"];
	$jitter_tt      = $pj["jitter"];
	$download_speed = download();
	$upload_speed   = upload();
	$intensity      = checkIntensity();	
	$packetloss     = checkPacketLoss('164.41.4.26', 4);
	$access_point   = get_access_point();

	$query = "INSERT INTO `networking_data` (`lat`, `long`, `download_speed`, `upload_speed`, `intensity`, `latency`, `packetloss`, `jitter`, `access_point`) VALUES ($lat, $long, $download_speed, $upload_speed, $intensity, $latency, $packetloss, $jitter_tt, '$access_point' );";

	$mySQL = new MySQL;
	$executaQuery = $mySQL->executeQuery($query);
	$mySQL->disconnect();

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