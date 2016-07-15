$(function(){
    $("button#guardar").click(function (){
       var data =[];
       var tabla = $("#tablaDetalle");
       var rowCount = $('#tablaDetalle tr').length;
       var fecha = $('#fecha').val();
       var observaciones = $('#observaciones').val();;
       $('#formulario').submit(function(e){
       e.preventDefault(); 
    } )
    
       tabla.each(function(){

           var proveedor = $('input[name="proveedor[]"]').val();
           var producto = $('input[name="producto[]"]').val();
           var cantidad = $('input[name="cantidad[]"]').val();
           var unidad = $('input[name="unidad[]"]').val();
           
           item ={};
           if(proveedor !=''){
               item["proveedor"] = proveedor;
               item["producto"] = producto;
               item["cantidad"] = cantidad;
               item["unidad"] = unidad;
               data.push(item);
               
           }
       
       });
       console.log(data);
       //var info = new FormData();
       var info = JSON.stringify(data);
       //info.append('data', ainfo);
       console.log(info);
       $.ajax({
           data: "info="+info+"&date="+fecha+"&obs="+observaciones,
           type: 'POST',
           url: '/php/registrarReqTienda.php',
           dataType: 'json',
           async: true,
           success: function(r){
               
           }
       });
   });   
  });    
       
       