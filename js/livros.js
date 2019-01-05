$(document).ready(function(){
  loadSelects();
  esconderAlertas();
   
});

function loadSelects(){
    getAutores();
    getEditoras();
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

function validarCampos(){
    
}

function esconderAlertas(){
    $('#alert-isbn').hide();
    $('#alert-sucesso-cadastro').hide();
    $('#alert-edicao').hide();
    $('#alert-volume').hide();
}