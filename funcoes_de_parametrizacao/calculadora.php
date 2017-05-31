<?php 

	$intensidade;
	$latencia;
	$download;
	$upload;
	$lat;
	$long;

	require_once "../funcoes_de_parametrizacao/intensity_param.php";
	require_once "../funcoes_de_parametrizacao/latency_param.php";
	require_once "../funcoes_de_parametrizacao/download_param.php";
	// require_once "../funcoes_de_parametrizacao/upload_param.php";
	require_once "../classes/class-UnetbDB.php";

	$mySQL = mysqli_connect('127.0.0.1','root','','unetb');

	//selecionando dados da tabela
	$sql = "SELECT * FROM networking_data";
	$query = mysqli_query($mySQL , $sql);  
	 
	while($sql = mysqli_fetch_array($query)){
		$id = $sql["id"];
		$intensidade = $sql["intensity"]; //$intensidade é a variavel que rerpresenta a coluna "intensity" da tabela
		$latencia = $sql["latency"];
		$download = $sql["download_speed"];
		$upload = $sql["upload_speed"];
		$lat = $sql["lat"];
		$long = $sql["long"];

		var_dump($n_intensidade = intensity_param($intensidade)); echo "<br>";// parametro_intensidade eh a funcao que parametriza
		var_dump($n_latencia = latency_param($latencia)); echo "<br>";
		var_dump($n_download = download_param($download)); echo "<br>";

	//	$media_parametros = ((3.5 * $n_intensidade) + (2.5 * $n_download) + (2.5 * $n_upload)+ (1.5 * $n_latencia)) / 10;

	//	echo "A qualidade de sua rede(0~10) eh: $media_parametros";

		var_dump($array_localizacao = array("lat $lat", "long $long", "media_parametros")); echo "<br>";
		var_dump($matriz = array("id $id", $array_localizacao)); echo "<br>"; echo "<br>";

	}

?>
  