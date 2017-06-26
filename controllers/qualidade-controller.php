<?php
	require_once "../classes/class-UnetbDB.php";      //arquivo para a classe que conecta ao banco de dados
	require_once "../functions/get_access_point.php"; //arquivo que pega o endereço MAC do access point
	$id_user        = $_POST['id'];
	$lat            = $_POST['lat'];
	$long           = -47.8764;//$_POST['long'];
	$download_speed = $_POST['download'];
	$upload_speed   = $_POST['upload'];
	$latency        = $_POST['latency'];
	$jitter_tt      = $_POST['jitter'];	
	$intensity      = $_POST['intensity'];
	$packetloss     = $_POST['packetloss'];
	$access_point   = get_access_point();

	$pontosLat = [-15.7452,-15.7454,-15.7456,-15.7458,-15.746,-15.7462,-15.7464,-15.7466,-15.7468,-15.747,-15.7472,-15.7474,-15.7476,-15.7478,-15.748,-15.7482,-15.7484,-15.7486,-15.7488,-15.749,-15.7492,-15.7494,-15.7496,-15.7498,-15.75,-15.7502,-15.7504,-15.7506,-15.7508,-15.751,-15.7512,-15.7514,-15.7516,-15.7518,-15.752,-15.7522,-15.7524,-15.7526,-15.7528,-15.753,-15.7532,-15.7534,-15.7536,-15.7538,-15.754,-15.7542,-15.7544,-15.7546,-15.7548,-15.755,-15.7552,-15.7554,-15.7556,-15.7558,-15.756,-15.7562,-15.7564,-15.7566,-15.7568,-15.757,-15.7572,-15.7574,-15.7576,-15.7578,-15.758,-15.7582,-15.7584,-15.7586,-15.7588,-15.759,-15.7592,-15.7594,-15.7596,-15.7598,-15.76,-15.7602,-15.7604,-15.7606,-15.7608,-15.761,-15.7612,-15.7614,-15.7616,-15.7618,-15.762,-15.7622,-15.7624,-15.7626,-15.7628,-15.763,-15.7632,-15.7634,-15.7636,-15.7638,-15.764,-15.7642,-15.7644,-15.7646,-15.7648,-15.765,-15.7652,-15.7654,-15.7656,-15.7658,-15.766,-15.7662,-15.7664,-15.7666,-15.7668,-15.767,-15.7672,-15.7674,-15.7676,-15.7678,-15.768,-15.7682,-15.7684,-15.7686,-15.7688,-15.769,-15.7692,-15.7694,-15.7696,-15.7698,-15.77,-15.7702,-15.7704,-15.7706,-15.7708,-15.771,-15.7712,-15.7714,-15.7716,-15.7718,-15.772,-15.7722,-15.7724,-15.7726,-15.7728,-15.773,-15.7732,-15.7734,-15.7736,-15.7738,-15.774,-15.7742,-15.7744,-15.7746,-15.7748,-15.775,-15.7752,-15.7754,-15.7756,-15.7758];
	for ($i=0; $i < count($pontosLat); $i++){
		if(!($lat > -15.7452 || $lat < -15.7758)){
			if ($pontosLat[$i] - $lat <= 0.0001){
				$lat_q = $pontosLat[$i];
				break;
			}elseif ($pontosLat[$i] - $lat > 0.0001 && $pontosLat[$i] - $lat <= 0.0002){
				$lat_q = $pontosLat[$i + 1];
				break;
			}
		}else{
			$lat_q = true;
			break;
		}
	}
	$pontosLng = [-47.8768,-47.8766,-47.8764,-47.8762,-47.876,-47.8758,-47.8756,-47.8754,-47.8752,-47.875,-47.8748,-47.8746,-47.8744,-47.8742,-47.874,-47.8738,-47.8736,-47.8734,-47.8732,-47.873,-47.8728,-47.8726,-47.8724,-47.8722,-47.872,-47.8718,-47.8716,-47.8714,-47.8712,-47.871,-47.8708,-47.8706,-47.8704,-47.8702,-47.87,-47.8698,-47.8696,-47.8694,-47.8692,-47.869,-47.8688,-47.8686,-47.8684,-47.8682,-47.868,-47.8678,-47.8676,-47.8674,-47.8672,-47.867,-47.8668,-47.8666,-47.8664,-47.8662,-47.866,-47.8658,-47.8656,-47.8654,-47.8652,-47.865,-47.8648,-47.8646,-47.8644,-47.8642,-47.864,-47.8638,-47.8636,-47.8634,-47.8632,-47.863,-47.8628,-47.8626,-47.8624,-47.8622,-47.862,-47.8618,-47.8616,-47.8614,-47.8612,-47.861,-47.8608,-47.8606,-47.8604,-47.8602,-47.86,-47.8598,-47.8596,-47.8594,-47.8592,-47.859,-47.8588,-47.8586,-47.8584,-47.8582,-47.858,-47.8578,-47.8576,-47.8574,-47.8572,-47.857,-47.8568,-47.8566,-47.8564,-47.8562,-47.856,-47.8558,-47.8556,-47.8554,-47.8552];
	for ($i=0; $i < count($pontosLng); $i++){
		
		if(!($long < -47.8768 || $long > -47.8552)){
			if ($pontosLng[$i] - $long > -0.0001){
				$long_q = $pontosLng[$i];
				break;
			}elseif ($pontosLng[$i] - $long < -0.0001 && $pontosLng[$i] - $long >= -0.0002){
				$long_q = $pontosLng[$i + 1];
				break;
			}
		}else{
			$long_q = true;
			break;
		}
	}
	if(!(is_bool($lat_q) === true || is_bool($long_q) === true)){
		$query = "INSERT INTO `networking_data` (`id_user`,`lat`, `lng`, `download_speed`, `upload_speed`, `intensity`, `latency`, `packetloss`, `jitter`, `access_point`) VALUES ($id_user, $lat_q, $long_q, $download_speed, $upload_speed, $intensity, $latency, $packetloss, $jitter_tt, '$access_point' );";
		$mySQL = new MySQL;
		$executaQuery = $mySQL->executeQuery($query);
		$mySQL->disconnect();
		echo json_encode(array("resultado" => "gravado"));
	}else{
		echo json_encode(array("resultado" => "fora do limite"));
	}
?>