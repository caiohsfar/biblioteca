<?php

  $erro = isset($_GET['erro']) ? $_GET['erro'] : 0;
  
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style type="text/css">
       
    </style>
     

    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="../styles/index.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


    <title>Alunos</title>

    
    <script src="../js/index.js">

    </script>


  </head>
  <body>
      <nav class="navbar navbar-light navbar-expand-lg fixed-top" style="background-color: #e3f2fd;">
      <div class="container">
        <a href="index.html" class="navbar-brand logo" ></a>

        <button class="navbar-toggler" type="button" data-toggle ="collapse" data-target= "#biblioteca">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="biblioteca">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item"> <a class="nav-link" href="index.php">Alunos</a> </li>
            <li class="nav-item"> <a class="nav-link" href="disciplinas.php">Disciplinas</a> </li>
            <li class="nav-item"> <a class="nav-link" href="matriculas.php">Matriculas</a> </li>

          </ul>

          <ul class="nav navbar-nav flex-row justify-content-between ml-auto">
                <li class="dropdown order-1 <?= $erro == 1 ? 'show' : '' ?>">
                    <button type="button" id="dropdownMenu1" data-toggle="dropdown" class="btn btn-outline-secondary dropdown-toggle" >Login <span class="caret"></span></button>
                    <ul class="dropdown-menu dropdown-menu-right mt-2 <?= $erro == 1 ? 'show' : '' ?>">
                       <li class="px-3 py-2">
                           <form class="form" role="form" method="post" action="../php/valida_login.php">
                                <div class="form-group">
                                    <input id="emailInput" placeholder="Email" class="form-control form-control-sm" type="text" required="Preencha o campo de email" name="email">
                                </div>
                                <div class="form-group">
                                    <input id="passwordInput" placeholder="Password" class="form-control form-control-sm" type="password" required="Preencha o campo de senha" name="senha">
                                </div>
                                <div class="form-group">
                                  <select class="custom-select" id="tipoConta" name="tipo_conta">
                                    <option selected value="">Tipo</option>
                                    <option value="1">Aluno</option>
                                    <option value="2">Professor</option>
                                    <option value="3">Funcionário</option>
                                  </select>
                                </div>
                              
                                <div class="form-group">
                                    <button id="btn_logar" type="submit" class="btn btn-primary btn-block">Login</button>
                                </div>

                                <?php
                                  if($erro == 1){
                                    echo '<font color="#FF0000">Usuário e ou senha inválido(s)</font>';
                                  }
                                ?>
                                
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>


        

      </div>
  </nav>
  <section class="container">
    <div class="margem-navbar">
      <h4>Ainda não é cadastrado?</h4>

      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
        Cadastre-se
      </button>




  <!-- Modal de cadastro de usuário-->


    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Formulário de cadastro</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>

              <strong>Escolha seu perfil</strong>
                <br/>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="tipoConta" id="tipoConta1" value="aluno">
                <label class="form-check-label" for="Radio1"><strong>Aluno</strong></label>
              </div>


            <div class="form-check">
              <input  class="form-check-input" type="radio" name="tipoConta" id="tipoConta2" value="professor">
              <label class="form-check-label" for="Radio2">
                <strong>Professor</strong>
              </label>
            </div>


            <div class="form-check">
              <input class="form-check-input" type="radio" name="tipoConta" id="tipoConta3" value="funcionario">
              <label class="form-check-label" for="Radio3">
                <strong>Funcionário</strong>
              </label>
            </div>

            <div class="form-group">
                <label for="siape" id="labelSiape"><strong>Siape</strong></label>
                <input type="text" class="form-control" id="siape" aria-describedby="siape" placeholder="exemplo123">
            
            </div>

            <div class="form-group">
                <label for="lates" id="labelLates"><strong>Lates</strong></label>
                <input type="text" class="form-control" id="lates" aria-describedby="lates" placeholder="exemplo123">
            
            </div>

            <div class="form-group">
                <label for="matricula" id="labelMatricula"><strong>Matrícula</strong></label>
                <input type="text" class="form-control" id="matricula" aria-describedby="matricula" placeholder="exemplo123">
            
              </div>

            <div class="form-group">
                <label for="curso" id="labelCurso"><strong>Curso</strong></label>
                <input type="text" class="form-control" id="curso" aria-describedby="curso" placeholder="curso">
            
            </div>


              <div class="form-group">
                <label for="nome"><strong>Nome</strong></label>
                <input type="text" class="form-control" id="nomeCadastro" aria-describedby="nome" placeholder="exemplo123">
            
              </div>

              <div class="form-group">
                <label for="endereco"><strong>Endereço</strong></label>
                <textarea class="form-control" id="enderecoCadastro" placeholder="Rua exemplo, Pernambuco , recife, Número 8" rows="3"></textarea>

              </div>
              <div class="form-group">
                <label for="email"><strong>Email</strong></label>
                <input type="email" class="form-control" id="emailCadastro" aria-describedby="email" placeholder="exemplo@email.com">
                <small id="emailFrase" class="form-text text-muted">Se você deseja criar mais um perfil, logue em um deles e crie lá.</small>
              </div>

              <div class="form-group">
                <label for="senha"><strong>Senha</strong></label>
                <input type="password" class="form-control" id="senhaCadastro" placeholder="Senha">
              </div>



          </form>

          </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-success" id="cadastrar">Cadastrar</button>
              </div>
            </div>
          </div>
        </div>
    </div>

    <div class="row" style="margin-top: 150px;">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <h1>Seja bem vindo a nossa biblioteca!</h1>
      </div>
    </div>
  </section>
    
  </body>
</html>