<?php
	
	require_once "../../functions/latency_average.php";  //arquivo calcula latencia e jitter
	$pj = pingJitter("www.unb.br");

	$parametros = array(
		"latency" => $pj["latency"],
		"jitter"  => $pj["jitter"],
	);
	echo json_encode($parametros);
?>	