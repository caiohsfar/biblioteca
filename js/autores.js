$(document).ready(function(){
   clickCadastro();
   listarAutores();
   $('#telefone').mask('(99)99999-9999)');
  
});
function listarAutores(){
    $.ajax({
        url: '../php/get_autores.php',
        success: function(data) {
            $('#lista-autores').html(data);
            clickDetalhes();
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
        $.ajax({
            url: '../php/autor/detalhes_autor.php',
            method: 'post',
            data: {id_autor : id_autor},
            success: function(data){
                
                $('#detalhes_autor').html(data);
                
            }
        });
        
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