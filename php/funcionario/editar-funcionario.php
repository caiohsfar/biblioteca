<?php
	session_start();
	require_once('../../classes/Usuario.class.php');
	require_once('../../classes/Funcionario.class.php');
	require_once('../../classes/UsuarioDAO.class.php');
	$usuarioDAO = new UsuarioDAO();
	$usuario = unserialize($_SESSION['usuario']);
	$funcionario = unserialize($_SESSION['funcionario']);

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
		$funcionario->setSiape($_POST['siape']);
	}

	$usuarioDAO->atualizarUsuario($usuario);
	$usuarioDAO->atualizarFuncionario($funcionario);
	$_SESSION['usuario'] = serialize($usuario);
	$_SESSION['funcionario'] = serialize($funcionario);
?>