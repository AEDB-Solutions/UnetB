<?php

	class User{

		private $name;
		private $email;
		private $password;
		private $matricula;
		private $course;
		private $cellphone;


		public function set_name ($name){
			$this -> name = $name;
		}

		public function set_email ($email){
			$this -> email = $email;
		}

		public function set_password ($password){
			$this -> password = $password;
		}

		public function set_matricula ($matricula){
			$this -> matricula = $matricula;
		}

		public function set_course ($course){
			$this -> course = $course;
		}

		public function set_cellphone ($cellphone){
			$this -> cellphone = $cellphone;
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

		public function get_matricula (){
			return $this -> matricula;
		}

		public function get_course (){
			return $this -> pcourse;
		}

		public function get_cellphone (){
			return $this -> cellphone;
		}

		public function __construct ($name, $email, $password, $matricula, $course, $cellphone){
			$this->name = $name;
			$this->email = $email;
			$this->password = $password;
			$this->matricula = $matricula;
			$this->course = $course;
			$this->cellphone = $cellphone;
		}

		public function save($email){

			$mySQL = new MySQL;
			return $mySQL->executeQuery("UPDATE user (name, email, password, course, matricula, cellphone) VALUES ('{$this->name}','{$this->email}','{$this->password}', '{$this->course}', '{$this->matricula}', '{$this->cellphone}') WHERE email = '{$email}'");
		}
	}
?>