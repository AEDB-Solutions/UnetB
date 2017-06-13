<?php
	require_once "../classes/class-UnetbDB.php";
	require_once "../functions/class-poligono.php";
	$mySQL = new MySQL;
	$executaQuery = $mySQL->executeQuery("SELECT * FROM networking_data");
	$mySQL->disconnect();
	    while($linha = mysqli_fetch_array($executaQuery)){
	
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
	}
?>
