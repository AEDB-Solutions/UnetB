<?php
	require_once "../functions/packetloss.php";

	function param_packet($porcentagem){
		return $porcentagem/10;
	}
	$teste = checkPacketLoss('164.41.4.26', 40);
	echo "Parametro: ",param_packet($teste) ,"- Porcentagem: ", $teste, "%"; 

?>