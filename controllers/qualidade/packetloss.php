<?php

	require_once "../../functions/packetloss.php";       //arquivo calcula perda de pacotes	
	$packetloss = checkPacketLoss('164.41.4.26', 4);

	$parametros = array(
		"packetloss" => "$packetloss",
	);
	echo json_encode($parametros);
?>