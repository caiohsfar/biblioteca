$(document).ready(function(){
            inserirTelefone();
            clickLogin();
            cadastrarUsuario();
            mostrarCampoRadio();

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


        function cadastrarUsuario(){
            $('#cadastrar').click(function(){
                var nome = $('#nomeCadastro').val();
                var email = $('#emailCadastro').val();
                var endereco = $('#enderecoCadastro').val();
                var senha = $('#senhaCadastro').val();
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
                    var curso = null;
                }

                $.ajax({
                    url: '../php/usuario/inserir-usuario.php',
                    method: 'post',
                    data: {nome:nome, email:email, endereco: endereco, senha:senha,siape:siape, matricula:matricula, curso:curso, tipoConta:tipoConta,lates:lates},
                    success: function(data){
                        alert(data);
                }
          });
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
            $('#siape').hide();
            $('#labelSiape').hide();
            $('#matricula').hide();
            $('#labelMatricula').hide();
            $('#curso').hide();
            $('#labelCurso').hide();
            $('#lates').hide();
            $('#labelLates').hide();
                function changeHandler(event) {
                   if ( this.value =="aluno") {
                    $('#labelSiape').hide();
                    $('#siape').hide();
                    $('#matricula').show();
                    $('#labelMatricula').show();
                    $('#curso').show();
                    $('#labelCurso').show();
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
                    $('#lates').hide();
                    $('#labelLates').hide();
                   }

                   else if ( this.value =="funcionario" ) {
                    $('#siape').show();
                    $('#labelSiape').show();
                    $('#matricula').hide();
                    $('#labelMatricula').hide();
                    $('#curso').hide();
                    $('#labelCurso').hide();
                    $('#lates').show();
                    $('#labelLates').show();
                   }
                }

                Array.prototype.forEach.call(radios, function(radio) {
                   radio.addEventListener('change', changeHandler);
                });
    }

   


