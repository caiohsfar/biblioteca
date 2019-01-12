$(document).ready(function(){
   clickCadastro();
   listarAutores();
   clickAddTelefone();
   $('#telefone').mask('(99)99999-9999');
  
});
function clickRemover(){
    $('.btn-remover').click(function(){
        var id_autor = $(this).data('id_autor');
        $.ajax({
            url: '../php/autor/remover_autor.php',
            method: 'post',
            data: {id_autor : id_autor},
            success: function(data){
                if (data){
                    listarAutores();
                }else{
                    alert("Erro ao remover autor");
                }
                
            }
        });
        
    })
}
function listarAutores(){
    $.ajax({
        url: '../php/get_autores.php',
        success: function(data) {
            $('#lista-autores').html(data);
            clickDetalhes();
            clickRemover();
        }
    });
}
function clickAddTelefone(){
    $("#btn_conf_add_telefone_autor").click(function(){
        if (validarCamposTelefone()){
            var telefone = $('#ip_add_telefone_autor').val();
            var id_autor = $("#btn_add_telefone_autor").data('id_autor');
            $.ajax({
                url: '../php/autor/adicionar_telefone_autor.php',
                method: 'post',
                data: {id_autor : id_autor, telefone:telefone},
                success: function(data){
                    if (data){
                        limparCamposTelefone();
                        requisitarDetalhes(id_autor);
                        alert("Telefone adicionado com sucesso");
                        
                    
                    }else{
                        alert("Erro ao dicionar telefone");
                    }
                    
                }
            });
        }
    });
}
function limparCamposTelefone(){
    $("#ip_add_telefone_autor").val("");
}
function validarCamposTelefone(){
    var validacao = true;
     if($('#ip_add_telefone_autor').val().trim() == ""){
         alert("Preencha o campo corretamente")
         validacao =  false;
     }
     return validacao;
}
function requisitarDetalhes(id_autor){
    $.ajax({
        url: '../php/autor/detalhes_autor.php',
        method: 'post',
        data: {id_autor : id_autor},
        success: function(data){
            $('#detalhes_autor').html(data);
            clickRemoverTelefone();
        }
    });
}
 

function clickCadastro(){
    $('#bt-cadastrar').click(function(){
        if (validaCamposCadastro()){
            var nome = $('#nome').val();
            var telefone = $('#telefone').val();
            var endereco = $('#endereco-cad-autor').val();
          
            $.ajax({
                url: '../php/cadastrar_autor.php',
                method: 'post',
                data: {nome : nome, telefone : telefone, endereco : endereco},
                success: function(data){
                    limparCampos();
                    esconderAlertas();

                    $('#alert-sucesso-cadastro').show();
                    listarAutores();
                    
            
                }
            });
        };
    })
}
function limparCampos(){
    $('#nome').val('');
    $('#telefone').val('');
    $('#endereco-cad-autor').val('');
}

function clickDetalhes(){
    $('.btn-detalhes').click(function(){
        var id_autor = $(this).data('id_autor');
        requisitarDetalhes(id_autor);
        
        //window.location.href = '../php/autor/detalhes_autor.php?'+id_autor+'';
    })
}


function esconderAlertas(){
    $('#alert-nome').hide();
    $('#alert-endereco').hide();
    $('#alert-sucesso-cadastro').hide();
}

function validaCamposCadastro(){
    var validacao = true;
    if($('#nome').val().trim() == ""){
        $('#alert-nome').show();
        validacao =  false;
    }

    if($('#endereco-cad-autor').val().trim() ==""){
        $('#alert-endereco').show();
        validacao = false;
    }

    return validacao;
}
function clickRemoverTelefone(){
    $('.btn_rem_telefone_autor').click(function(){
        var id_telefone =  $(this).data('id_telefone_autor');
        var id_autor = $("#btn_add_telefone_autor").data('id_autor');
        $.ajax({
            url: '../php/autor/remover_telefone_autor.php',
            method: 'post',
            data: {id_telefone: id_telefone},
            success: function(data){
                if (data){
                    requisitarDetalhes(id_autor);
                }else{
                    alert("Erro ao remover telefone");
                }
                
            }
        });
    })
 }