$(document).ready(function(){
            $('#telefone').mask('(99)99999-9999');
            mostrarCampoRadio();
            clickLogin();
            cadastrarUsuario();

        });
        
        function inserirTelefone(){
            $('#btn_adicionar').click(function(){
               var numero = $('#telefone').val();
               $.ajax({
                    url: '../php/insert_telefone.php',
                    method: 'post',
                    data: {numero : numero},
                    success: function(data){
                        
                
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
function esconderAlertas(){
    $('#alertSiape').hide();
            $('#alertCurso').hide();
            $('#alertLates').hide();
            $('#alertNome').hide();
            $('#alertEmail').hide();
            $('#alertSenha').hide();
            $('#alertEndereco').hide();
            $('#alertDescricao').hide();
            $('#alertMatricula').hide();
            $('#alertUsuarioExiste').hide();
            $('#alertSucessoCadastro').hide();
}
        function validaCamposCadastro(){
            var validacao = true;
            var tipoContaValidacao = getRadioValor('tipoConta');
            if($('#nomeCadastro').val().trim() ==""){
                $('#alertNome').show();
                validacao =  false;
            }

            if($('#emailCadastro').val().trim() ==""){
                $('#alertEmail').show();
                validacao = false;
            }

            if($('#enderecoCadastro').val().trim() ==""){
                $('#alertEndereco').show();
                validacao = false;
            }

            if($('#senhaCadastro').val().trim() ==""){
                $('#alertSenha').show();
                validacao = false;
            }


            if(tipoContaValidacao =="aluno"){
                if($('#matricula').val().trim() ==""){
                    $('#alertMatricula').show();
                    validacao = false;
                    }
                if($('#curso').val().trim() ==""){
                    $('#alertCurso').show();
                    validacao = false;
                }
            }

            if(tipoContaValidacao =="professor"){
                if($('#lates').val().trim() ==""){
                    $('#alertLates').show();
                    validacao = false;
                    }
                if($('#siape').val().trim() ==""){
                    $('#alertSiape').show();
                }
            }

            if(tipoContaValidacao =="funcionario"){
                if($('#siape').val().trim() ==""){
                    $('#alertLates').show();
                     validacao = false;
                    }
            }

            return validacao;
        }

        function cadastrarUsuario(){
            $('#cadastrar').click(function(){
                if(validaCamposCadastro()){
                var nome = $('#nomeCadastro').val();
                var email = $('#emailCadastro').val();
                var endereco = $('#enderecoCadastro').val();
                var senha = $('#senhaCadastro').val();
                var telefone = $('#telefone').val();
                var siape = 0;
                var matricula = 0;
                var curso = 0;
                var lates = 0;

                var tipoConta = getRadioValor('tipoConta');

                if(tipoConta=="aluno"){
                    var matricula = $('#matricula').val();
                    var curso = $('#curso').val();
                    var siape = null;
                }

                if(tipoConta=="professor"){
                    var siape = $('#siape').val();
                    var lates = $('#lates').val();
                    var matricula = null;
                    var curso = null;
                }

                if(tipoConta=="funcionario"){
                    var siape = $('#siape').val();
                    var lates = $('#lates').val();
                    var cargo = $('#tipoCargo').val();
                    var curso = null;
    
                }

                $.ajax({
                    url: '../php/usuario/inserir-usuario.php',
                    method: 'post',
                    data: {nome:nome, email:email, endereco: endereco, senha:senha,siape:siape, matricula:matricula, curso:curso, tipoConta:tipoConta,lates:lates, telefone:telefone},
                    success: function(data){
                            if(data==false){
                                esconderAlertas();
                            
                                $('#alertUsuarioExiste').show();
                            }
                            else{
                                
                                esconderAlertas();
                                $('#alertSucessoCadastro').show();
                            }
                        
                }
          });
            }
            else{
                alert('Preencha todos os campos');
            }
            });
        }

        function getRadioValor(name){
          var rads = document.getElementsByName(name);
           
          for(var i = 0; i < rads.length; i++){
           if(rads[i].checked){
            return rads[i].value;
           }
           
          }
           
          return null;
    }

    function mostrarCampoRadio(){
        var radios = document.querySelectorAll('input[type=radio][name="tipoConta"]');
            $('#tipoCargo').hide();
            $('#siape').hide();
            $('#labelSiape').hide();
            //$('#matricula').hide();
            //$('#labelMatricula').hide();
            //$('#curso').hide();
            //$('#labelCurso').hide();
            $('#lates').hide();
            $('#labelLates').hide();
                function changeHandler(event) {
                    esconderAlertas();
                   if ( this.value =="aluno") {
                    $('#labelSiape').hide();
                    $('#siape').hide();
                    $('#matricula').show();
                    $('#labelMatricula').show();
                    $('#curso').show();
                    $('#labelCurso').show();
                    $('#tipoCargo').hide();
                    $('#lates').hide();
                    $('#labelLates').hide();
                   }
                   else if ( this.value =="professor" ) {
                    $('#siape').show();
                    $('#labelSiape').show();
                    $('#matricula').hide();
                    $('#labelMatricula').hide();
                    $('#curso').hide();
                    $('#labelCurso').hide();
                    $('#tipoCargo').hide();
                    $('#lates').show();
                    $('#labelLates').show();
                   }

                   else if ( this.value =="funcionario" ) {
                    $('#tipoCargo').show();
                    $('#siape').show();
                    $('#labelSiape').show();
                    $('#matricula').hide();
                    $('#labelMatricula').hide();
                    $('#curso').hide();
                    $('#labelCurso').hide();
                    $('#lates').hide();
                    $('#labelLates').hide();
                   }
                }

                Array.prototype.forEach.call(radios, function(radio) {
                   radio.addEventListener('change', changeHandler);
                   $("#radioAluno").prop("checked", true);
                });

    }

    
    
    

   


