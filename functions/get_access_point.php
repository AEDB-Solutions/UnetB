<?php

	function get_access_point(){

		$command = 'iwconfig | grep "Access Point"';
		$result = shell_exec($command);
		return substr($result, strpos($result, 'Point: ')+7, -4);

	}
	// $teste = get_access_point();
	// var_dump($teste);
?>