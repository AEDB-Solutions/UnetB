<?php

	session_start();
	if(empty($_POST['email']) || empty($_POST['password']) ){
		header('location:http://localhost/UnetB/views/login-view.php');
		exit;
	}

	$email    = $_POST['email'];
	$password = $_POST['password'];

	require_once "../classes/class-UnetbDB.php";   //arquivo para a classe que conecta ao banco de dados
	require_once "../functions/hash.php";		   //arquivos para gerar o hash para a senha

	//Conecta ao bando de dados
	$mySQL = new MySQL;
	$resultadoQuery = $mySQL->executeQuery("SELECT * FROM user WHERE email = '{$email}'");
	$mySQL->disconnect();

	$resultado = mysqli_fetch_assoc($resultadoQuery);// Salva os dados encontados na variável $resultado

	if (verify($password ,$resultado['password'])){

		$_SESSION['email'] = $resultado['email'];
		$_SESSION['nome']  = $resultado['name'];
		$_SESSION['id'] = $resultado['user_id'];

		echo 'logado';

	}else
		echo 'invalido';
?>