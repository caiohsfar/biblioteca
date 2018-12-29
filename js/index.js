$(document).ready(function(){
            inserirTelefone();
            clickLogin();
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

        function clickLogin(){
            $('#btn_logar').click(function(){
                return validarCampos();
            })
        }
        function validarCampos(){
            var campo_vazio = false;
            if($('#emailInput').val() == ''){
                $('#emailInput').css({'border-color': '#A94442'});
                campo_vazio = true;
            } else {
                $('#emailInput').css({'border-color': '#CCC'});
            }

            if($('#passwordInput').val() == ''){
                $('#passwordInput').css({'border-color': '#A94442'});
                campo_vazio = true;
            } else {
                $('#passwordInput').css({'border-color': '#CCC'});
            }

            if ($('#tipoConta').val() == ""){
                campo_vazio = true;
                alert("Selecione o tipo da conta.")
            }

            if(campo_vazio) return false;
        }
