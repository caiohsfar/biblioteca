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
            
			echo '<li  data-id_autor = '.$registro['id_autor'].' class="list-group-item d-flex justify-content-between align-items-center">';
                echo '<div><h4 class="list-group-item-heading">'.$registro['nome'].'</h4>';
                echo '<button data-toggle="modal" data-target="#detalhar_autor_modal" data-id_autor = '.$registro['id_autor'].' class="btn btn-link btn-detalhes" >Detalhes</button></div>';
                echo '<span><button style="color:red;" data-id_autor = '.$registro['id_autor'].' class="btn btn-link btn-remover" >Remover</button></span>';
			echo '</li>';
		}
    }
    else{
        echo 'erro ao adicionar autor no banco de dados';
    }


    



?>