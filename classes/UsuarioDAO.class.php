
<?php

require_once('Database.class.php');
require_once('Usuario.class.php');
require_once('Aluno.class.php');
require_once('Funcionario.class.php');


class UsuarioDAO{

    function inserirUsuario($usuario){
			$db = new Db();
			$link = $db->conecta_mysql();	
			$query = "INSERT INTO  usuario(nome,email,senha,endereco)  values('".$usuario->getNome()."','".$usuario->getEmail()."','".$usuario->getSenha()."','".$usuario->getEndereco()."')";
			if(mysqli_query($link,$query)){
				echo 'Inserido com sucesso';
			}
			else{
			echo 'erro ao adicionar no banco de dados';
			}
		}


		function inserirAluno($aluno){
			$db = new Db();
			$link = $db->conecta_mysql();	
			$query = "INSERT INTO  aluno(id_usuario,matricula,curso)  values(".$aluno->getIdUsuario().",'".$aluno->getMatricula()."','".$aluno->getCurso()."')";
			if(mysqli_query($link,$query)){
				echo 'Inserido com sucesso';
			}
			else{
			echo 'erro ao adicionar no banco de dados';
			}
		}

		function UsuarioExiste($email){
			$usuario = new Usuario();
			$db = new Db();
			$link = $db->conecta_mysql();	
			$sql = "SELECT * FROM usuario WHERE email = '$email'";
			$resultado_busca = mysqli_query($link,$sql);

			if($resultado_busca){
				$dados_usuario =mysqli_fetch_array($resultado_busca,MYSQLI_ASSOC);
				if($dados_usuario['id_usuario']!=""){
					return false;
				}

				return true;
				

			}
			
		}

		function inserirFuncionario($funcionario){
			$db = new Db();
			$link = $db->conecta_mysql();	
			$query = "INSERT INTO  funcionario(id_usuario,siape)  values(".$funcionario->getIdUsuario().",'".$funcionario->getSiape()."')";
			if(mysqli_query($link,$query)){
				echo 'Inserido com sucesso';
			}
			else{
			echo 'erro ao adicionar no banco de dados';
			}
		}

		function inserirProfessor($professor){
			$db = new Db();
			$link = $db->conecta_mysql();	
			$query = "INSERT INTO professor(id_usuario,siape,lates)  values(".$professor->getIdUsuario().",'".$professor->getSiape()."','".$professor->getLates()."')";
			if(mysqli_query($link,$query)){
				echo 'Inserido com sucesso';
			}
			else{
			echo 'erro ao adicionar no banco de dados';
			}
		}

	function getUsuario($email,$senha){
			$usuario = new Usuario();
			$db = new Db();
			$link = $db->conecta_mysql();	
			$sql = "SELECT * FROM usuario WHERE email = '$email' and senha = '$senha'";
			$resultado_busca = mysqli_query($link,$sql);

			if($resultado_busca){
				$dados_usuario =mysqli_fetch_array($resultado_busca,MYSQLI_ASSOC);
				if($dados_usuario['id_usuario']==""){
					return "null";
				}
				else{
					$usuario->setId($dados_usuario['id_usuario']);
					$usuario->setNome($dados_usuario['nome']);
					$usuario->setEmail($dados_usuario['email']);
					$usuario->setSenha($dados_usuario['senha']);
					$usuario->setEndereco($dados_usuario['endereco']);
				}

				return $usuario;

			}
			
		}
	}
?>