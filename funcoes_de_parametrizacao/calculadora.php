<?php 

public $intensidade;
public $latencia;
public $download;
public $upload;

require_once "../funcoes_de_parametrizacao/intensity_param.php";
require_once "../funcoes_de_parametrizacao/latency_param.php";
require_once "../funcoes_de_parametrizacao/download_param.php";
require_once "../funcoes_de_parametrizacao/upload_param.php";
require_once "../classes/class-UnetbDB.php";

if(connect())
{
	echo "Conectado ao banco de dados";
}
	else{
		echo "Erro ao conectar ao banco de dados";
	}

//selecionando dados da tabela
$sql = "SELECT * FROM qualidade"
$query = mysql_query($sql);

while($sql = mysql_fetch_array($query))
	{
	$intensidade = $sql["intensity"]; //$intensidade é a variavel que rerpresenta a coluna "intensity" da tabela
	$latencia = $sql["latency"];
	$download = $sql["download_speed"];
	$upload = $sql["upload_speed"];

	}

	$n_intensidade = intensity_param($intensidade); // parametro_intensidade eh a funcao que parametriza
	$n_latencia = latency_param($latencia);
	$n_download = download_param($download);
	$n_upload = upload_param($upload);

	$media_parametros = ((3.5 * $n_intensidade) + (2.5 * $n_download) + (2.5 * $n_upload) + (1.5 * $n_latencia)) / 10;

	echo "A qualidade de sua rede(0~10) eh: $media_parametros";

?>
