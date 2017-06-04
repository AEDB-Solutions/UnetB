<? 
	set_time_limit(0);	
	
	$time_start= microtime(true);

	$conteudo=file_get_contents('archives_connectionspeed/20Mb.txt');
	$tamanho_KB= strlen($conteudo)/1024;

	$time_end = microtime(true);
	


	$tempo_utilizado = $time_end - $time_start;
	$velocidade = round($tamanho_KB/$tempo_utilizado);
	

	
	echo 'Sua velocidade de conexão é de: '.$velocidade.' Kbps <br> 
		  Foram enviados: '.$tamanho_KB.' Kb <br> 
		  Tempo utilizado: '.round($tempo_utilizado,4).' Segundos 
	 <hr>';
?>
