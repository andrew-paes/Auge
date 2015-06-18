$(document).ready(function(){
    alert('aas'); 
    
    /*Sorter Foto*/
    $( ".sortable" ).sortable({
        cursor: 'crosshair',
        helper: "clone",
        opacity: 0.6,
        update:function(event, ui){
            var order = $(this).sortable('serialize')
            var url = "public/functions-produto.php?action=updateVideoPos"
            $.post(url,{
                item: order
            },function(data){
                var arr = Array;
                arr = ["Muito bom!", "Demais!", "Ficou legal!", "Super!", "Agora está bonito!","Contiue assim!"];
                msg  = arr[Math.floor(Math.random()*arr.length)];
                notify('Posição Atualizada');
            })
        }
    });
 
})