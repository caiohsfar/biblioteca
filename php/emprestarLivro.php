<?php
	session_start();
	require_once('../classes/Usuario.class.php');
	$usuario = unserialize($_SESSION['usuario']);
	$isbn = $_POST['id'];
	$pega = $_POST['pega'];
	$devolve = $_POST['devolve'];
	require_once('../classes/Database.class.php');

	$db = new Db();
            $link = $db->conecta_mysql();
            $sql = "INSERT INTO exemplar_livro(qtd_exemplares,isbn_livro) VALUES(1,'$isbn')";
            mysqli_query($link,$sql);

            $sql = "SELECT MAX(id_exemplar) as id FROM exemplar_livro";
            $resultado_busca = mysqli_query($link,$sql);
            $registro = mysqli_fetch_array($resultado_busca,MYSQLI_ASSOC);
			$idLivro = $registro['id'];
			$idUsuario = $usuario->getId();

			$sql = "INSERT INTO emprestimo(id_exemplar,id_usuario,data_devolucao,data_emprestimo) VALUES('$idLivro','$idUsuario','$devolve','$pega')";
			mysqli_query($link,$sql);












?>