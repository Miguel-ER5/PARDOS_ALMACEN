<?php 
// datos para la coneccion a mysql 
function conectar()
{
    $servidor='localhost';
    $user='root';
    $pass='mysql';
    $name='almacenpardos';
   $con= @mysql_connect($servidor,$user,$pass);
   @mysql_select_db($name, $con);
}


?>