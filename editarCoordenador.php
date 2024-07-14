<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edição de coordenador</title>
</head>
<body>
	<?php 
		//iniciar sessão
		session_start();

		//requisição de arquivos
		require_once('classes/Coordenador.php');
		require_once('conexao.php');

		if(empty($_POST['nome_coordenador']) || empty($_POST['data_nascimento'])){
			header('Location: cadastro_coord.php');
			exit();
		}

		//inicialização de variáveis
		$nome = mysqli_real_escape_string($conexao, $_POST['nome_coordenador']);
		$dateNasc = mysqli_real_escape_string($conexao, $_POST['data_nascimento']);

		//instancia de classes
		$coordenador = new Coordenador();
		
		//cadastro de coordenador
		if($coordenador->Editar_cadastro($conexao, $id_coordenador, $nome_coordenador, $data_nascimento)){
			header('Location: index.php');
		}else{
			$_SESSION['Cadastro_existe'] = true;
			header('Location: cadastro_coord.php');
		}



	?>
</body>
</html>