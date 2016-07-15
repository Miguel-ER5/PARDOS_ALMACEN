<?php session_start(); ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registro Producto</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/templateFooter.css" rel="stylesheet">
        <link href="css/template.css" rel="stylesheet">
        <link href="css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
        <script type="text/javascript" src="/js/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="/js/ajaxCliente.js"></script>
        
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

                                    <li class="active">
                                        <a href="registroProducto.php">Mantenimiento</a>
                                    </li>
                                    <li>
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
                                    <a href="registroProveedor.php" class="list-group-item">Proveedores</a>
                                    <a href="registroCategoria.php" class="list-group-item">Categorias</a>
                                    <a href="registroProducto.php" class="list-group-item active">Productos</a>
                                    <a href="registroProdProducido.php" class="list-group-item">Productos Producidos</a>
                                    <a href="registroUsuario.php" class="list-group-item ">Usuarios</a>
                                </div>

                            </div>


                            <div class="col-md-8"style="position: relative; left: 50px">
                                <h2 class="text-center">Registro de Productos</h2>
                                <br>
                                <h4>Datos del Producto</h4>

                                
                                <form  action="/php/registrarProducto.php" method="post" class="form-horizontal" role="form" name="formulario" id="formulario">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label  class="control-label">Producto *</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="nombreprod" id="nombreprod" placeholder="Producto..." required="" style="width:300px; left:18px">
                                                        <span class="input-group-btn" style="left:-15px">
                                                            <button class="btn btn-default" name="buscar" id="buscar" type="button">Buscar</button>
                                                        </span>
                                                </div>
                                            </div> 

                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="usuario" class="control-label">Stock Mínimo *</label>
                                                <div class="col-sm-12">
                                                    <input type="number" class="form-control" name="stockmin" id="stockmin" placeholder="Stock Mínimo..." min="0" max="500" required="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email" class="control-label">Unidad de Medida *</label>
                                                <div class="col-sm-12">
                                                   <select class='form-control' name='unidadmedida' id='unidadmedida' required="">
                                                         <option value="">Seleccione...</option>
                                                         <option value="Litro">L</option>
                                                         <option value="Kilogramo">kg</option>
                                                         <option value="Gramo">g</option>
                                                         <option value="Unidad">unidad</option>                                                 
                                                   </select>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email" class="control-label">Tiempo de Vida *</label>
                                                <div class="col-sm-12">
                                                    <input type="number" class="form-control" name="tiempovida" id="tiempovida" placeholder="Días..." min="1" max="90" required="">
                                                </div>
                                            </div>

                                        </div>
                                    </div> 
                                    <br>
                                       <div class="row">
                                           <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email" class="control-label">¿Es Ingrediente? *</label>
                                                <div class="col-sm-12">
                                                   <select class='form-control' name='ingrediente' id='ingrediente' required="">
                                                         <option value="">Seleccione...</option>
                                                         <option value="Si">Sí</option>
                                                         <option value="No">No</option>                                                       
                                                   </select>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nombre" class="control-label">Proveedor *</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" name="proveedor" id="proveedor" placeholder="Proveedor..." required="">
                                                </div>
                                            </div>

                                        </div>

                                        
                                    </div> 
                                    <br>
                                       <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nombre" class="control-label">Categoría *</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" name="categoria" id="categoria" placeholder="Categoría..." required="">
                                                </div>
                                            </div>

                                        </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nombre" class="control-label">Descripción *</label>
                                                <div class="col-sm-12">
                                                    <textarea type="text" class="form-control" name="descripcion" id="descripcion"  placeholder="Agregue Descripción..." rows="3" cols="50">
                                                    </textarea>
                                                </div>
                                            </div>

                                        </div>
                                    </div> 
                                    <div class="row">
                                        <div hidden="" class="col-md-6">
                                            <div class="form-group">
                                                <label for="email" class="control-label">Stock *</label>
                                                <div class="col-sm-12">
                                                    <input type="number" class="form-control" name="stock" id="stock"  value="0" required="">
                                                </div>
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
                                                <label for="limpiar" class="control-label sr-only">Modificar</label>
                                                <div class="col-sm-12">
                                                    <button type="" class="btn btn-primary form-control" id="modificar" onclick="habilitarInput();">
                                                        <span class="glyphicon glyphicon-wrench"></span> Modificar</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="guardar" class="control-label sr-only">Guardar</label>
                                                <div class="col-sm-12">
                                                    <button type="submit" class="btn btn-success form-control" id="guardar" onclick="$('#formulario').unbind('submit').submit()">
                                                        <span class="glyphicon glyphicon-save"></span> Guardar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </form>




                            </div>


                            <div class="col-md-2">
                              
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

        
 function habilitarInput(){
     //formulario.dni.disabled = true;
     //formulario.buscar.disabled = true;
       formulario.nombreprod.disabled = false;
       formulario.stockmin.disabled = false;
       formulario.unidadmedida.disabled = false;
       formulario.tiempovida.disabled = false;
       formulario.ingrediente.disabled = false;
       formulario.proveedor.disabled = false;
       formulario.categoria.disabled = false;
       formulario.descripcion.disabled = false;
       document.formulario.action = "/php/modificarProducto.php";
       
      // document.getElementById("formulario").submit();
 }
                                                      
   </script> 
</html>

