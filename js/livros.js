$(document).ready(function(){
    $('#isbn').mask('999999999-9');
    $('#edicao').mask('99');
    $('#volume').mask('99');
    carregarSelects();
    clickCadastrar();
    listar();
    listarEmprestados();
   
});

function clickCadastrar(){
    $("#btn-cadastrar").click(function(){
        if(!validarCampos()){
            return;
        }
        //array
        var autores = $("#select-autor").val();
        //array
        var editoras = $("#select-editora").val();
        //array
        var palavras = $("#select-palavra").val();
        var id_area = $("#select-area").val();
        var nome = $("#nome").val();
        var isbn = $("#isbn").val();     
        var edicao = $("#edicao").val();    
        var volume = $("#volume").val();
        
        
        $.ajax({
            url: '../php/cadastrar_livro.php',
            method: 'post',
            data: {autores: autores, editoras: editoras, palavras: palavras, id_area: id_area, nome: nome, isbn: isbn,edicao: edicao, volume: volume} ,

            success: function(data){
                if (data == false){
                    alert("Este ISBN já existe no nosso banco de dados.");
                }else{
                    esconderAlertas();
                    limparCampos();
                    $('#alert-sucesso-cadastro').show();
                }

            }
        });
        
    
    });
}

function limparCampos(){
    $("#nome").val("");
    $("#isbn").val("");     
    $("#edicao").val("");    
    $("#volume").val("");

}


function carregarSelects(){
    getAutores();
    getEditoras();
    getPalavras();
    getAreas();
}

function getAutores(){
    $.ajax({
        url: '../php/get_autores_select.php',
        method: 'post',
        data: {},
        success: function(data){
            $('#select-autor').html(data);
                
        }
    });
}

function getEditoras(){
    $.ajax({
        url: '../php/get_editoras_select.php',
        method: 'post',
        data: {},
        success: function(data){
            $('#select-editora').html(data);
        }
    });
}
function getPalavras(){
    $.ajax({
        url: '../php/get_palavras.php',
        method: 'post',
        data: {},
        success: function(data){
            $('#select-palavra').html(data);       
        }
    });
}
function getAreas(){
    $.ajax({
        url: '../php/get_areas.php',
        method: 'post',
        data: {},
        success: function(data){
            $('#select-area').html(data);
                
        }
    });
}

function validarCampos(){
    var validacao = true;
    var validacaoSelect = true;    
    if($('#nome').val().trim() ==""){
        $('#alert-nome').show();
        validacao =  false;
    }

    if($('#isbn').val().trim() ==""){
        $('#alert-isbn').show();
        validacao = false;
    }

    if($('#edicao').val().trim() ==""){
        $('#alert-edicao').show();
        validacao = false;
    }

    if($('#volume').val().trim() ==""){
        $('#alert-volume').show();
        validacao = false;
    }
    if(!$('#select-autor').val()){
        validacao = false;
        validacaoSelect = false;
    }
    if(!$('#select-editora').val()){
        validacao = false;
        validacaoSelect = false;
    }
    if(!$('#select-palavra').val()){
        validacao = false;
        validacaoSelect = false;
    }
    if($('#select-area').val()==""){
        validacao = false;
        validacaoSelect = false;
    }
    if(!validacaoSelect){
        alert("Selecione uma opção");
    }
   
    return validacao;
}

function esconderAlertas(){
    $('#alert-nome').hide();
    $('#alert-isbn').hide();
    $('#alert-sucesso-cadastro').hide();
    $('#select-autor').selectpicker('deselectAll');
    $('#select-editora').selectpicker('deselectAll');
    $('#select-palavra').selectpicker('deselectAll');
    $('#alert-edicao').hide();
    $('#alert-volume').hide();
    

   



}
function emprestarLivro(){
            $('.emprestar').click(function(){
                if($('#pega').val() ==''){
                    alert('Preencha todos os campos de data.');
            return false;
          }
           if($('#devolve').val() ==''){
            alert('Preencha todos os campos de data.');
            return false;
          }
                var pega = $('#pega').val();
                var devolve = $('#devolve').val();
                var id = $(this).data('id_aluno');
               $.ajax({
                    url: '../php/emprestarLivro.php',
                    method: 'post',
                    data: {id:id,pega:pega,devolve:devolve},
                    success: function(data){
                        listarEmprestados();
                
                }
          });
                
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

function listarEmprestados() {
    $.ajax({
        url: '../php/listarEmprestados.php',
        method: 'post',
        data: {},
        success: function(data){
            $('#LivrosEmprestados').html(data);

                
        }
    });
}