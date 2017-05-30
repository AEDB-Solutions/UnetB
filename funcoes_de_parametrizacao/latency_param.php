<?php 

function latency_param($x)
{

	if($x > 208)
	$x = 0;
	else 
	$x = 10 - (5.3 * $x/ 110); 

return round($x);
} 


?>

