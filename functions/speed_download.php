<?php
	function download($ping){

		$source = "http://speedtest.wdc01.softlayer.com/downloads/test10.zip";
		$ch = curl_init();
		
		curl_setopt($ch, CURLOPT_URL, $source);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSLVERSION,3);
		
		$data = curl_exec($ch);
		$error = curl_error($ch);
		$info = curl_getinfo($ch, CURLINFO_SPEED_DOWNLOAD)/100000;	
		curl_close($ch);

		return round($info,2);
	}
?>