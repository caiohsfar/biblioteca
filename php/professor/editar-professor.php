<?php
	session_start();
	require_once('../../classes/Usuario.class.php');
	require_once('../../classes/Professor.class.php');
	require_once('../../classes/UsuarioDAO.class.php');
	$usuarioDAO = new UsuarioDAO();
	$usuario = unserialize($_SESSION['usuario']);
	$professor = unserialize($_SESSION['professor']);

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

	if($_POST['siape']!= -1){
		$professor->setSiape($_POST['siape']);
	}

	if($_POST['lates']!= -1){
		$professor->setLates($_POST['lates']);
	}

	$usuarioDAO->atualizarUsuario($usuario);
	$usuarioDAO->atualizarProfessor($professor);
	$_SESSION['usuario'] = serialize($usuario);
	$_SESSION['professor'] = serialize($professor);
?>