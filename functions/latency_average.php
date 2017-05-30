<?php
	// Function to check response time -- vulgo latência
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
		return $status . ' ms';
	}
	
	$max_reps = 100;
	$pings = array (); //criando um array para armazenar os resultados de pingDomain

	for ( $i = 0; $i < $max_reps; $i++) //laço for para preencher o array com 100 pings	
	   $pings[$i] = pingDomain("www.unb.br"); // pingando um domínio qualquer
	

	$media  = array_sum ($pings) / sizeof($pings); //aqui somamos todos os pings e dividimos pela quantidade de pings (tamanho do array)
	
	echo 'Latência: '.$media . ' ms <br>';

	//CALCULANDO JITTER(desvio padrao da latencia)

	$jitter = array();

	for($i = 0; $i < $max_reps; $i++)
	{
		$valor_ping = number_format(floatval($pings[$i])); //Tentando transformar os numeros de string para floats

		$num = pow(($valor_ping - $media) , 2); //calculando um dos termos da variancia

		$jitter[$i] = floor($num); //atribuindo ao array na posicao i o valor da variancia
	}

	$jitter_total = sqrt(array_sum($jitter) / $max_reps);//tirando raiz da soma de variancias dividida pelo numero de termos somados -- vulgo calculando desvio padrao = jitter

	echo 'Jitter: ';
	echo number_format($jitter_total, 3);

?>


