<?php
	session_start();
	require_once('../../classes/Usuario.class.php');
	require_once('../../classes/Aluno.class.php');
	require_once('../../classes/UsuarioDAO.class.php');
	$usuarioDAO = new UsuarioDAO();
	$usuario = unserialize($_SESSION['usuario']);
	$aluno = unserialize($_SESSION['aluno']);

	if($_POST['email']!= -1){
		$usuario->setEmail($_POST['email']);
	}

	if($_POST['senha']!= -1){
		$usuario->setSenha($_POST['senha']);
	}

	if($_POST['nome']!= -1){
		$usuario->setNome($_POST['nome']);
	}

	if($_POST['endereco']!= -1){
		$usuario->setEndereco($_POST['endereco']);
	}

	if($_POST['matricula']!= -1){
		$aluno->setMatricula($_POST['matricula']);
	}

	if($_POST['curso']!= -1){
		$aluno->setCurso($_POST['curso']);
	}
	if($_POST['id_novo']!= -1){
		$id_novo = $_POST['id_novo'];
	}

	if (!$usuarioDAO->idExiste($id_novo)){
		$usuarioDAO->atualizarUsuario($usuario,$id_novo);
		$usuarioDAO->atualizarAluno($aluno);
		$_SESSION['usuario'] = serialize($usuarioDAO->getUsuarioById($id_novo));
		$_SESSION['aluno'] = serialize($aluno);
		echo "atualizado com sucesso.";
	}else{
		return false;
	}
	
?>