<?php
	
	require_once "../../functions/latency_average.php";  //arquivo calcula latencia e jitter
	$pj = pingJitter("www.unb.br");

	// $pj = array();       ///COMENTAR AQUI
	// $pj["latency"] = 32; ///COMENTAR AQUI
	// $pj["jitter"] = 53;  ///COMENTAR AQUI

	$parametros = array(
		"latency" => $pj["latency"],
		"jitter"  => $pj["jitter"],
	);
	echo json_encode($parametros);
?>	