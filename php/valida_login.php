<?php
    require_once('../classes/Database.class.php');
    require_once('../classes/Usuario.class.php');
    require_once('../classes/Funcionario.class.php');
    require_once('../classes/Aluno.class.php');
    require_once('../classes/Professor.class.php');
    session_start();
    //gambiarra enquanto não existe o botao de deslogar
    //session_unset($_SESSION);

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
            $usuario = new Usuario();
            $usuario->setEmail($dados_usuario['email']);
            $usuario->setNome($dados_usuario['nome']);
            $usuario->setEndereco($dados_usuario['endereco']);
            $usuario->setId($dados_usuario['id_usuario']);
            $usuario->setSenha($dados_usuario['senha']);
            $_SESSION['usuario'] = serialize($usuario);
            //aluno
            if (isset($dados_usuario['matricula'])){
                $aluno = new Aluno();
                $aluno->setCurso($dados_usuario['curso']);
                $aluno->setMatricula($dados_usuario['matricula']);
                $aluno->setIdUsuario($dados_usuario['id_usuario']);
                $_SESSION['aluno'] = serialize($aluno);
                header('Location: ../views/home_cliente.php');
            //professor
            }else if (isset($dados_usuario['lates'])){
                $professor = new Professor();
                $professor->setLates($dados_usuario['lates']);
                $professor->setSiape($dados_usuario['siape']);
                $professor->setIdUsuario($dados_usuario['id_usuario']);
                $_SESSION['professor'] = serialize($professor);
                header('Location: ../views/home_professor.php');
            //funcionario
            }else{
                $funcionario = new Funcionario();
                $funcionario->setSiape($dados_usuario['siape']);
                $funcionario->setIdUsuario($dados_usuario['id_usuario']);
                $_SESSION['funcionario'] = serialize($funcionario);
                header('Location: ../views/home_funcionario.php');
            }
    
        }else {
            header('Location: ../views/index.php?erro=1');
        }
    } else {
        echo 'Erro na execução da consulta, favor entrar em contato com o admin do site';
    }






?>