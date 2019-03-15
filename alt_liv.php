<?php require "sessao.php";

if($_SESSION['aux'] != 1000) {	
	echo "<script> alert('         VOCÊ NÃO TEM PERMISSÃO PARA ACESSAR ESTA PÁGINA !!'); location.href='sair.php';</script>";
}
	
if(!isset($_GET['aux']) || ($_GET['aux'] == NULL)) {
	echo "<script> alert('             ACESSO INDEVIDO !!    -    REDIRECIONANDO . . . '); location.href='menu.php';</script>";
}

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
	width:700px; !important;
	height:auto; !important;
	margin:auto; !important;
    }
</style>

<style rel="stylesheet">
  .tango { 
	width:500px; !important;
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


<?php 

	$passada = $_GET['aux'];
	
	$busca = "SELECT * FROM livro WHERE codigo_liv = '$passada'";
	$resultado = mysqli_query($conexao, $busca);
	$grava = mysqli_fetch_assoc($resultado);
	
	$nome = $grava['nome'];
	$genero = $grava['genero'];

?>
          	
<hr>
<div align="center"> <p><img src="imagem.jpg" width="401" height="148"></p> </div>

<form method="post" action="grava_alt_liv.php?aux=<?php echo $passada;?>">

<div class="bingo">

<hr>

<div class="form-row">
<div class="form-group col-md-4">
    <div align="center"><label for="inputFone"><b>CÓDIGO</b></label></div>
    <input autocomplete="off" style="text-align:center" name="codigo" type="text" class="form-control" id="fone_alu" value="<?php echo $passada; ?>" autofocus required>
</div>
    
<div class="form-group col-md-8">
    <div align="center"><label for="inputFone"><b>GÊNERO</b></label></div>
    <input autocomplete="off" style="text-align:center" name="genero" type="text" class="form-control" id="fone_alu" value="<?php echo $genero; ?>">
</div>
</div>

<br>

<div class="tango">
   	<div class="form-group">
        <div align="center"><label for="nome"><b>NOME DO LIVRO</b></label></div>
    <input autocomplete="off" style="text-align:center" name="nome" type="text" class="form-control" id="nome_alu" value="<?php echo $nome; ?>" required>
 	 </div>
</div>
     
  <hr>     
 
  <div align="center">
  <button type="submit" class="btn btn-primary btn-sm" name="botao">FINALIZAR</button>
  <hr>            
  <button type="button" class="btn btn-primary btn-sm" onClick="window.location='menu.php';">VOLTAR AO MENU PRINCIPAL</button>
  <hr>
   </div>

</div>
</form>

</body>
</html>