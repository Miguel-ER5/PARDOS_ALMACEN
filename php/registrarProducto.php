<?php
session_start();
require_once('conexionBD.php');
conectar();
//Recibe 
$query= @mysql_query("INSERT INTO `almacenpardos`.`producto`(`nombre`,`stockLimite`,`stock`,`unidadMedida`,`tiempoDeVida`,`ingrediente`,`descripcion`) VALUES ('$_POST[nombreprod]','$_POST[stockmin]','$_POST[stock]','$_POST[unidadmedida]','$_POST[tiempovida]','$_POST[ingrediente]','$_POST[descripcion]')");

if ($query == 1 )
  {
    mysql_close();?>
      <script language="javascript"> 
       confirm("Producto Registrado");
       document.location=('../registroProducto.php');
      </script> 
 <?php
 }
else
  {
   
    ?>
      <script language="javascript"> 
       alert("Ingrese Correctamente los Datos");
       document.location=('../registroProducto.php');
      </script> 
       <?php
  }

?>