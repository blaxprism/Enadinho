<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>login de coordenador</title>
</head>
<body>
	<?php 
		//iniciar sessão
		session_start();

		//requisição de arquivos
		require_once('classes/Coordenador.php');
		require_once('conexao.php');

		if(empty($_POST['txtSenha']) || empty($_POST['txtEmail'])){
			header('Location: login_coord.php');
			exit();
		}

		//inicialização de variáveis
		$email = mysqli_real_escape_string($conexao, $_POST['txtEmail']);
		$senha = mysqli_real_escape_string($conexao, $_POST['txtSenha']);

		//instancia de classes
		$coordenador = new Coordenador();
		
		//login de coordenador
		$login = $coordenador->login($conexao, $email, $senha);
		if($login['resultado_login']){
			$_SESSION['id_coordenador'] = $login['id_coordenador'];
			$_SESSION['logado'] = true;
			header('Location: index.php');
		}else{
			$_SESSION['nao_autenticado'] = true;
			header('Location: login_coord.php');
		}



	?>
</body>
</html>