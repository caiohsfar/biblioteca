<?php
  session_start();
  if (!isset($_SESSION['usuario'])){
    header('Location: index.php?erro=1');
  }

  
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


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">




    <title>Funcionários</title>

    
    <script src="../js/professor.js">

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
            <li class="nav-item"> <a class="nav-link" href="home_cliente.php">Início</a> </li>           
            <li class="nav-item"> <a class="nav-link" href="livros_cliente.php">Livros</a> </li>        
          </ul>    
          <div class="navbar-nav">
            <a class="nav-item nav-link" href="sair.php">Sair</a>
          </div>  
        </div>
      


        

      </div>
  </nav>
  <section class="container margem-navbar">
    <div class="row">
        <div class="col-md-4">

         <h4>   <span style="color: green" class="fa fa-user"></span> <span id="nomeUsuario"></span></h4>

        </div>




        <!-- Modal de detalhar -->

        <div class="col-md-4">
                <h4>
                    <a data-toggle="modal" data-target="#detalhar" class="fa fa-eye cursor-link" title="Detalhes do usuário">
                    </a>
                    <a data-toggle="modal" data-target="#editar" onclick="esconderAlertas()" class="fa fa-user-edit cursor-link" title="Editar">
                    </a>
                    <a style="color: red;" class="fa fa-user-times cursor-link" id="excluir-perfil" title="Excluir perfil">
                    </a>
                </h4>

                <!-- Modal -->
                <div class="modal fade" id="detalhar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detalhes</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">

                        <div id="detalhes-usuario"></div>

                        </div>

                      </div>

                  </div>
                </div>
        </div>


  <!-- Modal de editar-->


    <div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Editar</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>


            <div class="form-group">
                <label for="siape" id="labelSiape"><strong>Siape</strong></label>
                <input type="text" class="form-control" id="siapeEdit" aria-describedby="siape" placeholder="exemplo123">
            
            </div>

            <div class="form-group">
                <label for="siape" id="labelSiape"><strong>Lates</strong></label>
                <input type="text" class="form-control" id="latesEdit" aria-describedby="lates" placeholder="exemplo123">
            
            </div>

              <div class="form-group">
                <label for="nome"><strong>Nome</strong></label>
                <input type="text" class="form-control" id="nomeEdit"  required="o campo nome precisa ser preenchido" aria-describedby="nome" placeholder="exemplo123">
            
              </div>


              <div class="form-group">
                <label for="endereco"><strong>Endereço</strong></label>
                <textarea class="form-control" id="enderecoEdit" required="O campo Endereço precisa ser preenchido" placeholder="Rua exemplo, Pernambuco , recife, Número 8" rows="3"></textarea>

              </div>

              <div class="form-group">
                <label for="email"><strong>Email</strong></label>
                <input type="email" class="form-control" id="emailEdit" aria-describedby="email" required="O campo email precisa ser preenchido corretamente." placeholder="exemplo@email.com">
                <small id="emailFrase" class="form-text text-muted">Se você deseja criar mais um perfil, logue em um deles e crie lá.</small>
              </div>

              <div class="form-group">
                <label for="senha"><strong>Senha</strong></label>
                <input type="password" class="form-control" id="senhaEdit" required="O campo senha percisa ser preenchido." placeholder="Senha">
              </div>

              <div class="alert alert-success" role="alert" id="alertSucessoEdit">
               Editado com sucesso!!!
              </div>



          </form>

          </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-success" id="editarCadastro">Editar</button>
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