<?php 
	if (!isset($_SESSION)) session_start();
	if(!isset($_SESSION['email'])){
		header('location:login-view.php');
	}

	require_once "../classes/class-UnetbDB.php";
	require_once "../functions/hash.php";
	require_once "../classes/class-Settings.php";

	$id 	   = $_SESSION['id'];
	$name      = $_POST['name'];
	$email     = $_POST['email'];
	$lastpass  = $_POST['lastpassword'];
	$newpass   = $_POST['newpassword'];
	$course    = $_POST['course'];
	$matricula = $_POST['matricula'];
	$cellphone = $_POST['cellphone'];
	$password  = definePassword($lastpass, $newpass);	 
	
	$mySQL = new MySQL;

	function definePassword($last, $new){
		if($new == NULL){
			return $last;
		}else{
			return $new;
		}
	}

	function checkEmail($valor,$coluna, $id){
		global $mySQL;	
		$executaQuery = $mySQL->executeQuery("SELECT {$coluna} FROM user WHERE user_id = {$id}");
		$data = mysqli_fetch_assoc($executaQuery);

		if(mysqli_num_rows($executaQuery) == 1 && $valor != $data['email']){	
			return true;
		}else
			return false;
	}

	function updateUser(){

		global $name, $email, $password, $matricula, $course, $cellphone, $id;
		$User = new UserData($name, $email, b_hash($password), $matricula, $course, $cellphone);
		return $User->update_data($id);
	}

	function checkPassword($id, $lastpassword){
		global $mySQL;
		$result = $mySQL->executeQuery("SELECT * FROM user WHERE user_id = {$id}");
		$mySQL->disconnect();
		$data = mysqli_fetch_assoc($result);
		if(verify($lastpassword, $data['password'])){
			return false;
		}else{
			return true;
		}
	}

	if(checkEmail($email, "email", $id)){
		echo " E-mail já existe.";
	}else if (checkPassword($id, $lastpass)){
		echo " Senha Incorreta.";
	}else if(updateUser()){
		echo " Atualização feita com sucesso.";
	}else 
		echo " Erro ao conectar com o bando de dados.";
?>