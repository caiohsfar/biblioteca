$(document).ready(function(){
            nomeUsuario();
            detalhesUsuario();
            editarUsuario();
            excluirPerfil();
            clickAddTelefone();
            listar();
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

    function listar() {
    $.ajax({
        url: '../php/listarLivros.php',
        method: 'post',
        data: {},
        success: function(data){
            $('#listarLivros').html(data);
            emprestarLivro();
                
        }
    });
}

	function detalhesUsuario(){
		$.ajax({
                    url: '../php/funcionario/detalhes-usuario-funcionario.php',
                    method: 'post',
                    data: {},
                    success: function(data){
                            $('#detalhes-usuario').html(data);
                            clickRemoverTelefone();
                        
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
            var siape = -1;
            var id_novo = -1;
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

            if($('#siapeEdit').val().trim() !=""){
            	siape = $('#siapeEdit').val();
            	validacao = true;
            }
            if($.isNumeric($('#editar_codigo').val())){
                id_novo = $('#editar_codigo').val();
                alert(id_novo);
                validacao = true;
            }


            if(validacao){
            	$.ajax({
                    url: '../php/funcionario/editar-funcionario.php',
                    method: 'post',
                    data: {nome:nome,email:email,siape:siape,senha:senha,endereco:endereco,id_novo:id_novo},
                    success: function(data){
                        detalhesUsuario();
                        $('#alertSucessoEdit').show();
                		}
          		});
            }else{
                alert("Preencha algum campo");
            }
            


		});
	}

	function excluirPerfil(){
            $('#excluir-perfil').click(function(){
               $.ajax({
                    url: '../php/funcionario/excluir-funcionario.php',
                    method: 'post',
                    data: {},
                    success: function(data){
                        window.location.href = '../views/index.php';
                
                }
          });
                
            });
        }

    function clickAddTelefone(){
        $("#btn_conf_add_telefone_funcionario").click(function(){
            if (validarCamposTelefone()){
                var telefone = $('#ip_add_telefone_funcionario').val();
                alert
                $.ajax({
                    url: '../php/insert_telefone.php',
                    method: 'post',
                    data: {telefone : telefone},
                    success: function(data){
                        if (data){
                            detalhesUsuario();
                            alert("Telefone adicionado com sucesso");
                            limparCamposTelefone();
                        
                        }else{
                            alert("Erro ao dicionar telefone");
                        }
                        
                    }
                });
            }
        });
    }
    function clickRemoverTelefone(){
        $('.btn_rem_telefone_usuario').click(function(){
            var id_telefone =  $(this).data('id_telefone_usuario');
            $.ajax({
                url: '../php/remover_telefone_usuario.php',
                method: 'post',
                data: {id_telefone: id_telefone},
                success: function(data){
                    if (data){
                        detalhesUsuario();
                    }else{
                        alert("Erro ao remover telefone");
                    }
                    
                }
            });
        })
     }
    function limparCamposTelefone(){
        $("#ip_add_telefone_funcionario").val("");
    }
    function validarCamposTelefone(){
        var validacao = true;
         if($('#ip_add_telefone_funcionario').val().trim() == ""){
             alert("Preencha o campo corretamente")
             validacao =  false;
         }
         return validacao;
    }

        function emprestarLivro(){
            $('.emprestar').click(function(){
                var id_aluno = $(this).data('id_aluno');
               $.ajax({
                    url: '../php/emprestarLivro',
                    method: 'post',
                    data: {id_aluno:id_aluno},
                    success: function(data){
                        window.location.href = '../views/index.php';
                
                }
          });
                
            });
        }