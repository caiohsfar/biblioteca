<?php

    session_start();

    if(!isset($_SESSION['usuario'])){
        header('Location: index.php?erro=1');
    }

    require_once('../classes/Database.class.php');
            echo '
            <table class="table">
            <thead>
                        <tr>
                        <th scope="col">#</th>
                          <th scope="col">nome</th>
                          <th scope="col">volume</th>
                          <th scope="col">edição</th>
                        </tr>
            </thead>
            <tbody>';
            $db = new Db();
            $link = $db->conecta_mysql();
            $sql = "SELECT * FROM titulo_livro";
            $resultado_busca = mysqli_query($link,$sql);
            if($resultado_busca){
                while ($registro = mysqli_fetch_array($resultado_busca,MYSQLI_ASSOC)) {
                    echo ' <tr>
                                  <th scope="row"><a data-id_aluno="'.$registro['isbn'].'" class="emprestar fa fa-book btn btn-success"><a/></th>
                                  <td>'.$registro['nome'].'</td>
                                  <td>'.$registro['volume'].'</td>
                                  <td>'.$registro['edicao'].'</td>
                                </tr>';
                }
            }
            echo '</tbody>
</table>';
    


?>