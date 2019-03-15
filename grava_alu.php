<?php require "sessao.php";

if($_SESSION['aux'] != 1000) {	
	echo "<script> alert('         VOCÊ NÃO TEM PERMISSÃO PARA ACESSAR ESTA PÁGINA !!'); location.href='sair.php';</script>";
} 

if(empty($_POST)) {
	echo "<script> alert('             ACESSO INDEVIDO !!    -    REDIRECIONANDO . . . '); location.href='menu.php';</script>";
}

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

$nomeAux = (filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING));
$nome = mb_strtoupper($nomeAux,'UTF-8');
$serieAux = filter_input(INPUT_POST, 'serie', FILTER_SANITIZE_STRING);
$serie = mb_strtoupper($serieAux,'UTF-8');

$zero = 0;

$gravando = "INSERT INTO aluno (nome, serie, aberto, retiradas, atrasos) VALUES ('$nome', '$serie', '$zero', '$zero', '$zero')";
$resultado = mysqli_query($conexao, $gravando);

if(mysqli_insert_id($conexao)) {
	
	$busca = "SELECT * FROM cont";
	$resultado = mysqli_query($conexao, $busca);
	$rows_busca = mysqli_fetch_assoc($resultado);
	$cont = $rows_busca['cont_alu'];
	$cont = $cont + 1;

$query6 = mysqli_query($conexao, "UPDATE cont SET cont_alu = '$cont';");
	
?>

<div align="center" class="alert alert-info" role="alert"> <h4>CADASTRO REALIZADO COM SUCESSO !</h4> </div>

<hr>

<div align="center">
<button type="button" class="btn btn-primary btn-lg btn-block" onClick="window.location='add_alu.php';">CADASTRAR NOVO ALUNO</button>
<hr>
<button type="button" class="btn btn-primary btn-lg btn-block" onClick="window.location='lista_alu.php';">LISTAR ALUNOS</button>
<hr>
<button type="button" class="btn btn-primary btn-sm" onClick="window.location='menu.php';">VOLTAR AO MENU PRINCIPAL</button>
<hr>
</div>

<?php } ?>

</div>
</body>
</html>