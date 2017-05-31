<?php

$file = file_get_contents('archives_connectionspeed/'.'20Mb.txt');
$size = strlen($file);
$source = "http://www.website.com/index.php";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $source);
curl_setopt($ch, CURLOPT_POST, 1L); //upload
curl_setopt($ch, CURLOPT_READDATA, fd); //where to read form
curl_setopt($ch, CURLOPT_VERBOSE, 1L) //enable verbose for easier tracing
$info = curl_setopt($ch, CURLOPT_SPEED_UPLOAD); 

echo $info/10000;

curl_close($ch);






?>
