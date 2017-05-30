<?php
	require_once "../functions/intensidade.php"; 
	function intensity_param($intensidade){
		if ($intensidade<-70)
		{
			return 0;
		}
		else if ($intensidade>0){ 
			return 10;
		}
		else{
			return ((0.14285714285) * $intensidade)+10;
		}
	}
?>