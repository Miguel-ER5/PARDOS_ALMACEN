<?php
session_start();
require_once('conexionBD.php');
conectar();
//Recibe 
$query= @mysql_query("INSERT INTO `almacenpardos`.`proveedor`(`razonSocial`,`ruc`,`telefono`,`direccion`,`rubro`) VALUES('$_POST[razonSocial]','$_POST[ruc]','$_POST[telefono]','$_POST[direccion]','$_POST[rubro]')");

if ($query == 1 )
  {
    mysql_close();?>
      <script language="javascript"> 
       confirm("Proveedor Registrado");
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