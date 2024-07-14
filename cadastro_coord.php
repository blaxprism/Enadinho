<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cadastro de coordenador</title>
</head>
<body>
	<?php 
		if(isset($_SESSION['Cadastro_existe'])):
	?>
	<div>
		<hr>Novo cadastro com erro: Email já cadastrado <hr>
	</div>
	<?php 
		endif;
		unset($_SESSION['Cadastro_existe']);
	?>
	<form action="cadastroCoordenador.php" method="post">
		<input type="text" name="txtNome" id="txtNome" placeholder="Nome">
		<input type="date" name="dateNasc" id="dateNasc">
		<input type="email" name="txtEmail" id="txtEmail" placeholder="E-mail">
		<input type="password" name="txtSenha" id="txtSenha" placeholder="Senha">
		<input type="submit" value="Enviar">
	</form>
</body>
</html>