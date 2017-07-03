<?php

	function download_sizeMB($size,$byts){

			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, "http://ipv4.download.thinkbroadband.com:8080/".$size.".zip");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_SSLVERSION,3);

			$time_before = microtime(true);
			$data        = curl_exec($ch);
			$time_after  = microtime(true);

			curl_close($ch);

			$size = $byts*8/1048576; //Tamanho em MEGA BITS
			$time = $time_after - $time_before;

			return $size/$time;
	}

	function download(){

		$byts = array(1048576,2097152,5242880,10485760,20971520);
		$size = array( "1MB" , "2MB" , "5MB" , "10MB" , "20MB",);

		return round(download_sizeMB($size[0],$byts[0]),2);
	}
?>
