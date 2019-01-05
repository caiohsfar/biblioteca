<?php

    session_start();

    if(!isset($_SESSION['usuario'])){
        header('Location: index.php?erro=1');
    }

    require_once('../classes/Database.class.php');

    $db = new Db();
    $link = $db->conecta_mysql();	
    $query_editora = "SELECT * FROM editora;";
    $resultado_id = mysqli_query($link,$query_editora);
    if ($resultado_id){
        while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
            echo '<option data-id_editora='.$registro['id_editora']. '>'.$registro['nome'].'</option>';
		}
    }
    else{
        echo 'erro ao adicionar editora no banco de dados';
    }

?>