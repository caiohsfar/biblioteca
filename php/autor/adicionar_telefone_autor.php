<?php

    session_start();

    if(!isset($_SESSION['usuario'])){
        header('Location: index.php?erro=1');
    }

    require_once('../../classes/Database.class.php');
    $telefone = $_POST['telefone'];
    $id_autor = $_POST['id_autor'];

    $db = new Db();
    $link = $db->conecta_mysql();	
    $query_autor = "INSERT INTO telefone_autor (numero, id_autor) VALUES ('$telefone','$id_autor');";
    $resultado_id = mysqli_query($link,$query_autor);
    if ($resultado_id){
       echo '1';
    }
    else{
        echo '0';
    }

    




?>