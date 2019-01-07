<?php

    require_once('../classes/Livro.class.php');
    require_once('../classes/Database.class.php');
    require_once('../classes/LivroDAO.class.php');


    $livro = new Livro();
    $livro->setArrayAutores($_POST['autores']);
    $livro->setArrayEditoras($_POST['editoras']);
    $livro->setArrayPalavras($_POST['palavras']);
    $livro->setNome($_POST['nome']);
    $livro->setIsbn($_POST['isbn']);
    $livro->setIdAreaConhecimento($_POST['id_area']);
    $livro->setEdicao($_POST['edicao']);
    $livro->setVolume($_POST['volume']);
    
    $livroDAO = new LivroDAO();

    echo var_dump($_POST['palavras']);

    if(!$livroDAO->existeLivro($livro->getIsbn())){
        //LIVRO
        if($livroDAO->inserirLivro($livro)){
            echo 'Livro inserido com sucesso';
        }
        else{
            echo 'erro ao adicionar livro';
            die();
        }
        //publicacao
        if($livroDAO->inserirPulicacao($livro)){
            echo 'Publlicação inserido com sucesso';
        }
        else{
            echo 'erro ao adicionar Publicação';
            die();
        }
        //ESCRITURA

        if($livroDAO->inserirEscritura($livro)){
            echo 'Escrituras inseridas com sucesso';
        }
        else{
            echo 'erro ao adicionar escritura';
            die();
        }
        //ASSOSICACO PALAVRA

        if($livroDAO->inserirAssociacaoPalavra($livro)){
            echo 'A/P inserida';
        }
        else{
            echo 'Erro ao adicionar A/P';
            die();
        }
    }else{
        return false;
    }






?>