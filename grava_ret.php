<?php require "sessao.php";

if($_SESSION['aux'] != 1000) {	
	echo "<script> alert('         VOCÊ NÃO TEM PERMISSÃO PARA ACESSAR ESTA PÁGINA !!'); location.href='sair.php';</script>";
}

if(empty($_POST)) {
	echo "<script> alert('             ACESSO INDEVIDO !!    -    REDIRECIONANDO . . . '); location.href='menu.php';</script>";
}

$data = date('Y-m-d');
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="estilo.css" />
</head>
<body>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <div id="wrapper">
        <div class="overlay"></div>
    
        <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
            <ul class="nav sidebar-nav">

                <li class="sidebar-brand">               
                <button type="button" class="btn btn-link" aria-label="Left Align" onClick="window.location='menu.php';">
                <h4><span class="glyphicon glyphicon-home" aria-hidden="true"></span></h4>
                </button>
                </li>
                
                <li>
                    <a href="http://localhost/sistema_saed/ger_alu.php"><h4>ALUNOS</h4></a>
                </li>
                <li>
                    <a href="http://localhost/sistema_saed/ger_liv.php"><h4>LIVROS</h4></a>
                </li>
                <li>
                    <a href="http://localhost/sistema_saed/ger_ser.php"><h4>SÉRIES</h4></a>
                </li>
                <li>
                    <a href="http://localhost/sistema_saed/ger_ret.php"><h4>HISTÓRICOS</h4></a>
                </li>

                <li class="sidebar-brand">               
                <button type="button" class="btn btn-link" aria-label="Left Align" onClick="window.location='sair.php';">
                <h4><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></h4>
                </button>
                </li>
            </ul>
        </nav>
		<hr>
        </div>

<hr>      

<div align="center"> <p><img src="imagem.jpg" width="401" height="148"></p> </div>

<div class="menu">

<hr>

<?php

$aluno = filter_input(INPUT_POST, 'aluno', FILTER_SANITIZE_STRING);
$livro = filter_input(INPUT_POST, 'livro', FILTER_SANITIZE_STRING);

	$busca = "SELECT * FROM aluno WHERE alu_cod = '$aluno'";
	$resultado = mysqli_query($conexao, $busca);
	$rows_busca = mysqli_fetch_assoc($resultado);
	$nome_alu = $rows_busca['nome'];
	$serie = $rows_busca['serie'];
	$aberto = $rows_busca['aberto'];
	$aberto = $aberto + 1;
	$retiradas = $rows_busca['retiradas'];
	$retiradas = $retiradas + 1;
		
	$busca = "SELECT * FROM livro WHERE codigo_liv = '$livro'";
	$resultado = mysqli_query($conexao, $busca);
	$rows_busca = mysqli_fetch_assoc($resultado);
	$nome_liv = $rows_busca['nome'];
	$retirados = $rows_busca['retiradas'];
	$retirados = $retirados + 1;
	
	$situacao = "EMPRESTADO";
	$situ = 1;
	$data_br = 	date('d/m/Y', strtotime($data));	
	
$gravando = "INSERT INTO retirada (alu_cod, aluno, codigo_liv, livro, data_ret, data_br_ret, situacao, serie) VALUES ('$aluno', '$nome_alu', '$livro', '$nome_liv', '$data', '$data_br', '$situ', '$serie')";
$resultado = mysqli_query($conexao, $gravando);

$query1 = mysqli_query($conexao, "UPDATE aluno SET aberto = '$aberto', retiradas = '$retiradas' WHERE alu_cod = '$aluno';");
$query2 = mysqli_query($conexao, "UPDATE livro SET retiradas = '$retirados', situacao = '$situacao' WHERE codigo_liv = '$livro';"); 

	$busca = "SELECT * FROM cont";
	$resultado = mysqli_query($conexao, $busca);
	$rows_busca = mysqli_fetch_assoc($resultado);
	$cont = $rows_busca['cont_ret'];
	$cont = $cont + 1;

$query6 = mysqli_query($conexao, "UPDATE cont SET cont_ret = '$cont';");

$gravando1 = "INSERT INTO aberto (aluno, codigo_liv, livro, data_ret, data_br, serie) VALUES ('$nome_alu', '$livro', '$nome_liv', '$data', '$data_br', '$serie')";
$resultado1 = mysqli_query($conexao, $gravando1);


?>

    <div align="center" class="alert alert-info" role="alert">
    <h4>RETIRADA REALIZADA COM SUCESSO !</h4>
    </div><hr>
  
    <div align="center">
    <button type="button" class="btn btn-primary btn-sm" onClick="window.location='menu.php';">VOLTAR AO MENU PRINCIPAL</button>
    <hr></div>

</div>
</body>
</html>