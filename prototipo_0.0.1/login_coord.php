<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>login de coordenador</title>
</head>
<body>
	<?php 
		if(isset($_SESSION['nao_autenticado'])):
	?>
	<div>
		<hr>Não autenticado<hr>
	</div>
	<?php 
		endif;
		unset($_SESSION['nao_autenticado']);
	?>
	<form action="loginCoordenador.php" method="post">
		<input type="email" name="txtEmail" id="txtEmail" placeholder="E-mail">
		<input type="password" name="txtSenha" id="txtSenha" placeholder="Senha">
		<input type="submit" value="Enviar">
	</form>
</body>
</html>