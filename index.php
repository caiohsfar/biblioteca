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

    <style type="text/css"></style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


    <title>Alunos</title>

    
    <script>


        $(document).ready(function(){
            inserirTelefone();
        });


        function inserirTelefone(){
            $('#btn_adicionar').click(function(){
               var numero = $('#telefone').val();
               $.ajax({
                    url: 'php/insert_telefone.php',
                    method: 'post',
                    data: {numero : numero},
                    success: function(data){
                        alert(data);
                
                }
          });
                
            });
        }


    </script>


  </head>
  <body>
      <input id="telefone" type="text">
      <button id="btn_adicionar" > Adicionar </button>
    
  </body>
</html>

