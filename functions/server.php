<?php

$server_listening;

$sh = socket_create(AF_INET,SOCK_STREAM,SOL_TCP);
if(socket_bind($sh, '192.168.100.205', 4242)){
		echo "Socket liga corretamente. <br/>";
		exit();}

if( ($ret = socket_listen($sh , 1) ) < 0){
	echo "failed to listen socket";
	exit();
}

if($recv = socket_recv($sh, $buf, $len, 0) < 0)
{
	echo "failed to recieve";
	exit();
} 

else{
	$file = "arquivos foram recebidos";	
	socket_sendto($sh, $file, $size, 0x8, '127.0.0.1', 4242);
	echo "foi";
}




/*socket_set_nonblock($sock); 

while($server_listening)
{
	$connection = @socket_accept($sh);
	if($connection == false)
	{
		usleep(100);
	}

	elseif ($connection > 0)
	{
		$handle_client($sock, $connection);	
	}

	else
	{
		echo "error : ".socket_strerror($connection);
		die;
	}
	
}	


function handle_client ($sh, $connection)
{
	global $server_listening;


}*/


?>
