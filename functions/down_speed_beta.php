<?php




function download_sizeMB($source)
{
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
array_push($times, $time);

		if($time > 1 && $time <= 2)
		{		
			$source = "http://ipv4.download.thinkbroadband.com:8080/10MB.zip";
			$info = download_10MB($source);
			array_push($times, $info);
		}

		if($time > 0.5 && $time <= 1)
		{
			$source = "http://ipv4.download.thinkbroadband.com:8080/20MB.zip";
			$info = download_20MB($source);
			array_push($times, $info);
		}
	
		if($time > 0.25 && $time <= 0.5)
		{
			$source = "http://ipv4.download.thinkbroadband.com:8080/30MB.zip";
			$info = download_100MB($source);
			array_push($times, $info);
		}
		
		if($time <= 0.25)
		{
			$source = "http://ipv4.download.thinkbroadband.com:8080/40MB.zip";
			$info = download_200MB($source);
			array_push($times, $info);
		}
		
		

		curl_close($ch);
		$result = array_sum($times)/ count($times);	
		return round($result,2);
	}


echo download();


?>
