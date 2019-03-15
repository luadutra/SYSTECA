<?php require "sessao.php";

if($_SESSION['aux'] != 1000) {	
	echo "<script> alert('         VOCÊ NÃO TEM PERMISSÃO PARA ACESSAR ESTA PÁGINA !!'); location.href='sair.php';</script>";
}

    $buscando = "SELECT * FROM cont";
    $resultando = mysqli_query($conexao, $buscando);
	$row = mysqli_fetch_assoc($resultando);
	$quant_alu = $row['cont_alu'];
	$quant_liv = $row['cont_liv'];
	$quant_total = $row['cont_ret'];

?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
</head>
<body>

<style rel="stylesheet">
  .bingo { 
	width:900px; !important;
	height:auto; !important;
	margin:auto; !important;
    }
</style>

<style rel="stylesheet">
  .tango { 
	width:600px; !important;
	height:auto; !important;
	margin:auto; !important;
    }
</style>

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

<div class="bingo">
<hr>
<br>
<div class="form-row">
<div class="form-group col-md-4">
<input autocomplete="off" style="text-align:center; font-weight:bold" name="nome" type="text" class="form-control" id="nome_alu" value="ALUNOS CADASTRADOS: <?php echo $quant_alu; ?>" readonly>
</div>

<div class="form-group col-md-4">
<input autocomplete="off" style="text-align:center; font-weight:bold" name="nome" type="text" class="form-control" id="nome_alu" value="LIVROS CADASTRADOS: <?php echo $quant_liv; ?>" readonly>
</div>

<div class="form-group col-md-4">
<input autocomplete="off" style="text-align:center; font-weight:bold" name="nome" type="text" class="form-control" id="nome_alu" value="TOTAL DE RETIRADAS: <?php echo $quant_total; ?>" readonly>
</div>
</div>
<hr>
</div>

<div class="tango">
<button type="button" class="btn btn-success btn-lg btn-block" onClick="window.location='lista_aberto.php';">RETIRADAS EM ABERTO</button>
<button type="button" class="btn btn-link"></button>
<button type="button" class="btn btn-primary btn-lg btn-block" onClick="window.location='historico_alu.php';">HISTÓRICO POR ALUNO</button>
<button type="button" class="btn btn-link"></button>
<button type="button" class="btn btn-primary btn-lg btn-block" onClick="window.location='lista_ret.php';">LISTAR TODAS AS RETIRADAS</button>
<hr>

<div align="center">
<button type="button" class="btn btn-primary btn-sm" onClick="window.location='menu.php';">VOLTAR AO MENU PRINCIPAL</button>
<hr>
</div>
</div>
</body>
</html>