<?php
session_start();
require_once('conexionBD.php');
conectar();
$json = $_POST['info'];
$obj = json_decode($json);
$fecha = $_POST['date'];
$obs = $_POST['obs'];
print_r($obj);
echo $fecha;
echo $obs;

//Recibe 
//$query= @mysql_query("INSERT INTO `almacenpardos`.`usuario`(`nombre`,`apellidos`,`dni`,`direccion`,`telefono`,`area`,`contrasena`) VALUES ('$_POST[nombre]','$_POST[apellidos]','$_POST[dni]','$_POST[direccion]','$_POST[telefono]','$_POST[area]','$_POST[contrasena]')");

