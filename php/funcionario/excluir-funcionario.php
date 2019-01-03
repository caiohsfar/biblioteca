<?php
	session_start();
	require_once('../../classes/Funcionario.class.php');
	require_once('../../classes/UsuarioDAO.class.php');
	$funcionario = unserialize($_SESSION['funcionario']);
	$usuarioDAO = new UsuarioDAO();
	$usuarioDAO->excluirFuncionario($funcionario->getIdUsuario());
	header('Location:../../views/index.php');

?>