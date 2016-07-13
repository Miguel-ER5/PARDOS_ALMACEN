$(function(){
    $('#dni').focus();
    
    
    $("button#buscar").click(function (){
        var envio = $('#dni').val();
        $('#formulario').submit(function(e){
       e.preventDefault(); 
    } )
        $.ajax({
            type: 'POST',
            url: 'php/buscarUsuario.php',
            data: ('dni='+envio),
            success: function(resp){
                if(resp!=""){
                   var objData = jQuery.parseJSON(resp);
                    $("#nombre").val(objData[0].nombre);
                    $("#apellidos").val(objData[0].apellidos);
                    $("#direccion").val(objData[0].direccion);
                    $("#telefono").val(objData[0].telefono);
                    $("#area").val(objData[0].area);
                    $("#contrasena").val(objData[0].contrasena);
                    formulario.nombre.disabled = true;
                    formulario.apellidos.disabled = true;
                    formulario.direccion.disabled = true;
                    formulario.telefono.disabled = true;
                    formulario.area.disabled = true;
                    formulario.contrasena.disabled = true;
                    
                }
            }
        })

        
    })

})