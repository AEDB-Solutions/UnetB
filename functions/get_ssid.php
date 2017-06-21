<?php
 function get_ssid()
 {


	$command = 'iwgetid';
	$result = shell_exec($command);
	$ssid = substr($result, strpos($result, 'ESSID:')+7, -2);
	return ssid;
 } 
?>