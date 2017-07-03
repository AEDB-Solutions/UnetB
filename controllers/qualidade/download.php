<?php

	require_once "../../functions/speed_download.php";   //arquivo calcula download
	$download_speed = download();

	$parametros = array(
		"download" => "$download_speed",
	);
	echo json_encode($parametros);

?>