<?php

    session_start();

    if(!isset($_SESSION['usuario'])){
        header('Location: index.php?erro=1');
    }

    require_once('../classes/Database.class.php');

    $db = new Db();
    $link = $db->conecta_mysql();	
    $query_area_conhecimento = "SELECT * FROM area_conhecimento;";
    $resultado_id = mysqli_query($link,$query_area_conhecimento);
    if ($resultado_id){
        while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
            echo '<option value='.$registro['id_area']. '>'.$registro['nome'].'</option>';
		}
    }
    else{
        echo 'erro ao adicionar area_conhecimento no banco de dados';
    }

?>