<?php require "sessao.php";

if($_SESSION['aux'] != 1000) {
	
	echo "<script> alert('         VOCÊ NÃO TEM PERMISSÃO PARA ACESSAR ESTA PÁGINA !!'); location.href='sair.php';</script>";

} else { ?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
</head>
<body>

<style rel="stylesheet">
  .bingo { 
	width:500px; !important;
	height:auto; !important;
	margin:auto; !important;
    }
</style>

<style rel="stylesheet">
select{
  width: 500px;
   height: 30px;
   font-size: 16px;
   background: #f2f2f3;
   padding-left: 5px;
   border-radius: 5px;
}
</style>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

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
        
<script>
$(document).ready(function() {
   $(".meuselect").select2();
});
</script>

<hr>      

<div align="center"> <p><img src="imagem.jpg" width="401" height="148"></p> </div>

<div class="bingo">

<hr>

<form method="post" action="add_dev_2.php">
    
<div class="form-row" align="center">    
    <div class="form-group" align="center">
          <div align="center"><label for="inputDis"><b>SELECIONE O ALUNO</b></label></div>
     <td>
     	<select class="meuselect" name="aluno" required>
            <option value=""> -- </option>
        	<?php
				$busca = "SELECT * FROM retirada WHERE situacao = 1 GROUP BY aluno ORDER BY aluno ASC";
				$resultado = mysqli_query($conexao, $busca);
				while($rows_busca = mysqli_fetch_assoc($resultado)) {
			?>
            	<option value="<?php echo $rows_busca['alu_cod']; ?>"> <?php echo $rows_busca['aluno']; ?> </option>
            <?php } ?>
        </select>
     </td>  
    </div>
</div>

<hr>

<div align="center">
<button type="submit" class="btn btn-success" name="botao">AVANÇAR</button>
<hr>                  
<button type="button" class="btn btn-primary btn-sm" onClick="window.location='menu.php';">VOLTAR AO MENU PRINCIPAL</button>
<hr></div>
</form>
</div>
</body>
</html>

<?php } ?>