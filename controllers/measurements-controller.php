<?php
	if (!isset($_SESSION)) session_start();
	if(!isset($_SESSION['id'])){
		header('location:home-view.php');
	}

	require_once "../classes/class-UnetbDB.php";


	function getUserData(){
		
		$id = $_SESSION['id'];
		$mySQL = new MySQL;
		$result = $mySQL->executeQuery("SELECT * FROM `networking_data` WHERE id_user = '$id' ORDER BY date_quality DESC");
		$mySQL->disconnect();

		if (mysqli_num_rows($result) == 0) {
			echo "<br/>";
			echo "<p>Você não possui medições no momento. Faça o teste e marque a opção de salvar no banco de dados.</p>";
			echo "<br/>";
		}else{
			while ($linha = mysqli_fetch_assoc($result)) {
				$data = explode(' ', $linha['date_quality']);
				$dia = explode('-', $data[0]);
				$hora = explode(':', $data[1]);


				echo "<table  class='table table-striped table-bordered table-condensed'>";
				echo "<br/>";
				echo"<tr class='info'>";
				echo	"<th colspan='3' class='dados-qualidade'>Feita em ".$dia[2].'/'.$dia[1].'/'.$dia[0].' às '.$hora[0].':'.$hora[1]."</th>";
				echo"</tr>";
				echo"<tr class='info'>";
				echo	"<th>Parâmetro</th>";
				echo	"<th class='dados-qualidade'>Medida</th>";
				echo	"<th class='dados-qualidade'>Unidade</th>";
				echo"</tr>";

				echo"<tr>";
				echo	"<td>Download</td>";
				echo	"<td class='dados-qualidade'>".$linha['download_speed']."</td>";
				echo	"<td class='dados-qualidade'>Mbps</td>";
				echo"</tr>";

				echo"<tr>";
				echo	"<td>Upload</td>";
				echo	"<td class='dados-qualidade'>".$linha['upload_speed']."</td>";
				echo	"<td class='dados-qualidade'>Mbps</td>";
				echo"</tr>";

				echo"<tr>";
				echo	"<td>Ping</td>";
				echo	"<td class='dados-qualidade'>".$linha['latency']."</td>";
				echo	"<td class='dados-qualidade'>ms</td>";
				echo"</tr>";

				echo"<tr>";
				echo	"<td>Jitter</td>";
				echo	"<td class='dados-qualidade'>".$linha['jitter']."</td>";
				echo	"<td class='dados-qualidade'>ms</td>";
				echo"</tr>";

				echo"<tr>";
				echo	"<td>intensidade</td>";
				echo	"<td class='dados-qualidade'>".$linha['intensity']."</td>";
				echo	"<td class='dados-qualidade'>dBm</td>";
				echo"</tr>";

				echo"<tr>";
				echo	"<td>Perda de Pacotes</td>";
				echo	"<td class='dados-qualidade'>".$linha['packetloss']."</td>";
				echo	"<td class='dados-qualidade'>%</td>";
				echo"</tr>";
				echo"</table>";
			}
		}
	}
?>