<?php

	require_once "../funcoes_de_parametrizacao/intensity_param.php";
	require_once "../funcoes_de_parametrizacao/latency_param.php";
	require_once "../funcoes_de_parametrizacao/download_param.php";
	require_once "../funcoes_de_parametrizacao/upload_param.php";
	require_once "../classes/class-UnetbDB.php";
	require_once "../functions/get_ssid.php";

	$mySQL = new MySQL;
	$executaQuery = $mySQL->executeQuery("SELECT * FROM networking_data ORDER BY `date_quality` DESC");
	$mySQL->disconnect();
	
	$total  = array();
	$tabela = array();


	while($linha = mysqli_fetch_assoc($executaQuery))
		array_push($tabela,$linha);

	$copia = $tabela;

	for ($i=0; $i < count($tabela); $i++){

		$templat  = $tabela[$i]["lat"];
		$templong = $tabela[$i]["lng"];

		for ($j=$i; $j < count($tabela)-1; $j++){

			$long = $tabela[$j+1]["lng"];
			$lat  = $tabela[$j+1]["lat"];

			$testado = $tabela[$i]["lat"].$tabela[$i]["lng"];

			if($templat == $lat && $templong == $long){
				unset($copia[$j+1]);
			}
		}
	}

	foreach ($copia as $linha){

		$download    = $linha["download_speed"];
		$upload      = $linha["upload_speed"];
		$intensidade = $linha["intensity"];
		$latencia    = $linha["latency"];
		$long        = $linha["lng"];
		$lat         = $linha["lat"];

		$n_intensidade = intensity_param($intensidade);
		$n_latencia    = latency_param($latencia);
		$n_download    = download_param($download);
		$n_upload      = upload_param($upload);
		
		$media_parametros = ((3.5 * $n_intensidade) + (2.5 * $n_download) + (2.5 * $n_upload)+ (1.5 * $n_latencia)) / 10;

		$array_localizacao = array('lat' => $lat, 'long' => $long, 'peso' => number_format($media_parametros, 2, '.', ''));
		array_push($total,$array_localizacao);
	}
	echo json_encode($total);
?>