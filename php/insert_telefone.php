<?php
    require_once('../classes/UsuarioDAO.php');
    $numero = $_POST['numero'];
    echo($numero);

    $usuario_dao = new UsuarioDAO();

    $usuario_dao->inserirTelefone($numero);

?>