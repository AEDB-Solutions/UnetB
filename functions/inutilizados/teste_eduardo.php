	
<?php  
	require_once "../classes/class-UnetbDB.php";	//arquivo que conecta ao mySQLi

	function distincAcesspoint(){
		$query = "SELECT MAX(id), download_speed, upload_speed FROM networking_data GROUP BY access_point ORDER BY id";
		$mySQL = new MySQL;
		$result = $mySQL->executeQuery($query);
		$download = array();
		$upload = array();

		while($row = $result-> fetch_assoc()){
			$download[] = $row['download_speed'];
			$upload[] = $row['upload_speed'];
		}
		var_dump($download);
		var_dump($upload);
	}

	distincAcesspoint();
?>