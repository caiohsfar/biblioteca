<?php

    session_start();

    if(!isset($_SESSION['usuario'])){
        header('Location: index.php?erro=1');
    }

    require_once('../classes/Database.class.php');
    

    $db = new Db();
    $link = $db->conecta_mysql();
    	
    $query_palavra_chave = "SELECT * FROM palavra_chave;";
    $resultado_id = mysqli_query($link,$query_palavra_chave);
    if ($resultado_id){
        while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
            echo '<option value='.$registro['id_palavra']. '>'.$registro['descricao'].'</option>';
		}
    }
    else{
        echo 'erro ao adicionar palavra_chave no banco de dados';
    }

?>