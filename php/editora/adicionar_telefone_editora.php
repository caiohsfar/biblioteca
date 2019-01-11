<?php

    session_start();

    if(!isset($_SESSION['usuario'])){
        header('Location: index.php?erro=1');
    }

    require_once('../../classes/Database.class.php');
    $telefone = $_POST['telefone'];
    $id_editora = $_POST['id_editora'];

    $db = new Db();
    $link = $db->conecta_mysql();	
    $query_editora = "INSERT INTO telefone_editora (numero, id_editora) VALUES ('$telefone','$id_editora');";
    $resultado_id = mysqli_query($link,$query_editora);
    if ($resultado_id){
       echo '1';
    }
    else{
        echo '0';
    }

    




?>