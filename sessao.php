<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

	<?php
	
	require "conexao.php";
	
	session_start();
	
	$login = $_SESSION['login'];
	$senha = $_SESSION['senha'];

	if($login == '') {
		header('Location: sair.php');	
	} else if($senha == '') {
		header('Location: sair.php');	
	} else {

	}
			
	?>

</body>
</html>