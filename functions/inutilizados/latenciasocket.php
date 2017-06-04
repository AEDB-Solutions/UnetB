<?php
	function ping($host, $port, $timeout){

		$tB = microtime(true); 
		$fP = fSockOpen($host, $port, $errno, $errstr, $timeout); 
		if (!$fP)
			return "site off";
		
		$tA = microtime(true); 
		return round((($tA - $tB) * 1000), 0)." ms";
	}

	//Echo para exibir que o site esta online, pingando na port a 80, caso nao esteja online, retorna site off
	echo ping("www.google.com", 80, 10);
?>