<?php 
session_start();
require_once('/php/conexionBD.php');
conectar();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Control Requerimiento Tienda</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/templateFooter.css" rel="stylesheet">
        <link href="css/template.css" rel="stylesheet">
        <link href="css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
        <script type="text/javascript" src="/js/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="/js/ajaxReqTienda.js"></script>
        
    </head>
    <?php
    if (empty($_SESSION['logged'])) {
       header("Location:errorIniciarSesion.html");
    } else {
        ?>
        <body>

            <div id="wrapper">

                <div id="header">
                    <!-- Fixed navbar -->
                    <div class="navbar navbar-inverse navbar-fixed-top">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                  <span class="sr-only">Toggle navigation</span>
                                  <span class="icon-bar"></span>
                                  <span class="icon-bar"></span>
                                  <span class="icon-bar"></span>
                                </button>              
                                <a href="indexIntranet.php" class="navbar-brand" ><img src="img/logo.png" width="50" height="50px" style="position: relative;top: -14px"/></a>
                            </div>
                            <nav class="navbar-collapse collapse in" aria-expanded="false" style="height: 1px;">
                                <ul class="nav navbar-nav nav-bar-right">

                                    <li class="">
                                        <a href="indexMantenimiento.php">Mantenimiento</a>
                                    </li>
                                    <li active>
                                       <a href="indexControl.php">Control</a>
                                    </li>
                                    <li>
                                       <a href="indexReportes.php">Reportes</a> 
                                    </li>
                                    
                                </ul>
                                <ul class="nav navbar-nav navbar-right">
                                    <li style="right: 10px;">
                                        <a>Bienvenido: <?php echo $_SESSION['userid']; ?> </a>
                                    </li>
                                    <li>
                                        <a href="PHP/cerrarSesion.php">Cerrar Sesión</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div id="body">
                    <!-- Begin page content -->
                    <div class="container">
                        <!-- Example row of columns -->
                        <div class="row"  style="position: relative; top: 80px">
                            <div class="col-md-2">
                                <div class="list-group text-center" >
                                    <a href="control_ReqTienda.php" class="list-group-item active">Req. Tienda</a>
                                    <a href="#" class="list-group-item">Ingresos</a>
                                    <a href="#" class="list-group-item">Salida</a>
                                    <a href="#" class="list-group-item">Bajas</a>
                                </div>
                            </div>
                            

                            <div class="col-md-8"style="position: relative; left: 50px">
                                

                                <h2 class="text-center">Registro de Requerimiento Tienda</h2>
                                                                       
                                <br>
                                
                                <h4>Datos del Req. Tienda</h4>

                                
                                <form  action="" method="post" class="form-horizontal" role="form" name="formulario" id="formulario">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label  class="control-label">Proveedor *</label>
                                                <div class="col-sm-12">
                                                    <select class='form-control' name='proveedor' id='proveedor' onChange="chequearCombo()" required="" autofocus="">
                                                        <option value="0">Seleccione...</option> 
                                                         <?php 
                                                         
                                                   $sql="SELECT idProveedor,razonSocial FROM proveedor";
                                                   $query= mysql_query($sql);
                                                   if(!$query)
                                                       {
                                                        echo "fallo";
                                                       }
                                                   else 
                                                      {

                                                       while($row=  mysql_fetch_row($query))
                                                       {
                                                          echo "<option value='".$row[1]."'>".$row[1]."</option>";

                                                       }

                                                      }    
                                                   ?>
                                                    </select>
                                                    
                                                </div>
                                            </div> 

                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="usuario" class="control-label">Producto *</label>
                                                <div class="col-sm-12">
                                                <select class='form-control' name='producto' id='producto' required="">
                                                        <option value="">Seleccione...</option>     
                                                </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                        <div class="form-group">
                                                <label for="contraseña" class="control-label">Unidad de Medida *</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" name="unidad" id="unidad" placeholder="Unidad Medida..." disabled="true" required="">
                                                </div>
                                            </div>   
                                        
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email" class="control-label">Cantidad *</label>
                                                <div class="col-sm-12">
                                                    <input type="number" class="form-control" name="cantidad" id="cantidad" placeholder="Cantidad..." required="">
                                                </div>
                                            </div>

                                        </div>
                                    </div> 
                                    
                                       <div class="row" style="" style="" >
                                           <div class="col-md-4"></div>
                                        <div class="col-md-2">
                                            <div class="form-group">                                         
                                                <label for="agregar" class="control-label">&nbsp;</label>

                                                <div class="col-sm-12">

                                                    <button type="button" class="btn btn-primary form-control" value="Add Row" onclick="addRow('tablaDetalle')">
                                                        <span class="glyphicon glyphicon-plus-sign"></span> Agregar</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">                                         
                                                <label for="agregar" class="control-label">&nbsp;</label>

                                                <div class="col-sm-12">

                                                    <button type="button" class="btn btn-danger form-control" value="Delete Row" onclick="deleteRow('tablaDetalle')">
                                                        <span class="glyphicon glyphicon-minus-sign"></span> Quitar</button>
                                                </div>
                                            </div>
                                        </div>
                                           <div class="col-md-4"></div>
                                    </div> 
                                    <br>
                                    <h4 class="text">Detalle de Requerimiento Tienda</h4>
                                    <br>
                                       <div class="row">
                                        <div class="col-md-12">
                                            <div class="table table-responsive">
                                            <table class="table table-bordered" id="tablaDetalle">

                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Proveedor</th>
                                                        <th>Producto</th>
                                                        <th>Cantidad</th>
                                                        <th style="width:140px;">Unidad Medida</th>                                                        
                                                    </tr>
                                                </thead>
                                               
                                            </table>
                                        </div>
                                        </div>

                                    </div> 
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="contraseña" class="control-label">Observaciones</label>
                                                <div class="col-sm-12">
                                                    <textarea type="text" rows="4" class="form-control" name="observaciones" id="observaciones" placeholder="Escribir Observaciones..." >
                                                    </textarea>
                                                </div>
                                        </div>
                                     
                                    </div> 
                                    <br>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="limpiar" class="control-label sr-only">Limpiar</label>
                                                <div class="col-sm-12">
                                                    <button type="reset" class="btn btn-warning form-control" id="limpiar">
                                                        <span class="glyphicon glyphicon-refresh"></span> Limpiar</button>
                                                </div>
                                            </div>
                                        </div>
                                       <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="limpiar" class="control-label sr-only">Enviar</label>
                                                <div class="col-sm-12">
                                                    <button type="" class="btn btn-info form-control" id="enviar" onclick="confirm('Enviando Requerimiento al Proveedor');">
                                                        <span class="glyphicon glyphicon-envelope"></span> Enviar</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="guardar" class="control-label sr-only">Guardar</label>
                                                <div class="col-sm-12">
                                                    <button type="submit" class="btn btn-success form-control" name="guardar" id="guardar" >
                                                        <span class="glyphicon glyphicon-save"></span> Guardar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </form>




                            </div>


                            <div class="col-md-2" style="width: 150px ; right: 120px; top: 60px;">
                             
                                <input  type="text" class="form-control" name="fecha" id="fecha" value="<?php echo date("d-m-Y");?>" disabled="true">
                            
    </div>
    </div>
 </div> <!-- /container -->
    </div>

    <!--Footer-->
    <div id="footer">
        <div class="container">
            <p class="text-muted col-lg-9">&copy; PP Development Team.
            
        </div>
    </div>
    </div>
 <!-- JavaScript -->

    </body>
<?php } ?>

<script>
    function enviar(){
        confirm("Requerimiento Enviado al Proveedor");
    }   
    function chequearCombo() {
            jeje(formulario.proveedor.value);
            
      /*      if (formulario.proveedor.value == "1") {
                formulario.ruc.disabled = false;
                formulario.direccion.disabled = false;
             
            } else {
                formulario.ruc.disabled = true;
                formulario.ruc.value="";
                formulario.direccion.disabled = true;
                formulario.direccion.value="";

            }
        */    
        }
        
        function jeje(proveedor) {
            if (proveedor!=""){
             $(function(){
                            
                            $("select#proveedor").change(function (){
                                var envio = $('#proveedor').val();
                               
                               if(envio!="")
                               {
                            $.ajax({
                                type: 'POST',
                                url: '../php/obtenerProductos.php',
                                data: ('id='+envio),
                                success: function(resp){
                                    if(resp!=""){
                                       var objData = jQuery.parseJSON(resp);
                                       $('select#producto').empty();
                                       $.each(objData,function(i,obj){
                                           var option = new Option(obj.nombre, obj.nombre);
                                            $('select#producto').append($(option));
                                            
                                            $('#unidad').val(obj.unidadMedida);
                                            
                                       })
                                       //for(var i = 0; length > i ; i++) {
                                         //     var obj = objData[i];

                                           //var option = new Option(obj.nombre, obj.idProducto);
                                           // $('select#producto').append($(option));
                                            
                                          //$('#producto').append($('<option>', { 
                                          //  value: ,
                                          //  text :  
                                          //}));

                                        
                                    }
                                }
                            })}

                            } )
                        })

                    
          }
        }
        
  function addRow(tablaDetalle) {

            var table = document.getElementById(tablaDetalle);
            var proveedor = document.getElementById("proveedor").value;
            var producto = document.getElementById("producto").value;
            var unidad = document.getElementById("unidad").value;
            var cantidad = document.getElementById("cantidad").value;
            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);
                
            var cell1 = row.insertCell(0);
            var element1 = document.createElement("input");
            element1.type = "checkbox";
            element1.name = "chkbox[]";
            cell1.appendChild(element1);
            
            var cell2 = row.insertCell(1);
            var element2 = document.createElement("input");
            element2.type = "text";
            element2.name = "proveedor[]";
            element2.disabled = "true";
            element2.value = proveedor;
            cell2.appendChild(element2);


            var cell3 = row.insertCell(2);
            var element3 = document.createElement("input");
            element3.type = "text";
            element3.name = "producto[]";
            element3.disabled = "true";
            element3.value = producto;
            cell3.appendChild(element3);

            var cell4 = row.insertCell(3);
            var element4 = document.createElement("input");
            element4.type = "number";
            element4.name = "cantidad[]";
            element4.size = "5";
            element4.style = "width: 100px";
            element4.value = cantidad;
            cell4.appendChild(element4);

            var cell5 = row.insertCell(4);
            var element5 = document.createElement("input");
            element5.type = "text";
            element5.name = "unidad[]";
            element5.disabled = "true";
            element5.style = "width: 100px";
            element5.value = unidad;
            cell5.appendChild(element5);

        }

        function deleteRow(tableID) {
            try {
                var table = document.getElementById(tableID);
                var rowCount = table.rows.length;

                for (var i = 0; i < rowCount; i++) {
                    var row = table.rows[i];
                    var chkbox = row.cells[0].childNodes[0];
                    if (null != chkbox && true == chkbox.checked) {
                        table.deleteRow(i);
                        rowCount--;
                        i--;
                    }


                }
            } catch (e) {
                alert(e);
            }
        }
              
              
   
</script> 
</html>

