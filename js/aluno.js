$(document).ready(function(){
            nomeUsuario();
            detalhesUsuario();
            editarUsuario();
            excluirPerfil();
            listar();
            clickAddTelefone();
            $('#ip_add_telefone_aluno').mask('(99)99999-9999');
            

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
            var matricula = -1;
            var curso = -1;
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

            if($('#matriculaEdit').val().trim() !=""){
            	matricula = $('#matriculaEdit').val();
            	validacao = true;
            }

            if($('#cursoEdit').val().trim() !=""){
                curso = $('#cursoEdit').val();
                validacao = true;
            }
            if($('#editar_codigo').val().trim() !=""){
                id_novo = $('#editar_codigo').val();
                validacao = true;
            }


            if(validacao){
            	$.ajax({
                    url: '../php/aluno/editar-aluno.php',
                    method: 'post',
                    data: {nome:nome,email:email,curso:curso,senha:senha,endereco:endereco,matricula:matricula,id_novo:id_novo},
                    success: function(data){
                        if (data == false){
                            alert("Já existe um usuário com esse código.")
                        }else{
                            detalhesUsuario();
                            $('#alertSucessoEdit').show();
                        }
                        
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
                    url: '../php/aluno/excluir-aluno.php',
                    method: 'post',
                    data: {},
                    success: function(data){
                        window.location.href = '../views/index.php';
                
                }
          });
                
            });
    }

    function clickAddTelefone(){
        $("#btn_conf_add_telefone_aluno").click(function(){
            if (validarCamposTelefone()){
                var telefone = $('#ip_add_telefone_aluno').val();
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
        $("#ip_add_telefone_aluno").val("");
    }
    function validarCamposTelefone(){
        var validacao = true;
         if($('#ip_add_telefone_aluno').val().trim() == ""){
             alert("Preencha o campo corretamente")
             validacao =  false;
         }
         return validacao;
    }
    