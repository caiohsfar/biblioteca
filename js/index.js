$(document).ready(function(){
            inserirTelefone();
        });


        function inserirTelefone(){
            $('#btn_adicionar').click(function(){
               var numero = $('#telefone').val();
               $.ajax({
                    url: '../php/insert_telefone.php',
                    method: 'post',
                    data: {numero : numero},
                    success: function(data){
                        alert(data);
                
                }
          });
                
            });
        }
