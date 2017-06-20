<?php

	require_once "../classes/class-UnetbDB.php";      //arquivo para a classe que conecta ao banco de dados
	require_once "../functions/get_access_point.php"; //arquivo que pega o endereço MAC do access point

	$lat            = $_POST['lat'];
	$long           = $_POST['long'];
	$download_speed = $_POST['download'];
	$upload_speed   = $_POST['upload'];
	$latency        = $_POST['latency'];
	$jitter_tt      = $_POST['jitter'];	
	$intensity      = $_POST['intensity'];
	$packetloss     = $_POST['packetloss'];
	$access_point   = get_access_point();

	$query = "INSERT INTO `networking_data` (`lat`, `long`, `download_speed`, `upload_speed`, `intensity`, `latency`, `packetloss`, `jitter`, `access_point`) VALUES ($lat, $long, $download_speed, $upload_speed, $intensity, $latency, $packetloss, $jitter_tt, '$access_point' );";
	$mySQL = new MySQL;
	$executaQuery = $mySQL->executeQuery($query);
	$mySQL->disconnect();

	echo "FOI";
?>