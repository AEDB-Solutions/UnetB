<?php

// Inicia a sessão
session_start();

// Caminho para a raiz
$_SESSION['ABSPATH'] = dirname( __FILE__ );

// URL da home
$_SESSION['HOME_URI'] = 'http://127.0.0.1/UnetB/views/';

// Nome do host da base de dados
$_SESSION['HOSTNAME'] = 'localhost';

// Nome do DB
$_SESSION['DB_NAME'] = 'unetb';

// Usuário do DB
$_SESSION['DB_USER'] = 'root';

// Senha do DB
$_SESSION['DB_PASSWORD'] = '';

header('location:views/home-logout-view.php');