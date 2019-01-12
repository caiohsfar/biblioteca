<?php

    session_start();

    if(!isset($_SESSION['usuario'])){
        header('Location: index.php?erro=1');
    }
    

    require_once('../classes/Database.class.php');
    $id_telefone = $_POST['id_telefone'];

    $db = new Db();
    $link = $db->conecta_mysql();	
    $query_usuario = "DELETE FROM telefone_usuario WHERE id_telefone = '$id_telefone'";
    $resultado_id = mysqli_query($link,$query_usuario);
    if ($resultado_id){
       echo '1';
    }
    else{
        echo '0';
    }

    




?>