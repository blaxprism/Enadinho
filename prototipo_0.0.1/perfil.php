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
<table style="border-style: solid;">
	<tr>
		<th style='border-style: solid;'>Campo</th>
		<th style='border-style: solid;'>Valor</th>
	</tr>
	<?php
		foreach ($dados_perfil as $nome_campo => $valor_campo){
			if ($nome_campo == 'fk_tipo_usuario') {
				$sql = "SELECT tipo_usuario FROM `tipos_usuario` where id_tipo_usuario = $valor_campo";
				$array_consulta = mysqli_fetch_assoc($conexao->query($sql));
				echo "<tr>
						<th style='border-style: solid;'>Tipo de usuário</th> 
						<td style='border-style: solid;'>{$array_consulta['tipo_usuario']}</td>
					</tr>";
			}else{
				echo "<tr>
						<th style='border-style: solid;'>{$nome_campo}</th> 
						<td style='border-style: solid;'>{$valor_campo}</td>
					</tr>";
			}
		}
	?>
</table>
