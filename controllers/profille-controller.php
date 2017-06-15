<?php 
	
	require_once "../classes/class-UnetbDB.php";
	require_once "../functions/hash.php";
	require_once "../classes/class-Settings.php";

	$name = $_POST['name'];
	$email    = $_POST['email'];
	$lastpass    = $_POST['lastpassword'];
	$newpass = $_POST['newpassword'];
	$course    = $_POST['course'];
	$matricula     = $_POST['matricula'];
	$cellphone    = $_POST['cellphone'];

	function checkEmail($valor,$coluna){
		$mySQL = new MySQL;	
		$executaQuery = $mySQL->executeQuery("SELECT {$coluna} FROM user WHERE {$coluna} = '{$valor}'");

		if(mysqli_num_rows($executaQuery) == 1){	
			return true;
		}
		return false;
	}

	function checkPassword($email, $lastpassword){
		$mySQL = new MySQL;
		$resultadoQuery = $mySQL->executeQuery("SELECT * FROM user WHERE email = '{$email}'");
		$mySQL->disconnect();
		$data = mysqli_fetch_assoc($resultadoQuery);
		if(verify($lastpassword, $data['password'])){
			return true;
		}else{
			return false;
		}
	}

	function insertInfo(){
		global $name, $email, $password, $course, $newpass, $matricula, $cellphone;
		$User = new User($name, $email, b_hash($password), $matricula, $course, $cellphone);
		return $User->save($email);
	}


	if(checkEmail($email, 'email'))
		echo "E-mail já existe.";
	else if(checkPassword($email, $lastpass)){
		echo "Senha Incorreta.";
	}else if(insertInfo()){
		echo " Atualização bem sucedida.";
	}else 
		echo "Erro ao conectar com o bando de dados.";
?>