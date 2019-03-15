
<?php

	function conectar(){
		
		$servidor = "localhost";
		$usuario = "root";
		$senha = "";
		$bd = "banco_saed";
		$conectando = new mysqli($servidor, $usuario, $senha, $bd);
		return $conectando;
		
		}

	$conexao = conectar();
		
?>