$(document).ready(function(){
    clickCadastro();
    listarEditoras();
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
function clickDetalhes(){
    $('.btn-detalhes').click(function(){
        var id_editora = $(this).data('id_editora');
        $.ajax({
            url: '../php/editora/detalhes_editora.php',
            method: 'post',
            data: {id_editora : id_editora},
            success: function(data){
                $('#detalhes_editora').html(data);
            }
        });
        
        //window.location.href = '../php/editora/detalhes_editora.php?'+id_editora+'';
    })
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