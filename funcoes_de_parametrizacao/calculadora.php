<?php 

require_once "../funcoes_de_parametrizacao/parametro_intensidade.php";
require_once "../funcoes_de_parametrizacao/parametro_latencia.php";
require_once "../funcoes_de_parametrizacao/parametro_download.php";
require_once "../funcoes_de_parametrizacao/parametro_upload.php";
require_once "../classes/class-UnetbDB.php";

if(connect())
{
	echo "Conectado ao banco de dados";
}
	else{
		echo "Erro ao conectar ao banco de dados";
	}

//selecionando dados da tabela
$sql = "SELECT * FROM functions"
$query = mysql_query($sql);

while($sql = mysql_fetch_array($query))
	{
	$intensidade = $sql["intensidade"]; //$intensidade é a variavel que rerpresenta a coluna "intensidade" da tabela
	$latencia = $sql["latencia"];
	$download = $sql["download_speed"];
	$upload = $sql["upload_speed"];

	}

	$n_intensidade = parametro_intensidade($intensidade); // parametro_intensidade eh a funcao que parametriza
	$n_latencia = parametro_latencia($latencia);
	$n_download = parametro_download($download);
	$n_upload = parametro_upload($upload);

	$media_parametros = ((3.5 * $n_intensidade) + (2.5 * $n_download) + (2.5 * $n_upload) + (1.5 * $n_latencia)) / 10;

	echo "A qualidade de sua rede(0~10) eh: $media_parametros";

?>
