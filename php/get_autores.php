<?php

    session_start();

    if(!isset($_SESSION['usuario'])){
        header('Location: index.php?erro=1');
    }

    require_once('../classes/Database.class.php');

    $db = new Db();
    $link = $db->conecta_mysql();	
    $query_autor = "SELECT * FROM autor;";
    $resultado_id = mysqli_query($link,$query_autor);
    if ($resultado_id){
        while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
            
			echo '<a href="#" class="list-group-item">';
				echo '<h4 class="list-group-item-heading">'.$registro['nome'].'</h4>';
				echo '<p class="list-group-item-text">'.$registro['endereco'].'</p>';
			echo '</a>';
		}
    }
    else{
        echo 'erro ao adicionar autor no banco de dados';
    }


    function getTelefones($registro,$link){

    }




?>