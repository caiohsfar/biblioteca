<?php
require_once('../../classes/Usuario.class.php');
require_once('../../classes/Aluno.class.php');
require_once('../../classes/Professor.class.php');
require_once('../../classes/Funcionario.class.php');
require_once('../../classes/UsuarioDAO.class.php');
$telefone = isset($_POST['telefone']) ? $_POST['telefone'] : null;

$usuario = new Usuario();
$usuario->setEmail($_POST['email']);
$usuario->setNome($_POST['nome']);
$usuario->setSenha($_POST['senha']);
$usuario->setEndereco($_POST['endereco']);

$usuarioDAO = new UsuarioDAO();
if($usuarioDAO->UsuarioExiste($usuario->getEmail(), $usuario->getSenha()) == true){
	$usuarioDAO->inserirUsuario($usuario,$telefone);
	$tipoConta = $_POST['tipoConta'];
	if($tipoConta =="aluno"){
		$aluno = new Aluno();
		$usuario = $usuarioDAO->getUsuario($usuario->getEmail(),$usuario->getSenha());
		$aluno->setMatricula($_POST['matricula']);
		$aluno->setCurso($_POST['curso']);
		$aluno->setIdUsuario($usuario->getId());
		$usuarioDAO->inserirAluno($aluno);
	}

	if($tipoConta =="professor"){
		$professor = new Professor();
		$usuario = $usuarioDAO->getUsuario($usuario->getEmail(),$usuario->getSenha());
		$professor->setSiape($_POST['siape']);
		$professor->setLates($_POST['lates']);
		$professor->setIdUsuario($usuario->getId());
		$usuarioDAO->inserirProfessor($professor);

	}

	if($tipoConta =="funcionario"){
		$funcionario = new Funcionario();
		$usuario = $usuarioDAO->getUsuario($usuario->getEmail(),$usuario->getSenha());
		$funcionario->setSiape($_POST['siape']);
		$funcionario->setIdUsuario($usuario->getId());
		$usuarioDAO->inserirFuncionario($funcionario);
	}
} else {
	$tipoConta = $_POST['tipoConta'];
	if($tipoConta =="aluno" /*and !$usuarioDAO->existePerfilUsuario($usuario->getId(),$tipoConta)*/){
		$aluno = new Aluno();
		$usuario = $usuarioDAO->getUsuario($usuario->getEmail(),$usuario->getSenha());
		$aluno->setMatricula($_POST['matricula']);
		$aluno->setCurso($_POST['curso']);
		$aluno->setIdUsuario($usuario->getId());
		if($usuarioDAO->inserirAluno($aluno)){
			return true;
		} else {
			return false;
		}
	}
	
	if($tipoConta =="professor" and $usuarioDAO->existePerfilUsuario($usuario->getId(),$tipoConta)){
		$professor = new Professor();
		$usuario = $usuarioDAO->getUsuario($usuario->getEmail(),$usuario->getSenha());
		$professor->setSiape($_POST['siape']);
		$professor->setLates($_POST['lates']);
		$professor->setIdUsuario($usuario->getId());
		if($usuarioDAO->inserirProfessor($professor)){
			return true;
		} else {
			return false;
		}
	}

	if($tipoConta =="funcionario" and $usuarioDAO->existePerfilUsuario($usuario->getId(),$tipoConta)){
		$funcionario = new Funcionario();
		//$cargo = new FuncionarioCargo();
		$usuario = $usuarioDAO->getUsuario($usuario->getEmail(),$usuario->getSenha());
		$funcionario->setSiape($_POST['siape']);
		$funcionario->setIdUsuario($usuario->getId());
		//$cargo->setCargo();
		//$cargo->setDescricao();
		if($usuarioDAO->inserirFuncionario($funcionario) == false){
			return false;
		} else {
			return true;
		}
	}
}
