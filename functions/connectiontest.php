<?php
	// require_once "connectionspeed.php";
	require_once "intensidade.php";
	require_once "packetloss.php";

	$packetloss = checkPacketLoss('127.0.0.1', 40);
	$connetion_intensity = checkIntensity();
	
	echo "<b>Perda de Pacote : </b>", $packetloss, "%<br>";
	echo "<b>Intensidade do Sinal: </b>", $connetion_intensity;
?>