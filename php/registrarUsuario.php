<?php
session_start();
require_once('conexionBD.php');
conectar();
//Recibe 
$query= @mysql_query("INSERT INTO `almacenpardos`.`usuario`(`nombre`,`apellidos`,`dni`,`direccion`,`telefono`,`area`,`contrasena`) VALUES ('$_POST[nombre]','$_POST[apellidos]','$_POST[dni]','$_POST[direccion]','$_POST[telefono]','$_POST[area]','$_POST[contrasena]')");

if ($query == 1 )
  {
    mysql_close();?>
      <script language="javascript"> 
       confirm("Usuario Registrado");
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