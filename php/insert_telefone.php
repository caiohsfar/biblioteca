<?php
    require_once('../dominio/UsuarioDAO.php');
    $numero = $_POST['numero'];
    echo($numero);

    $usuario_dao = new UsuarioDAO();

    $usuario_dao->inserirTelefone($numero);

?>