$(function(){
    $('#nombreprod').focus();
    
    
    $("button#buscar").click(function (){
        var envio = $('#nombreprod').val();
        $('#formulario').submit(function(e){
       e.preventDefault(); 
    } )
        $.ajax({
            type: 'POST',
            url: 'php/buscarProducto.php',
            data: ('nombreprod='+envio),
            success: function(resp){
                if(resp!=""){
                   var objData = jQuery.parseJSON(resp);
                    $("#stockmin").val(objData[0].stockLimite);
                    $("#stock").val(objData[0].stock);
                    $("#unidadmedida").val(objData[0].unidadMedida);
                    $("#tiempovida").val(objData[0].tiempoDeVida);
                    $("#ingrediente").val(objData[0].ingrediente);
                    $("#proveedor").val(objData[0].proveedor_idProveedor);
                    $("#categoria").val(objData[0].categoriaproducto_idCategoriaProducto);
                    $("#descripcion").val(objData[0].descripcion);
                    formulario.nombreprod.disabled = true;
                    formulario.stockmin.disabled = true;
                    formulario.unidadmedida.disabled = true;
                    formulario.tiempovida.disabled = true;
                    formulario.ingrediente.disabled = true;
                    formulario.proveedor.disabled = true;
                    formulario.categoria.disabled = true;
                    formulario.descripcion.disabled = true;             
                    
                }
            }
        })

        
    })

})