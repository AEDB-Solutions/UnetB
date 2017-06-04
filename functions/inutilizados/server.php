<?php
//main
recv_files();

//functions
$server_listening;
function create_socket(){
	$sh = socket_create(AF_INET,SOCK_STREAM,SOL_TCP);
	if(socket_bind($sh, '127.0.0.1', 4242)){
		echo "Socket liga corretamente. <br/>";
		}
	if( ($ret = socket_listen($socket , 1) ) < 0){
		echo "failed to listen socket";
		exit(0);
		}

		if($socket_accept == -1)
		{
			echo "deu merda no accept";
			exit(0);
		}
	
	//intensidade();	
	//ping();
	download();
	//upload();		
}

//download
function download()
{	
		
			$files = array('100Kb.txt', '200Kb.txt','400Kb.txt', '800Kb.txt', '1Mb.txt', '2Mb.txt', '10Mb.txt', '20Mb.txt');
	
			$speed_vector = array();
			$size_vector  = array();
			$socket = create_socket();
		
			for($i = 0; $i < count($files) ; $i++)
			{
			 
				$get_speed = array();
				$get_size  = array();
		
				$get_size_end_speed = send_archive($files[$i], $socket);
			
				$size  = $get_size_end_speed[0];
				$speed = $get_size_end_speed[1];
			
				$speed_vector[$i] = $speed;
				$size_vector[$i]  = $size;

			}
		}
	
}

function send_archive($file_to_send , $sh){

	$file = file_get_contents('archives_connectionspeed/'.$file_to_send);
	$size = strlen($file)/1024; //Kilobytes

	$time_before_send = microtime(true);
	$time_after_send = send_file($file, $size, $sh);


	$total_time = $time_after_send - $time_before_send;

	$speed = $size/$total_time;

	$size_and_speed = array($size, $speed);

	return $size_and_speed;
}

function send_file($file , $size , $sh){

	if(socket_sendto($sh, $file, $size, 0x8, '127.0.0.1', 4242)){
		$time_after_send = microtime(true);
		return $time_after_send;
	}

	else {
		echo "Mensagem não enviada. <br/>";
		exit(0);
	}
}

?>
