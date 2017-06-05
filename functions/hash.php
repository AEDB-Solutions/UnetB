<?php

	//função geradora de HASH para as senhas
	function b_hash ($password){
		if (defined("CRYPT_BLOWFISH") && CRYPT_BLOWFISH){ // o método utilizado é o BLOWFISH

			// gerando um salt aleatório para evitar colisões de hash e aumentar a segurança
			$salt = '$2y$11$' . substr(md5(uniqid(rand(), true)), 0, 22);
			return crypt($password, $salt);
		}
	}


	function verify($password, $hashedPassword){

		return crypt($password, $hashedPassword) == $hashedPassword;
	}

?>