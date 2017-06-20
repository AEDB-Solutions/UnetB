<?php

	require_once "../../functions/intensidade.php";      //arquivo calcula intensidade
	$intensity = checkIntensity();

	$parametros = array(
		"intensity"  => "$intensity",
	);
	echo json_encode($parametros);
?>