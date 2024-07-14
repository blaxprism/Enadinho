<?php
	//requisição de arquivos
	require_once('classes/Coordenador.php');
	require_once('conexao.php');
	require_once('verifica_login.php');

	//instancia de classes
	$coordenador = new Coordenador();

	$dados_perfil = $coordenador->Visualizar_cadastro($conexao, $_SESSION['id_coordenador']);
?>
<?php require_once('links.php'); ?>
<form action="editarCoordenador.php" method="post">
	<table style="border-style: solid;">
		<tr>
			<th style='border-style: solid;'>Campo</th>
			<th style='border-style: solid;'>Valor</th>
		</tr>
		<tr>
			<th style='border-style: solid;'>nome_coordenador</th> 
			<td style='border-style: solid;'><input type='text' id='nome_coordenador' name='nome_coordenador' value='<?=$dados_perfil['nome_coordenador']?>'/></td>
		</tr>
		<tr>
			<th style='border-style: solid;'>data_nascimento</th> 
			<td style='border-style: solid;'><input type='date' id='data_nascimento' name='data_nascimento' value='<?=$dados_perfil['data_nascimento']?>'/></td>
		</tr>
	</table>
	<input type="submit" value="Salvar"/>
</form>
<a href="excluir_cadastro"></a>
