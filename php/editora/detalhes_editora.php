<?php
    require_once("../../classes/Database.class.php");
    $id_editora = $_POST['id_editora'];




    $db = new Db();
    $link = $db->conecta_mysql();

    $sql = "SELECT * FROM editora WHERE id_editora = '$id_editora'";
    $resultado_busca = mysqli_query($link,$sql);

    if($resultado_busca){
        $dados_editora = mysqli_fetch_array($resultado_busca,MYSQLI_ASSOC);
        echo '<strong class="margem-linha-modal">Nome</strong>';
        echo '<br/>';
        echo ($dados_editora['nome']);
        echo '<br/>';
        echo '<strong class="margem-linha-modal">Endereço</strong>';
        echo '<br/>';
        echo ($dados_editora['endereco']);
        echo '<br/>';
        echo '<strong class="margem-linha-modal">Telefones</strong>';
        echo '<span> <button data-toggle="modal" data-target="#add_telefone_modal_editora" class="btn btn-link btn-detalhes" >Add</button></span>';
        echo '<ul id="lista_telefones" class="list-group">';
        
        getTelefones($id_editora);
    }else{
        echo 'sem resultados';
    }
    
    function getTelefones($id_editora){
        $db = new Db();
        $link = $db->conecta_mysql();

        $sql = "SELECT * FROM telefone_editora WHERE id_editora = '$id_editora'";
        $resultado_busca = mysqli_query($link,$sql);
        if($resultado_busca){
            while($registro = mysqli_fetch_array($resultado_busca, MYSQLI_ASSOC)){
                echo '<li class="list-group-item">'.$registro['numero'].'</li>';
            }
            echo '</ul>';
        }else{
            return false;
        }
    }

    





?>