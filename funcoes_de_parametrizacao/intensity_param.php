<?php 
	function intensity_param($intensidade){
		if ($intensidade<-70)
		{
			return 0;
			//exit;
		};
		if ($intensidade>0){
			return 10;
		}
	}
?>