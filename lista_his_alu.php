<?php require "sessao.php";

$passada = $_GET['aux'];

	$busca = "SELECT * FROM aluno WHERE alu_cod = '$passada'";
	$resultado = mysqli_query($conexao, $busca);
	$grava = mysqli_fetch_assoc($resultado);
	
	$alu_cod = $grava['alu_cod'];
	$nome = $grava['nome'];
	$serie = $grava['serie'];
	$retiradas = $grava['retiradas'];
	$atrasos = $grava['atrasos'];

if($_SESSION['aux'] != 1000) {
	echo "<script> alert('         VOCÊ NÃO TEM PERMISSÃO PARA ACESSAR ESTA PÁGINA !!'); location.href='sair.php';</script>";
}

if(isset($_POST['buscar'])) {
    $valorBusca = $_POST['valorBusca'];
    $busca = "SELECT * FROM retirada WHERE CONCAT(codigo_liv, livro, data_br_ret) LIKE '%".$valorBusca."%' AND alu_cod = '$passada' ORDER BY data_ret, livro ASC";
    $buscar_resultado = filterTable($conexao, $busca);
    
} else {
    $busca = "SELECT * FROM retirada WHERE alu_cod = '$passada' ORDER BY data_ret, livro ASC";
    $buscar_resultado = mysqli_query($conexao, $busca);
}

function filterTable($conexao, $busca) {
    $filter_resultado = mysqli_query($conexao, $busca);
    return $filter_resultado;
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

<div align="center"> <p><img src="imagem.jpg" width="401" height="148"></p> </div>

<div class="bingo">

<hr>

<table class="table" style="font-size:15px">
  <thead class="thead-dark" align="center">
    <tr>
      <th width="40%" style="font-size:14px" scope="col"><div align="center"><?php echo $nome; ?></div></th>
      <th width="20%" style="font-size:14px" scope="col"><div align="center"><?php echo $serie; ?></div></th>
      <th width="20%" style="font-size:14px" scope="col"><div align="center">LIVROS RETIRADOS: <?php echo $retiradas; ?></div></th>
      <th width="20%" style="font-size:14px" scope="col"><div align="center">ATRASOS: <?php echo $atrasos; ?></div></th>
    </tr>
  </thead>
  <tbody>
  </tbody>
</table>
  
<hr>
<div align="center">
	<form class="form-inline md-form mr-auto mb-4" action="lista_his_alu.php?aux=<?php echo $passada;?>" method="post">
        <div align="center" class="form-group col-md-12">
        	<input autocomplete="off" style="text-align:center" class="form-control mr-sm-2" type="text" name="valorBusca" placeholder="Buscar na Lista">
            <input class="btn btn-primary btn-sm" name="buscar" type="submit" value="BUSCAR">
            <input class="btn btn-info btn-sm" name="todos" type="submit" value="MOSTRAR TUDO">
        </div>
    </form>
</div>
<hr>

<table class="table table-bordered" style="font-size:15px">
  <thead class="thead-dark" align="center">
    <tr>
      <th width="15%" style="font-size:14px" scope="col"><div align="center">CÓDIGO</div></th>
      <th width="47%" style="font-size:14px" scope="col"><div align="center">LIVRO</div></th>
      <th width="18%" style="font-size:14px" scope="col"><div align="center">DATA RETIRADA</div></th>
      <th width="20%" style="font-size:14px" scope="col"><div align="center">DATA DEVOLUÇÃO</div></th>
    </tr>
  </thead>
  <tbody>
  
<?php while($rows_busca = mysqli_fetch_assoc($buscar_resultado)) { ?>

      <tr>
      <td style="font-size:14px"><div align="center"><?php echo $rows_busca['codigo_liv'];?></div></td>
      <td style="font-size:14px"><div align="center"><?php echo $rows_busca['livro'];?></div></td>
      <td style="font-size:14px"><div align="center"><?php echo $rows_busca['data_br_ret'];?></div></td>
<?php if($rows_busca['data_dev'] == NULL) { ?>
	      <td style="font-size:14px"><div align="center" style="font-style:italic">EMPRESTADO</div></td>
<?php } else { ?>
      <td style="font-size:14px"><div align="center"><?php echo $rows_busca['data_br_dev'];?></div></td>
<?php } ?>
    </tr>
      </td>
      </tr>
    
<?php } ?>
  
</tbody>
</table>
</div>
<div align="center">
<button type="button" class="btn btn-primary btn-sm" onClick="window.location='menu.php';">VOLTAR AO MENU PRINCIPAL</button>
<hr></div>

</body>
</html>