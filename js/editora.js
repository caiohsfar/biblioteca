$(document).ready(function(){
    clickCadastro();
    listarEditoras();
    clickAddTelefone();
    $('#telefone').mask('(99)99999-9999)');
   
 });
 function listarEditoras(){
    $.ajax({
        url: '../php/get_editoras.php',
        success: function(data) {
            $('#lista-editoras').html(data);
            clickDetalhes();
        }
    });
}
function clickAddTelefone(){
    $("#btn_conf_add_telefone_editora").click(function(){
        if (validarCamposTelefone()){
            var telefone = $('#ip_add_telefone_editora').val();
            var id_editora = $("#btn_add_telefone_editora").data('id_editora');
            $.ajax({
                url: '../php/editora/adicionar_telefone_editora.php',
                method: 'post',
                data: {id_editora : id_editora, telefone:telefone},
                success: function(data){
                    if (data){
                        requisitarDetalhes(id_editora);
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
function limparCamposTelefone(){
    $("#ip_add_telefone_editora").val("");
}
function validarCamposTelefone(){
    var validacao = true;
     if($('#ip_add_telefone_editora').val().trim() == ""){
         alert("Preencha o campo corretamente")
         validacao =  false;
     }
     return validacao;
}
function clickDetalhes(){
    $('.btn-detalhes').click(function(){
        var id_editora = $(this).data('id_editora');
        requisitarDetalhes(id_editora);
        
        //window.location.href = '../php/editora/detalhes_editora.php?'+id_editora+'';
    })
}

function requisitarDetalhes(id_editora){
    $.ajax({
        url: '../php/editora/detalhes_editora.php',
        method: 'post',
        data: {id_editora : id_editora},
        success: function(data){
            $('#detalhes_editora').html(data);
            clickRemoverTelefone();
        }
    });
}
 
 function clickCadastro(){
     $('#bt-cadastrar').click(function(){
         if (validaCamposCadastro()){
             var nome = $('#nome').val();
             var telefone = $('#telefone').val();
             var endereco = $('#endereco-cad-editora').val();
           
             $.ajax({
                 url: '../php/cadastrar_editora.php',
                 method: 'post',
                 data: {nome : nome, telefone : telefone, endereco : endereco},
                 success: function(data){
                     listarEditoras();
                     limparCampos();
                     esconderAlertas();
                     $('#alert-sucesso-cadastro').show();
                     
             
                 }
             });
         };
     })
 }
 function limparCampos(){
     $('#nome').val('');
     $('#telefone').val('');
     $('#endereco-cad-editora').val('');
 }
 function clickRemoverTelefone(){
    $('.btn_rem_telefone_editora').click(function(){
        var id_telefone =  $(this).data('id_telefone_editora');
        var id_editora = $("#btn_add_telefone_editora").data('id_editora');
        $.ajax({
            url: '../php/editora/remover_telefone_editora.php',
            method: 'post',
            data: {id_telefone: id_telefone},
            success: function(data){
                if (data){
                    requisitarDetalhes(id_editora);
                }else{
                    alert("Erro ao remover telefone");
                }
                
            }
        });
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
 
     if($('#endereco-cad-editora').val().trim() ==""){
         $('#alert-endereco').show();
         validacao = false;
     }
 
     return validacao;
 }