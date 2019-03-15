<?php require "sessao.php";

if($_SESSION['aux'] != 1000) {
	echo "<script> alert('         VOCÊ NÃO TEM PERMISSÃO PARA ACESSAR ESTA PÁGINA !!'); location.href='sair.php';</script>";
}
	
if(isset($_POST['buscar'])) {
    $valorBusca = $_POST['valorBusca'];
    $busca = "SELECT * FROM serie WHERE CONCAT(nome) LIKE '%".$valorBusca."%' ORDER BY nome ASC";
    $buscar_resultado = filterTable($conexao, $busca);
    
} else {
    $busca = "SELECT * FROM serie ORDER BY nome ASC";
    $buscar_resultado = filterTable($conexao, $busca);
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
	width:900px; !important;
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

<div class="menu">

<hr>

<div align="center">
	<form class="form-inline md-form mr-auto mb-4" action="lista_ser.php" method="post">
        <div align="center" class="form-group col-md-12">
        	<input autocomplete="off" style="text-align:center" class="form-control mr-sm-2" type="text" name="valorBusca" placeholder="Buscar na Lista">
            <input class="btn btn-primary btn-sm" name="buscar" type="submit" value="BUSCAR">
            <input class="btn btn-info btn-sm" name="todos" type="submit" value="MOSTRAR TUDO">
        </div>
    </form>
</div>

<div class="bingo" align="center">
<table class="table table-bordered">
  <thead class="thead-dark" align="center">
    <tr>
      <th width="62%" scope="col"><div align="center">SÉRIE</div></th>
      <th width="38%" scope="col"><div align="center"></div></th>
    </tr>
  </thead>
  <tbody>
  
<?php while($rows_busca = mysqli_fetch_assoc($buscar_resultado)) { ?>
      <tr>
      <td><div align="center"><?php echo $rows_busca['nome'];?></div></td>
      <td><div align="center">
<button type="button" class="btn btn-warning btn-sm" onClick="window.location='alt_ser.php?aux=<?php echo $rows_busca['serie_cod'];?>';">EDITAR</button>
    </div></td>
    </tr>
    
<?php } ?>
  
</tbody>
</table>
</tbody>
</table>
</div>

<div align="center">
<button type="button" class="btn btn-primary btn-sm" onClick="window.location='menu.php';">VOLTAR AO MENU PRINCIPAL</button>
<hr></div>

</div>
</body>
</html>