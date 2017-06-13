<?php
		if (!isset($_SESSION)) session_start();
	if(!isset($_SESSION['email'])){
		header('location:login-view.php');
	}

	require_once "../classes/class-UnetbDB.php";

	function getUserData($email){
	$mySQL = new MySQL;
	$result = $mySQL->executeQuery("SELECT * FROM user WHERE email = '$email'");
	$mySQL->disconnect();
	$data = mysqli_fetch_assoc($result);
	return $data;
	}

	function showData(){
		$data = getUserData($_SESSION['email']);
		if($data['name']){
			echo "<b>Nome: </b>", $data['name'], "</br>";
		}
		if($data['email']){
			echo "<b>E-mail: </b>", $data['email'], "</br>";
		}
		if($data['cellphone']){
			echo "<b>Celular: </b>", $data['cellphone'], "</br>";
		}else echo "<b>Celular não cadastrado.</b>", "</br>";
		if($data['course']){
			echo "<b>Curso: </b>", $data['course'], "</br>";
		}else echo "<b>Curso não cadastrado.</b>", "</br>";
		if($data['matricula']){
			echo "<b>Matrícula: </b>", $data['matricula'], "</br>";
		}else echo "<b>Matrícula não cadastrada.</b>", "</br>";
	}
?>