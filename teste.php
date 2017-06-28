<?php

	$teste = 
"
insira os dados aqui

";


$cont = 0;
$contin = 0;
for ($i=0; $i < strlen($teste) - 3; $i++) { 
	if($teste[$i] == '-' && $teste[$i + 1] == '1' && $teste[$i+2] == '5'){
		if ($teste[$i+7] == '1') {
			$teste[$i+7] = '0';
		}
		else if ($teste[$i+7] == '3') {
			$teste[$i+7] = '2';
		}
		else if ($teste[$i+7] == '5') {
			$teste[$i+7] = '4';
		}
		else if ($teste[$i+7] == '7') {
			$teste[$i+7] = '6';
		}
		else if ($teste[$i+7] == '9') {
			$teste[$i+7] = '8';
		}
	}
	if($teste[$i] == '-' && $teste[$i + 1] == '4' && $teste[$i+2] == '7'){
		
		if ($teste[$i+7] == '1') {
			$teste[$i+7] = '0';
		}
		else if ($teste[$i+7] == '3') {
			$teste[$i+7] = '2';
		}
		else if ($teste[$i+7] == '5') {
			$teste[$i+7] = '4';
		}
		else if ($teste[$i+7] == '7') {
			$teste[$i+7] = '6';
		}
		else if ($teste[$i+7] == '9') {
			$teste[$i+7] = '8';
		}
		
	}

}
echo $teste;

?>