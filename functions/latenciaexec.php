<?php
	exec('ping 127.0.0.1', $saida, $retorno);
	if (count($saida))
		print 'A M�quina est� online e os dados do PING foram gravados em $saida. :)';
	
	else
		print 'A M�quina N�O est� online ou o host n�o pode ser encontrado. :(';
	
	echo $saida
?>