<?php

	function download_sizeMB($source){

			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $source);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_SSLVERSION,3);
			
			$data = curl_exec($ch);
			$error = curl_error($ch);
			$info = curl_getinfo($ch, CURLINFO_SPEED_DOWNLOAD)/100000;
			curl_close($ch);
			return $info;
	}

	function download(){

		$source = "http://ipv4.download.thinkbroadband.com:8080/1MB.zip";
		$times = array();
		$result;
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $source);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSLVERSION,3);

		$data = curl_exec($ch);
		$error = curl_error($ch);
		$time_start = microtime(true);
		$info = curl_getinfo($ch, CURLINFO_SPEED_DOWNLOAD)/100000;	
		$time_end = microtime(true);
		$time = ($time_end - $time_start) * 100000;

		//array_push($times, $time);
		array_push($times, $info); // tem que guardar as velocidades, não o tempo 
		if($time > 0.2 && $time <=0.4 ){
			$source = "http://ipv4.download.thinkbroadband.com:8080/2MB.zip";
			$info = download_sizeMB($source);
			array_push($times, $info);
		}
		else if($time > 0.1 && $time <= 0.2){
			$source = "http://ipv4.download.thinkbroadband.com:8080/5MB.zip";
			$info = download_sizeMB($source);
			array_push($times, $info);
		}
		else if($time > 0.05 && $time <= 0.1){
			$source = "http://ipv4.download.thinkbroadband.com:8080/10MB.zip";
			$info = download_sizeMB($source);
			array_push($times, $info);
		}
		else if($time <= 0.05){
			$source = "http://ipv4.download.thinkbroadband.com:8080/20MB.zip";
			$info = download_sizeMB($source);
			array_push($times, $info);
		}
		curl_close($ch);
		$result = array_sum($times)/ count($times);
		return round($result,2);
	}
?>
