<?php

    require_once('../classes/Database.class.php');

    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];

    $telefone = isset($_POST['telefone']) ? $_POST['telefone'] : null;


    $db = new Db();
    $link = $db->conecta_mysql();	
    $query_editora = "INSERT INTO  editora(nome,endereco)  values('$nome','$endereco')";
    if(mysqli_query($link,$query_editora)){
        if ($telefone != ""){
            $id_editora = mysqli_insert_id($link);
            echo $id_editora;
            inserirTelefone($link, $id_editora,$telefone);
        }

        echo 'editora inserida com sucesso';
    }
    else{
        echo 'erro ao adicionar editora no banco de dados';
    }

    function inserirTelefone($link,$id_editora,$telefone){

        $query_telefone = "INSERT INTO  telefone_editora(numero, id_editora)  values('$telefone','$id_editora')";

        if(mysqli_query($link,$query_telefone)){
            echo 'Telefone inserido com sucesso';
        }
        else{
            echo 'erro ao adicionar telefone no banco de dados';
        }

    }
    



?>