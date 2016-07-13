<?php 
 session_start();
 unset($_SESSION['logged']);
 unset($_SESSION['userid']);
 session_destroy();
 header("Location:../login.html");
 exit;
?>