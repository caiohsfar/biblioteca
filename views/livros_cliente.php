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

    
    <script src="../js/livros.js">

    </script>
    <!-- Bootstrap Select search -->
    <!-- docs: https://www.jqueryscript.net/form/Bootstrap-4-Dropdown-Select-Plugin-jQuery.html -->
    <link rel="stylesheet" href="../js/Bootstrap-4-Dropdown-Select-Plugin-jQuery/dist/css/bootstrap-select.css">
    
    <script src="../js/Bootstrap-4-Dropdown-Select-Plugin-jQuery/dist/js/bootstrap-select.js"></script>
    
    



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
          </ul>    
          <div class="navbar-nav">
            <a class="nav-item nav-link" href="sair.php">Sair</a>
          </div>  
        </div>
      


        

      </div>
  </nav>



  <section class="container">
    <div class="margem-navbar">


    <div class="row" style="margin-top: 50px;">
      <form>
          <div class="form-group">
            <label for="exampleInputEmail1">Data de emprestimo a ser agendado</label>
            <input id="pega" type="date" class="form-control" id="data-inicio">
            <small class="form-text text-muted"></small>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Data de devolução</label>
            <input id="devolve" type="date" class="form-control" id="data-inicio">
            <small class="form-text text-muted"></small>
          </div>
      </form>
    </div>
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4"><h4 style="color: blue;margin-top: 60px;">Livros disponíveis</h4></div>
      <div class="col-md-4"></div>
    </div>
    <div id="listarLivros" style="margin-top: 50px;"></div>

    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4"><h4 style="color: blue;margin-top: 60px;">Livros emprestados a mim</h4></div>
      <div class="col-md-4"></div>
    </div>
    <div id="LivrosEmprestados" style="margin-top: 50px;"></div>



    

          </div>
        

</section>
</body>
</html>