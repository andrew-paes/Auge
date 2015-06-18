$(document).ready(function(){
        
    $('.refresh').live('click',function(){
        
        var foto_id  = $(this).attr('id') ;
        var foto_info = $("#i_"+foto_id).val();
	
        $.post('public/functions-produto.php?action=updateFotoName',
        {
            foto_info:foto_info,
            foto_id:foto_id
        },
        function(data){
            notify('Legenda Atualizada');
        })
        
    })
    /*
    $('.modal-confirm').live('click',function(){

        new PNotify({
                title: 'Success!',
                text: 'Modal Confirm Message.',
                type: 'success'
        });
    });
    */
   
   $('.btnSalvarLegenda').live('click',function(e){
        var id = $(this).attr("data-id");   
        var legenda = $('#legenda-input').val();
        var nomeClasse = $(this).attr("data-nome-classe");
        var foto_album = $(this).attr("data-id-album");   
       
        $.ajax({
            type: "POST",
            data: {
                id:id,
                legenda:legenda,
                nomeClasse:nomeClasse,
                foto_album: foto_album
            },
            url: "../public/functions-galeria.php?action=updateLegenda",
            dataType: "html",
            success: function(result){
                $('.legenda[data-id='+id+']').html(legenda);
                //e.preventDefault();
                //$.magnificPopup.close();
                
                var stack_bar_bottom = {"dir1": "up", "dir2": "right", "spacing1": 0, "spacing2": 0};
                new PNotify({                
                    title: 'Successo!',
                    text: 'Capa alterada com sucesso.',
                    type: 'success',
                    addclass: 'stack-bar-bottom',
                    stack: stack_bar_bottom,
                    width: "70%"
                });
                $(".modal-dismiss").click();
                e.stopImmediatePropagation();
            }
        });
        return false;   
       /* 
       $.post('../public/functions-galeria.php?action=updateLegenda',
        {
            id:id,
            legenda:legenda,
            nomeClasse:nomeClasse,
            foto_album: foto_album
        },
        function(data){
            // mensagem de sucesso
            $('.legenda[data-id='+id+']').html(legenda);
            $('.modal-dismiss').click();
            new PNotify({
                title: 'Success!',
                text: 'Modal Confirm Message.',
                type: 'success'
            });
        });    
        */
    });
    
    /*PRINCIPAL GALERIA*/
    $('.cover').live('click',function(){
        var foto_id = $(this).attr('data-id');
        var nomeClasse = $(this).attr("data-nome-classe");
        var indice = $(this).attr("data-indice");
        var foto_album = $(this).attr("data-id-album");    
        
        $('.cover').removeAttr("checked");
        $.post('../public/functions-galeria.php?action=updateCapa',
        {
            nomeClasse:nomeClasse,
            indice:indice,
            foto_id:foto_id,
            foto_album: foto_album
        },
        function(data){
            // mensagem de sucesso
            $('.cover[data-id='+foto_id+']').attr("checked","checked");
            
            var stack_bar_bottom = {"dir1": "up", "dir2": "right", "spacing1": 0, "spacing2": 0};
            new PNotify({                
                title: 'Successo!',
                text: 'Capa alterada com sucesso.',
                type: 'success',
                addclass: 'stack-bar-bottom',
                stack: stack_bar_bottom,
                width: "70%"
            });
        });
    });       
    
    /*ORDEM GALERIA*/
    $( ".sortable" ).sortable({
        cursor: 'crosshair',
        helper: "clone",
        opacity: 0.6,
        update:function(event, ui){
            var order = $(this).sortable('serialize')
            var nomeClasse = $(this).attr("data-nome-classe");
            var url = "../public/functions-galeria.php?action=updatePosicao"
            $.post(url,{
                item: order,
                nomeClasse: nomeClasse
            },function(data){
                new PNotify({
                    title: 'Successo!',
                    text: 'Ordem atualizada.',
                    type: 'success'
                });
            });
        }
    });
});
