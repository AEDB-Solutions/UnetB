<?php

	require_once "../funcoes_de_parametrizacao/intensity_param.php";
	require_once "../funcoes_de_parametrizacao/latency_param.php";
	require_once "../funcoes_de_parametrizacao/download_param.php";
	require_once "../funcoes_de_parametrizacao/upload_param.php";
	require_once "../classes/class-UnetbDB.php";
	require_once "../functions/get_ssid.php";


	$mySQL = new MySQL;
	$executaQuery = $mySQL->executeQuery("SELECT * FROM networking_data");
	$mySQL->disconnect();




	$total = array();

	while($linha = mysqli_fetch_array($executaQuery)){
		
		$download    = $linha["download_speed"];
		$upload      = $linha["upload_speed"];
		$intensidade = $linha["intensity"];
		$latencia    = $linha["latency"];
		$long        = $linha["long"];
		$lat         = $linha["lat"];
		$id          = $linha["id"];


		$n_intensidade = intensity_param($intensidade);
		$n_latencia    = latency_param($latencia);
		$n_download    = download_param($download);
		$n_upload      = upload_param($upload);

		$media_parametros = ((3.5 * $n_intensidade) + (2.5 * $n_download) + (2.5 * $n_upload)+ (1.5 * $n_latencia)) / 10;
		
		$media_arredondada = number_format($media_parametros, 2, '.', '');

		$array_localizacao = array('lat' => $lat, 'long' => $long, 'peso' => $media_arredondada);

		array_push($total,$array_localizacao);
	 

	echo json_encode($total);
	
}
?>
  