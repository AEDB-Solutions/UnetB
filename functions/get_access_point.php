<?php

	function get_access_point(){

		$command = 'iwconfig | grep "Access Point"';
		$result = shell_exec($command);
		return substr($result, 57, 17);
	}
	// $meu_mac = get_access_point();
	// var_dump($meu_mac);
?>