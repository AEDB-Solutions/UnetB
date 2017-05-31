<?php


//functions

function upload_param($upload_speed)
{
	$escala;
	$pot;
	if($upload_speed >= 10) // > 10 = 10
	{
		$escala = 10;
		return $escala;
	}
	elseif($upload_speed == 0 && $upload_speed < 0.2)  
	{
		$escala = 0;	
		return $escala;
	}	

	elseif($upload_speed >= 0.2 &&$upload_speed <0.5 )
	{
		$pot = pow(0.759657793, $upload_speed);
		$escala = 1.732862107*$pot;	
		return $escala;	
	}	
	elseif($upload_speed >= 0.5 && $upload_speed <= 2)
	{
		$pot = pow(1.587401052, $upload_speed);
		$escala = 0.793700526*$pot;
		return $escala;
	}
 	
	elseif($upload_speed >2 && $upload_speed < 5)
	{
		//$pot = pow(0.492610837, $upload_speed);
		//$escala = 103.419264975*$pot;
		$escala = 1.666666667 + (0.666666667*$upload_speed);		
		return $escala;
	}

	else{// 5 - 10
				
		$escala = $upload_speed;		
		return $escala;
	}
	
}

?>
