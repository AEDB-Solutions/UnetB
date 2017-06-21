<?php

	require_once "../../functions/intensity.php";      //arquivo calcula intensidade
	$intensity = checkIntensity();
	$intensityLevel = intensityLevel();

	$parametros = array(
		"intensity"  => "$intensity",
		"nivel" => "$intensityLevel",
	);
	echo json_encode($parametros);
?>