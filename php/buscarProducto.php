<?php
  require_once('conexionBD.php');
  conectar();
  $nombreprod = '';
  
  if(isset($_POST['nombreprod'])){
      $nombreprod= $_POST['nombreprod'];
  }
  $data = array();
  $consulta = @mysql_query("SELECT * FROM producto WHERE nombre LIKE '%".$nombreprod."%' ");
  $fila = mysql_fetch_assoc($consulta); 
//$array = mysql_fetch_array($consulta);
  $total = mysql_num_rows($consulta);
 ?>
<?php if($total>0 && $nombreprod!='') {?>
    <?php do{?>
        <?php $data[] = $fila;
             //echo $array['nombre']; ?> 
    <?php } while($fila = mysql_fetch_assoc($consulta)); ?>
<?php 
        echo json_encode($data);
    } ?>