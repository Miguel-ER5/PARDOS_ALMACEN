$(function(){
    $('#razonSocial').focus();
    
    
    $("button#buscar").click(function (){
        var envio = $('#razonSocial').val();
        $('#formulario').submit(function(e){
       e.preventDefault(); 
    } )
        $.ajax({
            type: 'POST',
            url: 'php/buscarProveedor.php',
            data: ('razonSocial='+envio),
            success: function(resp){
                if(resp!=""){
                   var objData = jQuery.parseJSON(resp);
                    $("#ruc").val(objData[0].ruc);
                    $("#telefono").val(objData[0].telefono);
                    $("#direccion").val(objData[0].direccion);
                    $("#rubro").val(objData[0].rubro);
                    formulario.ruc.disabled = true;
                    formulario.telefono.disabled = true;
                    formulario.direccion.disabled = true;
                    formulario.rubro.disabled = true;
                    
                }
            }
        })

        
    })

})