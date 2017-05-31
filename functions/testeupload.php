<?php


$kb1 = 100Kb.txt;
$kb2 = 200Kb.txt;
$kb3 = 400Kb.txt;
$kb4 = 800Kb.txt;
$kb5 = 1Mb.txt;
$kb6 = 2Mb.txt;
$kb7 = 20Mb.txt;

$kbm = (($kb1 + $kb2 + $kb3 + $kb4 + $kb5 + $kb6 + $kb7 + $kb8) / 8);
echo "streaming $kbm Kb...<!-";
flush();
$time = explode(" ",microtime());
$start = $time[0] + $time[1];
for($x=0;$x<$kb;$x++)
{
    echo str_pad('', 1024, '.');
    flush();
}
$time = explode(" ",microtime());
$finish = $time[0] + $time[1];
$deltat = $finish - $start;
echo "-> Test finished in $deltat seconds. Your speed is ". round($kbm / $deltat, 3)."Kb/s";
?>

