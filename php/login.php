<?php

session_start();
require_once('conexionBD.php');
conectar();

function  verificar_login($user,$password)   {
    $sql = "SELECT dni,contrasena,nombre,area FROM usuario where dni='$user' AND contrasena='$password'";
    $rec = mysql_query($sql);
    $fila = mysql_fetch_row($rec);
    $pass = $fila[1];
    $us = $fila[0];
    $nom=$fila[2];
    $area=$fila[3];
    $_SESSION['userid'] = $nom ;
    if($pass == $password AND $us ==$user)
    {return $area;}
    else
    {return 0;}
}


if(!isset($_SESSION['userid']))
{
       if(verificar_login($_POST['usuario'],$_POST['contraseña']) == 'Administracion')
        {
           $_SESSION['logged']='yes'; 
           
            header("location:../indexIntranet.php");
        }
        else
        { session_destroy();
        ?>
             
                  <script language="javascript"> 
                     alert("Usuario y/o Contraseña Incorrecta");
                     document.location=('../login.html');
                   </script> 
       <?php
        }
  
}
?>