<?php

function download(){
$source = "http://ipv4.download.thinkbroadband.com:8080/5MB.zip";

	$ch = curl_init();
		
		curl_setopt($ch, CURLOPT_URL, $source);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSLVERSION,3);
		
		$data = curl_exec($ch);
		$error = curl_error($ch);
		$time_start = microtime(true);
		$info = curl_getinfo($ch, CURLINFO_SPEED_DOWNLOAD)/100000;	
$time_end = microtime(true);

$time = $time_end - $time_start;
$time =  $time*100000;		



		if($time <= 0.25)
		{
			$source = "http://ipv4.download.thinkbroadband.com:8080/200MB.zip";
			$info = download_200MB($ch);
		}
		if($time > 0.25 && $time <= 0.5)
		{
			

			$source = "http://ipv4.download.thinkbroadband.com:8080/100MB.zip";
			$info = download_100MB($ch);
		}
		if($time > 0.5 && $time <= 1)
		{
			$source = "http://ipv4.download.thinkbroadband.com:8080/20MB.zip";
			$info = download_20MB($ch);
		}
		if($time > 1 && $time <= 2)
		{
			
		
			$source = "http://ipv4.download.thinkbroadband.com:8080/10MB.zip";
			$info = download_10MB($ch);
		}

		curl_close($ch);

		return round($info,2);
	}

function download_200MB($ch)
{
	$source = "http://ipv4.download.thinkbroadband.com:8080/200MB.zip";
//	$ch = curl_init();
		echo "200: ";
		curl_setopt($ch, CURLOPT_URL, $source);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSLVERSION,3);
		
		$data = curl_exec($ch);
		$error = curl_error($ch);
		$info = curl_getinfo($ch, CURLINFO_SPEED_DOWNLOAD)/100000;
			curl_close($ch);

		return $info;	
}

function download_100MB($ch)
{
	$source = "http://ipv4.download.thinkbroadband.com:8080/100MB.zip";
//	$ch = curl_init();
		echo "100: ";
		curl_setopt($ch, CURLOPT_URL, $source);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSLVERSION,3);
		
		$data = curl_exec($ch);
		$error = curl_error($ch);
		$info = curl_getinfo($ch, CURLINFO_SPEED_DOWNLOAD)/100000;
			curl_close($ch);

		return $info;	
}

function download_20MB($ch)
{
	$source = "http://ipv4.download.thinkbroadband.com:8080/20MB.zip";
//	$ch = curl_init();
		echo "20: ";
		curl_setopt($ch, CURLOPT_URL, $source);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSLVERSION,3);
		
		$data = curl_exec($ch);
		$error = curl_error($ch);
		$info = curl_getinfo($ch, CURLINFO_SPEED_DOWNLOAD)/100000;
			curl_close($ch);

		return $info;	
}
function download_10MB($ch)
{
	$source = "http://ipv4.download.thinkbroadband.com:8080/10MB.zip";
//	$ch = curl_init();
		echo "10: ";
		curl_setopt($ch, CURLOPT_URL, $source);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSLVERSION,3);
		
		$data = curl_exec($ch);
		$error = curl_error($ch);
		$info = curl_getinfo($ch, CURLINFO_SPEED_DOWNLOAD)/100000;
			curl_close($ch);

		return $info;	
}

?>