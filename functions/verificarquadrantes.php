<?php

	require_once "../classes/class-UnetbDB.php";
	require_once "../functions/class-poligono.php";

	$mySQL = new MySQL;
	$executaQuery = $mySQL->executeQuery("SELECT * FROM networking_data");
	$mySQL->disconnect();

	while($linha = mysqli_fetch_array($executaQuery)){
	
		$y = $linha["long"];
		$x = $linha["lat"];

		$pointLocation = new pointLocation();
		$points = array("$x $y");
		$polygon = array("-15.776999 -47.871338","-15.770020, -47.850267","-15.749136, -47.867133","-15.753349, -47.880951", "-15.776999 -47.871338");
		// Las últimas coordenadas tienen que ser las mismas que las primeras, para "cerrar el círculo"
		foreach($points as $key => $point) {
			echo "point " . ($key+1) . " ($point): " . $pointLocation->pointInPolygon($point, $polygon) . "<br>";
		}
	}
?>
