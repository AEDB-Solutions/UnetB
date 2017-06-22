<?php

	function checkPacketLoss($address, $count) {

		// Comando ping -c que retorna informações sobre pacotes de dados, como pacotes transmitidos, recebidos e perdidos;

		$command = 'ping -c %d %s';

		//Executa comando na máquina com o endereço do servidor e o número de contagem.

		$output = shell_exec(sprintf($command, $count, $address));


		// preg_match: -procura a % de perda de pacotes no resultado do comando(retorna 1 se sim) e a armazena no array match.


		if (preg_match('/([0-9]*\.?[0-9]+)%(?:\s+packet)?\s+loss/', $output, $match) === 1) {

			// Se houver compatibilidade na procura
			$packetLoss = (float)$match[1]; 
		} else {

			throw new \Exception('Packet loss not found.');
		}
		return $packetLoss;
	}
?>