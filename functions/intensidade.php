<?php
function checkPacketLoss() {

	// Comando ping -c que retorna informações sobre pacotes de dados, como pacotes transmitidos, recebidos e perdidos;

    $command = 'iwconfig | grep "Signal level"';
    $dados=array();
    //Executa comando na máquina para pegar a intensidade do sinal de WiFi.
    for($i=1;$i<=100;$i++)
    {
      $output = shell_exec($command);
      $slevel=getSignalLevel($output);
      $dados[$i]=$slevel;
      echo "Sinal $i: $slevel<br>";
      usleep(50000);
    }
    echo var_dump($dados);

}

// Usaremos o servidor local para testes com contagem 40;
echo checkPacketLoss();

function getSignalLevel($unix_result) {
  return substr($unix_result, strpos($unix_result, '-'), strlen($unix_result) -60);
}

?>