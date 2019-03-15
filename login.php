<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="estilo.css" />
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<style rel="stylesheet">
  .bingo { 
	width:900px; !important;
	height:auto; !important;
	margin:auto; !important;
    }
</style>

<?php include('conexao.php');
 
if(isset($_POST['botao'])){
	$cpf = $_POST['cpf'];
	$senha = $_POST['senha'];

$busca = "SELECT * FROM administrador WHERE usuario = '$cpf' AND senha = '$senha' ";
$resultado = mysqli_query($conexao, $busca);

	if(mysqli_num_rows($resultado) > 0) {

		session_start();
		$_SESSION['login'] = $cpf;
		$_SESSION['senha'] = $senha;
		$_SESSION['aux'] = 1000;
				
		header('Location: menu.php');					

	} else {
		echo "<script> alert('                 USUÁRIO INEXISTENTE !!   -   TENTE NOVAMENTE'); location.href='login.php';</script>"; 
	 } } ?>

</head>
<body>
<div align="center"> <p><img src="imagem.jpg" width="401" height="148"></p> </div>

<br>
<div class="bingo">
<div align="center">
<div align="center" class="alert alert-info" role="alert"> <h4>BEM VINDO AO SISTEMA DE GERENCIAMENTO DA BIBLIOTECA</h4> </div>
</div>
</div>
<div class="caixa_login">
<form method="post" action="" name="form">
<hr>
<div class="form-group">
<div align="center">
<label for="login_adm"><b>LOGIN</b></label> </div>
<input autocomplete="off" style="text-align:center" name="cpf" id="cpf" type="login" class="form-control" placeholder="Insira o Login" autofocus required>
<small id="emailHelp" class="form-text text-muted">* Somente Números</small>
</div>

<div class="form-group">
<br>
<div align="center">
<label for="password"><b>SENHA</b></label> </div>
<input autocomplete="off" style="text-align:center" name="senha" id="senha" type="password" class="form-control" placeholder="Insira sua senha" required>
<br>
</div>

<div align="center">
<button type="submit" class="btn btn-primary btn-sm" name="botao">ACESSAR</button>
<hr>
</div>
</form>
<div align="center">Desenvolvido por Luã Dutra ® 2018</div>
</div>
</body>
</html>