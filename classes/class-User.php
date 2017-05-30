<?php

	class User{

		private $name;
		private $email;
		private $password;

		public function set_name ($name){
			$this -> name = $name;
		}

		public function set_email ($email){
			$this -> email = $email;
		}

		public function set_password ($password){
			$this -> password = $password;
		}

		public function get_name (){
			return $this -> nome;
		}

		public function get_email (){
			return $this -> email;
		}

		public function get_password (){
			return $this -> password;
		}

		public function __construct ($name, $email, $password){
			$this->name = $name;
			$this->email = $email;
			$this->password = $password;
		}

		public function save(){

			global $mySQL;
			return $mySQL->executeQuery("INSERT INTO user (name, email, password) VALUES ('{$this->name}','{$this->email}','{$this->password}')");
		}
	}
?>