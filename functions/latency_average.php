<?php

	function pingDomain($domain){
		$starttime = microtime(true); 
		$file      = fsockopen ($domain, 80, $errno, $errstr, 10);
		$stoptime  = microtime(true);
		$status    = 0;

		if (!$file) 
			$status = -1;  // Site is down
		else{
			fclose($file);
			$status = ($stoptime - $starttime) * 1000;
			$status = floor($status); // função para arredondar o valor numérico
		}
		return $status;
	}

	function pingJitter($domain){

		$loops = 10;
		$pings = array (); //criando um array para armazenar os resultados de pingDomain

		for ( $i = 0; $i < $loops; $i++) //laço for para preencher o array com 100 pings	
			$pings[$i] = pingDomain($domain); // pingando um domínio qualquer


		$media  = array_sum ($pings) / sizeof($pings); //aqui somamos todos os pings e dividimos pela quantidade de pings (tamanho do array)	

		//CALCULANDO JITTER(desvio padrao da latencia)
		$jitter = array();

		for($i = 0; $i < $loops; $i++){
			$jitter[$i] =  pow((($pings[$i]) - $media) , 2); //atribuindo ao array na posicao i o valor da variancia
		}

		$jitter_total = sqrt((array_sum($jitter) / sizeof($jitter)));//tirando raiz da soma de variancias dividida pelo numero de termos somados -- vulgo calculando desvio padrao = jitter
		$result = array ("latency" => $media, "jitter" => round($jitter_total));
		return $result;
	}
?>
 

