<?php
	session_start();
	session_destroy();
	header('location:http://localhost/UnetB/views/home-view.php');
?>