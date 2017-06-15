<?php
	if (!isset($_SESSION)) session_start();
	if(!isset($_SESSION['email'])){
		header('location:login-view.php');
	}

	require_once "../classes/class-UnetbDB.php";
	require_once "../functions/hash.php";

	function getUserData($id){
	$mySQL = new MySQL;
	$result = $mySQL->executeQuery("SELECT * FROM user WHERE user_id = '$id'");
	$mySQL->disconnect();
	$data = mysqli_fetch_assoc($result);
	return $data;
	}

	function showData(){
		$data = getUserData($_SESSION['id']);
		if($data['name']){
			echo "<b>Nome: </b>", $data['name'], "</br>", "</br>";
		}
		if($data['email']){
			echo "<b>E-mail: </b>", $data['email'], "</br>", "</br>";
		}
		if($data['cellphone']){
			echo "<b>Celular: </b>", $data['cellphone'], "</br>", "</br>";
		}else echo "<b>Celular não cadastrado.</b>", "</br>", "</br>";
		if($data['course']){
			echo "<b>Curso: </b>", $data['course'], "</br>", "</br>";
		}else echo "<b>Curso não cadastrado.</b>", "</br>", "</br>";
		if($data['matricula']){
			echo "<b>Matrícula: </b>", $data['matricula'], "</br>", "</br>";
		}else echo "<b>Matrícula não cadastrada.</b>", "</br>", "</br>";
	
	}

?>