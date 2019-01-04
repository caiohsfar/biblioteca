<?php

    require_once('../classes/Database.class.php');

    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];

    $telefone = isset($_POST['telefone']) ? $_POST['telefone'] : null;



    $db = new Db();
    $link = $db->conecta_mysql();	
    $query_autor = "INSERT INTO  autor(nome,endereco)  values('$nome','$endereco')";
    if(mysqli_query($link,$query_autor)){
        if(isset($numero)){
            $id_autor = mysqli_insert_id($link);
            echo $id_autor;
            inserirTelefone($link, $id_autor,$telefone);
            echo 'Autor inserido com sucesso';
        }
    }
    else{
        echo 'erro ao adicionar autor no banco de dados';
    }

    function inserirTelefone($link,$id_autor,$telefone){
        $query_telefone = "INSERT INTO  telefone_autor(numero, id_autor)  values('$telefone','$id_autor')";

        if(mysqli_query($link,$query_telefone)){
            echo 'Telefone inserido com sucesso';
        }
        else{
            echo 'erro ao adicionar telefone no banco de dados';
        }

    }
    



?>