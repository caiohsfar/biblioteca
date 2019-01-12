
<?php
session_start();

require_once('Database.class.php');
require_once('Usuario.class.php');
require_once('Aluno.class.php');
require_once('Funcionario.class.php');
require_once('Professor.class.php');


class UsuarioDAO{

    function inserirUsuario($usuario,$telefone){
			$db = new Db();
			$link = $db->conecta_mysql();	
			$query = "INSERT INTO  usuario(nome,email,senha,endereco)  values('".$usuario->getNome()."','".$usuario->getEmail()."','".$usuario->getSenha()."','".$usuario->getEndereco()."')";
			if(mysqli_query($link,$query)){
				echo 'Inserido com sucesso';
				$this->inserirTelefone($telefone,$link,$db);
			}
			else{
			echo 'erro ao adicionar no banco de dados';
			}
		}

	function inserirTelefone($telefone,$link,$db){
		if($telefone != ""){
			$id_usuario = mysqli_insert_id($link);
			echo "'$id_usuario'";
			$query_telefone = "INSERT INTO  telefone_usuario(numero, id_usuario)  values('$telefone','$id_usuario')";
			if(mysqli_query($link,$query_telefone)){
				echo 'Telefone inserido com sucesso';
			}
			else{
				echo 'erro ao adicionar telefone no banco de dados';
			}
		}
	}

	function inserirAluno($aluno){
		$db = new Db();
		$link = $db->conecta_mysql();	
		$query = "INSERT INTO  aluno(id_usuario,matricula,curso)  values(".$aluno->getIdUsuario().",'".$aluno->getMatricula()."','".$aluno->getCurso()."')";
		if(mysqli_query($link,$query)){
			return true;
		}
		else{
			return false;
		}
	}

	function usuarioExiste($email,$senha){
		$usuario = new Usuario();
		$db = new Db();
		$link = $db->conecta_mysql();	
		$sql = "SELECT * FROM usuario WHERE email = '$email' and senha = '$senha'";
		$resultado_busca = mysqli_query($link,$sql);
		$validacao = $this->UsuarioExisteEmail($email);
		if($resultado_busca){
			$dados_usuario = mysqli_fetch_array($resultado_busca,MYSQLI_ASSOC);
			if($dados_usuario['email'] == $email && $dados_usuario['senha'] == $senha or $validacao == false){
				return false;
			} else {
				return true;
			}
		}
		
	}

	function existePerfilUsuario($id,$tipoConta){
		$db = new Db();
		$link = $db->conecta_mysql();	
		$sql = "SELECT * FROM 'tipoConta' WHERE id = '$id'";
		$resultado_busca = mysqli_query($link,$sql);
		if($resultado_busca){
			$dados_usuario = mysqli_fetch_array($resultado_busca,MYSQLI_ASSOC);
			if($dados_usuario['id_usuario'] == ''){
				return true;
			} else {
				return false;
			}
		}
		
	}

	function UsuarioExisteEmail($email){
		$usuario = new Usuario();
		$db = new Db();
		$link = $db->conecta_mysql();	
		$sql = "SELECT * FROM usuario WHERE email = '$email'";
		$resultado_busca = mysqli_query($link,$sql);
		if($resultado_busca){
			$dados_usuario = mysqli_fetch_array($resultado_busca,MYSQLI_ASSOC);
			if($dados_usuario['email'] == $email){
				return false;
			} else {
				return true;
			}
		}
		
	}

	function inserirFuncionario($funcionario){
		$db = new Db();
		$link = $db->conecta_mysql();	
		$query = "INSERT INTO  funcionario(id_usuario,siape)  values(".$funcionario->getIdUsuario().",'".$funcionario->getSiape()."')";
		if(mysqli_query($link,$query)){
			return true;
		}
		else {
			return false;
		}
	}

	function inserirCargo($cargo){
		$db = new Db();
		$link = $db->conecta_mysql();	
		$query = "INSERT INTO  cargo(id_cargo,nome,descricao)  values(".$cargo->getIdCargo().",'".$cargo->getNome()."','".$cargo->getDescricao()."')";
		if(mysqli_query($link,$query)){
			return true;
		}
		else{
			return false;
		}
	}

	function inserirFuncionarioCargo($funcionarioCargo,$funcionario){
		$db = new Db();
		$link = $db->conecta_mysql();	
		$query = "INSERT INTO  funcionario_cargo(id_cargo,id_usuario,data)  values(".$funcionarioCargo->getIdCargo().",'".$funcionario->getIdUsuario()."','".$funcionarioCargo->getData()."')";
		if(mysqli_query($link,$query)){
			return true;
		}
		else{
			return false;
		}
	}

	function inserirProfessor($professor){
		$db = new Db();
		$link = $db->conecta_mysql();	
		$query = "INSERT INTO professor(id_usuario,siape,lates)  values(".$professor->getIdUsuario().",'".$professor->getSiape()."','".$professor->getLates()."')";
		if(mysqli_query($link,$query)){
			return true;
		}
		else{
			return false;
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
		function getUsuarioById($id){
			$usuario = new Usuario();
			$db = new Db();
			$link = $db->conecta_mysql();	
			$sql = "SELECT * FROM usuario WHERE id_usuario = '$id'";
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
	

	function atualizarUsuario($usuario,$id_novo){
			$db = new Db();
			$link = $db->conecta_mysql();
			$sql = "UPDATE usuario SET nome = '".$usuario->getNome()."' 
			, endereco = '".$usuario->getEndereco()."' 
			, email = '".$usuario->getEmail()."' 
			, senha =  '".$usuario->getSenha()."'
			, id_usuario =  '$id_novo' 
			WHERE id_usuario = '".$usuario->getId()."' ";
			if (mysqli_query($link,$sql)) {
				echo 'atualizado com sucesso';

			}
			else{
				echo 'Erro no banco de dados';
			}

		}
	
		
	function idExiste($id){
		$db = new Db();
		$link = $db->conecta_mysql();	
		$sql = "SELECT * FROM usuario WHERE id_usuario = '$id'";
		$resultado_busca = mysqli_query($link,$sql);

		if($resultado_busca){
			$dados_usuario = mysqli_fetch_array($resultado_busca,MYSQLI_ASSOC);
			if($dados_usuario['id_usuario'] == $id){
				return true;
			} else {
				return false;
			}
		}
		
	}


	function atualizarFuncionario($funcionario){
			$db = new Db();
			$link = $db->conecta_mysql();
			$sql = "UPDATE funcionario SET siape = '".$funcionario->getSiape()."' 	 
			WHERE id_usuario = '".$funcionario->getIdUsuario()."' ";
			if (mysqli_query($link,$sql)) {
				echo 'Inserido com sucesso';
			}
			else{
				echo 'Erro no banco de dados';
			}

		}
	function atualizarAluno($aluno){
			$db = new Db();
			$link = $db->conecta_mysql();
			$sql = "UPDATE aluno SET matricula = '".$aluno->getMatricula()."',curso = '".$aluno->getCurso()."'   	 
			WHERE id_usuario = '".$aluno->getIdUsuario()."' ";
			if (mysqli_query($link,$sql)) {
				echo 'Inserido com sucesso';
			}
			else{
				echo 'Erro no banco de dados';
			}

		}

	function atualizarProfessor($professor){
			$db = new Db();
			$link = $db->conecta_mysql();
			$sql = "UPDATE professor SET siape = '".$professor->getSiape()."',lates = '".$professor->getLates()."'   	 
			WHERE id_usuario = '".$professor->getIdUsuario()."' ";
			if (mysqli_query($link,$sql)) {
				echo 'Inserido com sucesso';
			}
			else{
				echo 'Erro no banco de dados';
			}

		}
			
	function excluirFuncionario($id){
			$db = new Db();
			$link = $db->conecta_mysql();
			$sql = "DELETE FROM funcionario WHERE id_usuario = '$id' ";
			mysqli_query($link,$sql);
		}

	function excluirProfessor($id){
			$db = new Db();
			$link = $db->conecta_mysql();
			$sql = "DELETE FROM professor WHERE id_usuario = '$id' ";
			mysqli_query($link,$sql);
		}

	function excluirAluno($id){
			$db = new Db();
			$link = $db->conecta_mysql();
			$sql = "DELETE FROM aluno WHERE id_usuario = '$id' ";
			mysqli_query($link,$sql);
		
	}
}

?>