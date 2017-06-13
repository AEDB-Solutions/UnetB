<?php

	require_once "../classes/class-UnetbDB.php";
	require_once "../functions/class-poligono.php";

	$mySQL = new MySQL;
	$executaQuery = $mySQL->executeQuery("SELECT * FROM networking_data");
	$mySQL->disconnect();

	while($linha = mysqli_fetch_array($executaQuery)){
	
<<<<<<< HEAD
		$y = $linha["long"];
		$x = $linha["lat"];

		$pointLocation = new pointLocation();
		$points = array("$x $y");
		$polygon = array("-15.776999 -47.871338","-15.770020, -47.850267","-15.749136, -47.867133","-15.753349, -47.880951", "-15.776999 -47.871338");
		// Las últimas coordenadas tienen que ser las mismas que las primeras, para "cerrar el círculo"
		foreach($points as $key => $point) {
			echo "point " . ($key+1) . " ($point): " . $pointLocation->pointInPolygon($point, $polygon) . "<br>";
		}
=======
		$y        = $linha["long"];
		$x         = $linha["lat"];
		$id         = $linha["id"];
	
 
	$pointLocation = new pointLocation();
	$points = array("$x $y");
	$polygon = array("-15.760218 -47.878049","-15.754683 -47.859552","-15.772484 -47.849467","-15.777481 -47.872470", "-15.760218 -47.878049");
	
	// As últimas coordenadas tem que ser as mesmas das primeiras para fechar o poligono
	foreach($points as $key => $point) {
    echo "point $id ($point): " . $pointLocation->pointInPolygon($point, $polygon) . "<br>";
   		}
>>>>>>> aeb58ab71818adba2aea912ccfda69491867e36e
	}
?>
