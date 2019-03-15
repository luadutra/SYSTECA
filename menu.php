<?php require "sessao.php";

if($_SESSION['aux'] != 1000) {
	
	echo "<script> alert('         VOCÊ NÃO TEM PERMISSÃO PARA ACESSAR ESTA PÁGINA !!'); location.href='sair.php';</script>";

} else {

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
	width:1000px; !important;
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

<hr><br>

<div class="form-row">
<div class="form-group col-md-6">
	<button style="font-size:28px; margin:auto" type="button" class="btn btn-success btn-lg btn-block" onClick="window.location='add_ret.php';">RETIRADA</button>
</div>
<div class="form-group col-md-6">
	<button style="font-size:28px; margin:auto" type="button" class="btn btn-danger btn-lg btn-block" onClick="window.location='add_dev.php';">DEVOLUÇÃO</button>
</div>
</div>
<hr>
</div>

<br><br>

<div class="tango">
<div class="form-row">
	<button style="margin:auto" type="button" class="btn btn-primary" onClick="window.location='ger_alu.php';">GERENCIAR ALUNOS</button>
	<button style="margin:auto" type="button" class="btn btn-primary" onClick="window.location='ger_liv.php';">GERENCIAR LIVROS</button>
	<button style="margin:auto" type="button" class="btn btn-primary" onClick="window.location='ger_ser.php';">GERENCIAR SÉRIES</button>
	<button style="margin:auto" type="button" class="btn btn-primary" onClick="window.location='ger_ret.php';">HISTÓRICOS</button>
	<button style="margin:auto" type="button" class="btn btn-primary" onClick="window.location='meus_dados.php?aux=<?php echo $_SESSION['login'];?>';">ALTERAR MEUS DADOS</button>
</div>

<br><br>
<hr>
</div>

<?php } ?>

</body>
</html>