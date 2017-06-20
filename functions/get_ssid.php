<?php

	$command = iwgetid;
	$result = shell_exec($command);
	$ssid = substr($result, strpos($result, 'ESSID:')+7, -2);
	echo $ssid;
	//testando com "apt306" por enquanto, vou arrumar amanha
?>