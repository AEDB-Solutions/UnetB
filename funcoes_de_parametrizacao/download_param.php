<?php


//functions

function download_param($download_speed)
{
	$escala;
	$pot;
	if($download_speed >= 30)
	{
		$escala = 10;
		return $escala;
	}
	elseif($download_speed == 0 )
	{
		$escala = 0;	
		return $escala;
	}	

	elseif($download_speed > 0 &&$download_speed <0.5 )
	{
		$pot = pow(0.00243, $download_speed);
		$escala = 0.182574186*$pot;	
		return $escala;	
	}	
	elseif($download_speed >= 0.5 && $download_speed <= 1)
	{
		$pot = pow(1.081180751, $download_speed);
		$escala = 0.961724872*$pot;
		return $escala;
	}
	
	elseif($download_speed >1 && $download_speed < 3)
	{
		$pot = pow(1.469734492, $download_speed);
		$escala = 1.309384575*$pot;
		return $escala;
	}

	else{// 3 - 30 
		$pot = pow( 1.026004485, $download_speed);		
		$escala = 4.629373557*$pot;
		return $escala;
	}
	echo $escala;
}

?>
