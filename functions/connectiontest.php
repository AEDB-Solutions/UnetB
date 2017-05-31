<?php
	// require_once "connectionspeed.php";
	require_once "intensidade.php";
	require_once "packetloss.php";
	require_once ""

	$packetloss = checkPacketLoss('164.41.4.26', 40); //Ping no servidor local da Unb;
	$connetion_intensity = checkIntensity();
	
	echo "<b> Perda de Pacote : </b>", $packetloss, "%<br>";
	echo "<b>Intensidade do Sinal: </b>", $connetion_intensity;
?>