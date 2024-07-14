<?php 
	class Coordenador 
	{

		public function Cadastro($conexao, $nome_coordenador, $data_nascimento, $email_institucional, $senha): bool{
			$sql = "SELECT id_tipo_usuario FROM `tipos_usuario` where tipo_usuario = 'Coordenador'";
			$array_consulta = mysqli_fetch_assoc($conexao->query($sql));
			
			$sql = "SELECT * FROM `coordenadores` where email_institucional = '{$email_institucional}'";

			if(mysqli_num_rows($conexao->query($sql)) > 0){
				return false;
			}else{
				$sql = "INSERT INTO coordenadores(`nome_coordenador`, `data_nascimento`, `email_institucional`, `senha`, `fk_tipo_usuario`) VALUES ('$nome_coordenador', '$data_nascimento', '$email_institucional', '$senha', '{$array_consulta['id_tipo_usuario']}');";
				return($conexao->query($sql));
			}
		}
		
		public function Login($conexao, $email_institucional, $senha): array{
			$sql = "SELECT * FROM coordenadores WHERE email_institucional = '$email_institucional' AND senha = '$senha' ;
			";
			$result = $conexao->query($sql);
			$array_consulta = mysqli_fetch_assoc($result);
			return [
				'resultado_login'=>(mysqli_num_rows($result) == 1) , 
				'id_coordenador' => $array_consulta['id_coordenador'], 
				'fk_tipo_usuario' => $array_consulta['fk_tipo_usuario']
			];
		}

		public function Editar_cadastro($conexao, $id_coordenador, $nome_coordenador, $data_nascimento): bool{
			$sql = "SELECT * FROM `coordenadores`";
			$conexao->query($sql);

			$sql = "UPDATE `coordenadores` SET `nome_coordenador`='$nome_coordenador',`data_nascimento`='$data_nascimento' WHERE id_coordenador = '$id_coordenador';";

			return ($conexao->query($sql));
		}

		public function Visualizar_cadastro($conexao, $id_coordenador):array{
			
			$sql = "SELECT nome_coordenador, data_nascimento, email_institucional, fk_tipo_usuario FROM coordenadores WHERE id_coordenador = '{$id_coordenador}' ;
			";
			$result = $conexao->query($sql);
			$array_consulta = mysqli_fetch_assoc($result);
			return $array_consulta;
		}

		public function Apagar_cadastro($conexao, $id_coordenador):bool{
			$sql = "SELECT * FROM `coordenadores`";
			$conexao->query($sql);
			
			$sql = "DELETE FROM `coordenadores` WHERE id_coordenador = '$id_coordenador'";

			return ($conexao->query($sql));
		}

		public function Cadastro_curso(){
			
		}
		
		public function Visualizar_curso(){

		}

		public function Editar_curso(){

		}

		public function Excluir_curso(){

		}

		public function Cadastrar_professor(){

		}

		public function Visualizar_professor(){

		}

		public function Editar_professor(){

		}

		public function Excluir_professor(){

		}

		public function Cadastro_disciplina(){

		}

		public function Visualizar_disciplina(){

		}

		public function Editar_disciplina(){

		}

		Public function Excluir_disciplina(){

		}

		public function Alocar_disciplina(){

		}

		public function Editar_Responsavel_disciplina(){

		}

	}

?>