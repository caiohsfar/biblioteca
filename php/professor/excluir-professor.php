<?php
	session_start();
	require_once('../../classes/Professor.class.php');
	require_once('../../classes/UsuarioDAO.class.php');
	$professor = unserialize($_SESSION['professor']);
	$usuarioDAO = new UsuarioDAO();
	$usuarioDAO->excluirProfessor($professor->getIdUsuario());
	header('Location:../../views/index.php');

?>