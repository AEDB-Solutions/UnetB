<?php

	function intensity_param($intensidade){
		if ($intensidade<-70)
		{
			return 0;

			exit;
		}
		elseif ($intensidade>0){
			return 10;
		}
		else{
			return $intensidade/-7;
		}
	}
?>