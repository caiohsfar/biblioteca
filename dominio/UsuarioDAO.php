
<?php

require_once('../Database.class.php');


class UsuarioDAO{

    function inserirTelefone($numero){
        $db = new Db();
        $link = $db->conecta_mysql();
        $sql = "INSERT INTO telefone(numero) VALUES('$numero')";
        mysqli_query($link,$sql);
    }
}

?>