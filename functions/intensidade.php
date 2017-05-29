<?php
function checkIntensity() {


    $command = 'iwconfig | grep "Signal level"';
    $dados=array();
    //Executa comando na máquina para pegar a intensidade do sinal de WiFi.
    for($i=1;$i<=100;$i++)
    {
      $output = shell_exec($command);
      $slevel=getSignalLevel($output);
      $dados[$i]=$slevel;
      // echo "Sinal $i: $slevel<br>";
      usleep(50000);
    }
    $intensity = 0;
    // echo var_dump($dados);
    for($j=1; $j<=100; $j++)
    {
      $intensity = $intensity + $dados[$j];
    }
    return $intensity/100;

}

// echo checkIntensity();

function getSignalLevel($unix_result) {
  return substr($unix_result, strpos($unix_result, '-'), strlen($unix_result) -60);
}

?>