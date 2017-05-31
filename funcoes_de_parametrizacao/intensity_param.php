<?php
	function intensity_param($intensidade){
		if($intensidade < -70){
			return 0;
		} 
		else if($intensidade > 0){
			return 10;
		}
		else{
			$j=$intensidade/7;
			return $j+10;
		}
	}

?> 		 