$(document).ready(function(){

$("#gerencia").change(function(){

    var acao = $(this).val();
    
    $.ajax({
        type: '',
        data: {acao : acao},
        url: 'action.php',
        method: 'POST'
    }).done(function(result){
        $("#tabela").html(result);
    });
});

$(".deletar").click(function(){

    var id = $(this).data('id');
    var acao = $(this).data('tabela');
    var acao2 = $(this).data('acao2');
    
    $.ajax({
        type: '',
        data: {
            id: id,
            acao:acao
        },
        url: 'action.php',
        method: 'POST'
    }).done(function(){
        $.ajax({
            type: '',
            data: {acao : acao2},
            url: 'action.php',
            method: 'POST'
        }).done(function(result){
            $("#tabela").html(result);
            
        });
    })

});

});