$(document).ready(function(){
            nomeUsuario();
            detalhesUsuario();
            editarUsuario();
            excluirPerfil();
        });
	function nomeUsuario(){
		$.ajax({
                    url: '../php/usuario/carrega-nome.php',
                    method: 'post',
                    data: {},
                    success: function(data){
                            $('#nomeUsuario').html(data);
                        
                }
          });
	}

	function detalhesUsuario(){
		$.ajax({
                    url: '../php/aluno/detalhes-usuario-aluno.php',
                    method: 'post',
                    data: {},
                    success: function(data){
                            $('#detalhes-usuario').html(data);
                        
                }
          });
	}

	function esconderAlertas(){
    	$('#alertSucessoEdit').hide();
	}

	function editarUsuario(){
		$('#editarCadastro').click(function(){
            var validacao = false;
            var nome = -1;
            var email = -1;
            var endereco = -1;
            var senha = -1;
            var matricula = -1;
            var curso = -1;
            if( $('#nomeEdit').val().trim() !=""){
            	nome = $('#nomeEdit').val();
            	validacao = true;
            }

            if($('#emailEdit').val().trim() !=""){
            	email = $('#emailEdit').val();
            	validacao = true;
            }

            if($('#enderecoEdit').val().trim() !=""){
            	endereco = $('#enderecoEdit').val();
            	validacao = true;
            }
      
            if($('#senhaEdit').val().trim() !=""){
            	senha = $('#senhaEdit').val();
            	validacao = true;
            }

            if($('#matriculaEdit').val().trim() !=""){
            	matricula = $('#matriculaEdit').val();
            	validacao = true;
            }

            if($('#cursoEdit').val().trim() !=""){
                curso = $('#cursoEdit').val();
                validacao = true;
            }


            if(validacao){
            	$.ajax({
                    url: '../php/aluno/editar-aluno.php',
                    method: 'post',
                    data: {nome:nome,email:email,curso:curso,senha:senha,endereco:endereco,matricula:matricula},
                    success: function(data){
                        detalhesUsuario();
                        $('#alertSucessoEdit').show();
                		}
          		});
            }
            


		});
	}

	function excluirPerfil(){
            $('#excluir-perfil').click(function(){
               $.ajax({
                    url: '../php/aluno/excluir-aluno.php',
                    method: 'post',
                    data: {},
                    success: function(data){
                        window.location.href = '../views/index.php';
                
                }
          });
                
            });
        }