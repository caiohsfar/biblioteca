<?php

    session_start();

    if(!isset($_SESSION['usuario'])){
        header('Location: index.php?erro=1');
    }

    require_once('../../classes/Database.class.php');
    $id_autor = $_POST['id_autor'];

    $db = new Db();
    $link = $db->conecta_mysql();	
    $query_autor = "DELETE FROM autor WHERE id_autor = '$id_autor';";
    $resultado_id = mysqli_query($link,$query_autor);
    if ($resultado_id){
       echo '1';
    }
    else{
        echo '0';
    }

    




?>