<?php

    session_start();
    require_once('../classes/Usuario.class.php');

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
                          <th scope="col">data de emprestimo</th>
                          <th scope="col">data de devolução</th>
                        </tr>
            </thead>
            <tbody>';
            $db = new Db();
            $usuario = unserialize($_SESSION['usuario']);
            $id = $usuario->getId();
            $link = $db->conecta_mysql();
            $sql = "SELECT titulo_livro.nome,emprestimo.data_emprestimo,emprestimo.data_devolucao
FROM emprestimo 
INNER JOIN exemplar_livro ON(emprestimo.id_exemplar = exemplar_livro.id_exemplar and emprestimo.id_usuario= '$id')
INNER JOIN titulo_livro ON ( titulo_livro.isbn = exemplar_livro.isbn_livro);";
            $resultado_busca = mysqli_query($link,$sql);
            if($resultado_busca){
                while ($registro = mysqli_fetch_array($resultado_busca,MYSQLI_ASSOC)) {
                    echo ' <tr>
                                  <th scope="row"> </th>
                                  <td>'.$registro['nome'].'</td>
                                  <td>'.$registro['data_emprestimo'].'</td>
                                  <td>'.$registro['data_devolucao'].'</td>
                                </tr>';
                }
            }
            echo '</tbody>
</table>';
    


?>