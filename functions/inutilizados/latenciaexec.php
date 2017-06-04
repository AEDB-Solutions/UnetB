<?php
	exec('ping 127.0.0.1', $saida, $retorno);
	if (count($saida))
		print 'A Máquina está online e os dados do PING foram gravados em $saida. :)';
	
	else
		print 'A Máquina NÃO está online ou o host não pode ser encontrado. :(';
	
	echo $saida
?>