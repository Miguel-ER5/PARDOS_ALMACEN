<?php
session_start();
require_once('conexionBD.php');
conectar();
//Recibe 
$query= @mysql_query("UPDATE `almacenpardos`.`usuario` SET `nombre` = '$_POST[nombre]',`apellidos` = '$_POST[apellidos]',`contrasena` = '$_POST[contrasena]',`direccion` = '$_POST[direccion]',`telefono` = '$_POST[telefono]',`area` = '$_POST[area]' WHERE `dni` = '$_POST[dni]'");

if ($query == 1 )
  {
    mysql_close();?>
      <script language="javascript"> 
       confirm("Usuario Modificado");
       document.location=('../registroUsuario.php');
      </script> 
 <?php
 }
else
  {
   
    ?>
      <script language="javascript"> 
       alert("Ingrese Correctamente los datos");
       document.location=('../registroUsuario.php');
      </script> 
       <?php
  }

?>