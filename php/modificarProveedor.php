<?php
session_start();
require_once('conexionBD.php');
conectar();
//Recibe 
$query= @mysql_query("UPDATE `almacenpardos`.`proveedor` SET `razonSocial` = '$_POST[razonSocial]', `ruc` = '$_POST[ruc]', `telefono` = '$_POST[telefono]', `direccion` = '$_POST[direccion]', `rubro` = '$_POST[rubro]' WHERE `razonSocial` = '$_POST[razonSocial]'");

if ($query == 1 )
  {
    mysql_close();?>
      <script language="javascript"> 
       confirm("Proveedor Modificado");
       document.location=('../registroProveedor.php');
      </script> 
 <?php
 }
else
  {
   
    ?>
      <script language="javascript"> 
       alert("Ingrese Correctamente los datos");
       document.location=('../registroProveedor.php');
      </script> 
       <?php
  }

?>