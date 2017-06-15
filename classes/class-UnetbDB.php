<?php 
	class MySQL{

		private $host     = '127.0.0.1';
		private $user     = 'root';
		private $password = '';
		private $database = 'unetb';

		private $condb;
		private $result;

		public function MySQL(){ //Apenas instancia o Objeto

		}
		//Esta função faz a conexão com o Banco de Dados
		public function connect(){
			$this->condb = mysqli_connect($this->host,$this->user,$this->password,$this->database);

			if(!$this->condb){
				echo 'Falha na conexão com o Banco de Dados!';
				exit;
			}
			mysqli_set_charset($this->condb, 'utf8');
		}
		//Esta função executa uma Query
		public function executeQuery($query){

			$this->connect();

			if($this->result = mysqli_query($this->condb,$query))
				return $this->result;
		}

		public function disconnect(){ //Esta função desconecta do Banco
			return mysqli_close($this->condb);
		}
	}
?>
