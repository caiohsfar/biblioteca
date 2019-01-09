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

    
    <script src="../js/editora.js">

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
            <li class="nav-item"> <a class="nav-link" href="home_funcionario.php">Início</a> </li>           
            <li class="nav-item"> <a class="nav-link" href="livros.php">Livros</a> </li>
            <li class="nav-item"> <a class="nav-link" href="autores.php">Autores</a> </li>
            <li class="nav-item"> <a class="nav-link" href="editoras.php">Editoras</a> </li>          
          </ul>    
          <div class="navbar-nav">
            <a class="nav-item nav-link" href="sair.php">Sair</a>
          </div>  
        </div>
      


        

      </div>
  </nav>
  <section class="container">
    <div class="margem-navbar">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-editora"
      onclick="esconderAlertas()">
          Cadastrar editora
      </button>
    <div class="modal fade" id="modal-editora" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Cadastro de editora</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                  <label for="nome" id="labelnome"><strong>Nome</strong></label>
                  <input type="text" class="form-control" id="nome" aria-describedby="nome" placeholder="exemplo">
              
              </div>

              <div class="alert alert-danger" role="alert" id="alert-nome">
                  Preencha o <a href="#" class="alert-link">nome</a>.
              </div>


              <div class="form-group">
                <label for="endereco"><strong>Endereço</strong></label>
                <textarea class="form-control" id="endereco-cad-editora" required="O campo Endereço precisa ser preenchido" placeholder="Rua exemplo, Pernambuco , recife, Número 8" rows="3"></textarea>
              </div>

              <div class="alert alert-danger" role="alert" id="alert-endereco">
                Preencha o <a href="#" class="alert-link">endereco</a>.
              </div>


              <div class="form-group">
                  <label for="telefone" id="label-telefone"><strong>Telefone</strong></label>
                  <input class="form-control" id="telefone" aria-describedby="telefone" placeholder="(99) 99999-9999">
              </div>
              <small id="telefone-editora" class="form-text text-muted">Você pode cadastrar mais telefones depois.</small>
              
              </div>

              <div class="alert alert-success" role="alert" id="alert-sucesso-cadastro">
                Editora cadastrada com sucesso.
              </div>



          </form>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
            <button type="submit" class="btn btn-success" id="bt-cadastrar">Cadastrar</button>
          </div>

          </div>
        
        </div>
    </div>
</section>

  <div class="container">
        <div class="row">
          <div class="clearfix"></div>
          <br>
          <div class="col-md-3"></div>
          <div class="col-md-6">
            <ul id="lista-editoras" class="list-group"></ul>
          </div>
          <div class="col-md-3"></div>
        </div>
  </div>
  <section class="container margem-navbar">
    <div class="row">
        <!-- Modal de detalhar -->

        <div class="col-md-4">
                <!-- Modal -->
                <div class="modal fade" id="detalhar_editora_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detalhes</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">

                        <div id="detalhes_editora">
                      
                        </div>
                       

                        </div>

                      </div>
                    </div>
                </div>
      </div>
      </section>


  <section class="container margem-navbar">
    <div class="row">
        <!-- Modal de adicoinar telefone -->

        <div class="col-md-4">
                <!-- Modal -->
                <div class="modal fade" id="add_telefone_modal_editora" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detalhes</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                            <label for="adicionar_telefone" id="label-add-telefone"><strong>Telefone</strong></label>
                            <input class="form-control" id="adicionar_delefone_editora" aria-describedby="telefone" placeholder="(99) 99999-9999">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                          <button type="submit" class="btn btn-success" id="btn_add_telefone_editora">Adicionar</button>
                        </div>

                        </div>

                      </div>
                    </div>
                </div>
      </div>
      </section>
      
</body>
</html>