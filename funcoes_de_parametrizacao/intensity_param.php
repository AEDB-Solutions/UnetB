<?php

	function intensity_param($inten){
		if ($inten<-70)
		{
			return 0;

			exit;
		}		
		elseif ($inten>0){
			return 10;
		}
		else{
			$j=$inten/-7;
			return 10-$j;
		}
	}
?>