<?php

	session_start();
	if(empty($_POST['email']) || empty($_POST['password'])){
		header('location:http://localhost/UnetB/views/user-register-view.php');
		exit;
	}

	$password = $_POST['password'];
	$email    = $_POST['email'];
	$name     = $_POST['name'];

	require_once "../classes/class-UnetbDB.php"; //arquivo para a classe que conecta ao banco de dados
	require_once "../classes/class-User.php";	 //arquivos para a classe usuário
	require_once "../functions/hash.php";		 //arquivos para gerar o hash para a senha

	$mySQL = new MySQL;

	function registeruser(){

		global $name, $email, $password;
		$User = new User($name, $email, b_hash($password));
		return $User->save();
	}

	function check_on_database($valor,$coluna){

		global $mySQL;
		$executaQuery = $mySQL->executeQuery("SELECT {$coluna} FROM user WHERE {$coluna} = '{$valor}'");

		if(mysqli_num_rows($executaQuery) == 1){	
			return true;
		}
		return false;
	}

//*************************************************************************************************

	if(check_on_database($email, "email"))
		echo " Email já existe.";

	else{
		if(registeruser())
			echo " Cadastro realizado com sucesso.";
			
		else
			echo " Erro ao conectar ao banco de dados.";
	}
?>