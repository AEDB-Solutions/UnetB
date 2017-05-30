<?php
checkPacketLoss('google.com.br',10);
function checkPacketLoss($address, $count) {
	
	// Comando ping -c que retorna informações sobre pacotes de dados, como pacotes transmitidos, recebidos e perdidos;
    
    $command = 'ping -c %d %s';
    
    //Executa comando na máquina com o endereço do servidor e o número de contagem.
    
    $output = shell_exec(sprintf($command, $count, $address));
    

    // a função preg_match retorna um valor para saber se obtivemos sucesso ou não na busca. Neste casso ela irá procurar no resultado do comando acima a porcentagem de perda de pacotes, e armazená-la na variável martch.
    

    if (preg_match('/([0-9]*\.?[0-9]+)%(?:\s+packet)?\s+loss/', $output, $match) === 1) {
        
        // Se houver compatibilidade na procura
        $packetLoss = (float)$match[1]; 
    } else {
    	// 
        throw new \Exception('Packet loss not found.');
    }
    echo $packetLoss;

    return $packetLoss;
}

// Usaremos o servidor local para testes com contagem 40;
// echo checkPacketLoss('127.0.0.1', 40);

?>