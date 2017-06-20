<?php

	function checkIntensity() {

			$command = 'iwconfig | grep "Signal level"';
			$dados=array();
			//Executa comando na máquina para pegar a intensidade do sinal de WiFi.
			for($i=1;$i<=100;$i++){
				
				$output = shell_exec($command);
				$slevel=getSignalLevel($output);
				$dados[$i]=$slevel;
				// echo "Sinal $i: $slevel<br>";
				usleep(50000);
			}

			$intensity = 0;
			// echo var_dump($dados);
			for($j=1; $j<=100; $j++){
				$intensity = $intensity + $dados[$j];
			}

			return $intensity/100;
	}

	function getSignalLevel($unix_result) {
		return substr($unix_result, strpos($unix_result, '-'), strlen($unix_result) -60);
	}

	function intensityLevel(){
		if($intensidade < -50)
			$level = 1;
		else if($intensidade > -50 && $intensidade < -40)
			$level = 2;
		else if($intensidade > -40 && $intensidade < -30)
			$level = 3;
		else if($intensidade > -30 && $intensidade < -20)
			$level = 4;
		else if($intensidade > -20 && $intensidade < -10)
			$level = 5;
		else if($intensidade > -10)
			$level = 6;
			return	$level;
	}
?>