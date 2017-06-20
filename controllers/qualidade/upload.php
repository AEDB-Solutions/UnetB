<?php

	require_once "../../functions/speed_upload.php";     //arquivo calcula upload	
	$upload_speed = upload();

	$parametros = array(
		"upload" => "$upload_speed",
	);
	echo json_encode($parametros);
?>	