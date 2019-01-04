$(document).ready(function(){
   clickCadastro();
   $('#telefone').mask('(99)99999-9999)');
  
});

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
            
                }
            });
        };
    })
}
function limparCampos(){
    var nome = $('#nome').val('');
    var telefone = $('#telefone').val('');
    var endereco = $('#endereco-cad-autor').val('');
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