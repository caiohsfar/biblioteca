<?php
    require_once('../classes/Database.class.php');
    session_start();

    $email = $_POST['email'];
    $senha = $_POST['senha'];
    

    $sql_aluno = "SELECT * FROM usuario NATURAL JOIN aluno
    WHERE email = '$email' AND senha = '$senha'";


    $sql_professor = "SELECT * FROM usuario NATURAL JOIN professor 
    WHERE email = '$email' AND senha = '$senha'";


    $sql_funcionario = "SELECT * FROM usuario NATURAL JOIN funcionario 
    WHERE email = '$email' AND senha = '$senha'";

    $objDb = new Db();
    $link = $objDb->conecta_mysql();

    $tipo_conta = $_POST['tipo_conta'];
    $resultado = null;
    
    // tipo-conta: 1=aluno, 2=professor, 3=funcionario
    switch($tipo_conta) {
        case '1':
            $resultado = mysqli_query($link, $sql_aluno);
            break;
        case '2':
            $resultado = mysqli_query($link, $sql_professor);
            break;
        case '3':
            $resultado = mysqli_query($link, $sql_funcionario);
            break;
    }
    if($resultado){
        $dados_usuario = mysqli_fetch_array($resultado);
        //inserindo dados do usuario na sessão
        if(isset($dados_usuario['email'])){
            $_SESSION['email'] = $dados_usuario['email'];
            $_SESSION['nome'] = $dados_usuario['nome'];
            $_SESSION['endereco'] = $dados_usuario['endereco'];
            //aluno
            if (isset($dados_usuario['matricula'])){
                $_SESSION['matricula'] = $dados_usuario['matricula'];
                $_SESSION['curso'] = $dados_usuario['curso'];
                header('Location: ../views/home_cliente.php');
            //professor
            }else if (isset($dados_usuario['lates'])){
                $_SESSION['lates'] = $dados_usuario['lates'];
                $_SESSION['siape'] = $dados_usuario['siape'];
                header('Location: ../views/home_cliente.php');
            //funcionario
            }else{
                $_SESSION['siape'] = $dados_usuario['siape'];
                header('Location: ../views/home_funcionario.php');
            }
    
        }else {
            header('Location: ../views/index.php?erro=1');
        }
    } else {
        echo 'Erro na execução da consulta, favor entrar em contato com o admin do site';
    }






?>