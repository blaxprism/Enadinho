<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cadastro de coordenador</title>
</head>
<body>
	<?php 
		//iniciar sessão
		session_start();

		//requisição de arquivos
		require_once('classes/Coordenador.php');
		require_once('conexao.php');

		if(empty($_POST['txtNome']) || empty($_POST['txtSenha']) || empty($_POST['txtEmail']) || empty($_POST['dateNasc'])){
			header('Location: cadastro_coord.php');
			exit();
		}

		//inicialização de variáveis
		$nome = mysqli_real_escape_string($conexao, $_POST['txtNome']);
		$email = mysqli_real_escape_string($conexao, $_POST['txtEmail']);
		$dateNasc = mysqli_real_escape_string($conexao, $_POST['dateNasc']);
		$senha = mysqli_real_escape_string($conexao, $_POST['txtSenha']);

		//instancia de classes
		$coordenador = new Coordenador();
		
		//cadastro de coordenador
		if($coordenador->Cadastro($conexao, $nome, $dateNasc, $email, $senha)){
			header('Location: index.php');
		}else{
			$_SESSION['Cadastro_existe'] = true;
			header('Location: cadastro_coord.php');
		}



	?>
</body>
</html>