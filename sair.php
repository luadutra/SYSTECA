<?php

	session_start();
	unset($_SESSION['login']);
	unset($_SESSION['senha']);
	unset($_SESSION['aux']);
	session_destroy();
	header('Location: login.php');
	exit;

?>