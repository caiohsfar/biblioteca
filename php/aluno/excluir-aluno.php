<?php
	session_start();
	require_once('../../classes/Aluno.class.php');
	require_once('../../classes/UsuarioDAO.class.php');
	$aluno = unserialize($_SESSION['aluno']);
	$usuarioDAO = new UsuarioDAO();
	$usuarioDAO->excluirAluno($aluno->getIdUsuario());
	header('Location:../../views/index.php');

?>