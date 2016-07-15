<?php session_start(); ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/templateFooter.css" rel="stylesheet">
        <link href="css/template.css" rel="stylesheet">
        <link href="css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
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

                                    <li>
                                        <a href="registroUsuario.php">Mantenimiento</a>
                                    </li>
                                    <li>
                                        <a href="control_ReqTienda.php">Control</a>
                                    </li>
                                    <li>
                                       <a href="indexReportes.php">Reportes</a> 
                                    </li>
                                    
                                </ul>
                                <ul class="nav navbar-nav navbar-right">
                                    <li>
                                        <a href="PHP/cerrarSesion.php">Cerrar Sesión</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <br><br> 
                 <?php
    echo '<h1 style="font-weight:bold; text-align: center;">Bienvenido a la Intranet ' . $_SESSION['userid'] . '!</h1>';
    ?> <br> 
                <div id="body" style=" height: 550px ; background-image: url(img/valores-1219x576.jpg)">
                    <!-- Begin page content -->
                    <div class="container" >
                       <!-- Example row of columns -->
                     
                
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
 <script src="/js/jquery-1.10.2.min.js"></script>
 <script src="/js/bootstrap.min.js"></script>
    </body>
</html>
    <?php }?>