<?php

$file = file_get_contents('archives_connectionspeed/'.'20Mb.txt');
$size = strlen($file);
$source = 'http://example.com/settings/upload-img';
//"http://www.website.com/index.php"
//'http://1234.4321.67.11/upload.php'
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $source);
curl_setopt($ch, CURLOPT_POST, 1); //upload
//curl_setopt($ch, CURLOPT_READDATA, $file); //where to read form
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $file);
curl_setopt($ch, CURLOPT_VERBOSE, 1); //enable verbose for easier tracing
$data = curl_exec ($ch);
$error = curl_error($ch);

$info = curl_getinfo($ch, CURLINFO_SPEED_UPLOAD); 
curl_close($ch);

echo $info/10000;
return $info;
?>
