<?php
  require_once('conexionBD.php');
  conectar();
  $dni = '';
  
  if(isset($_POST['dni'])){
      $dni= $_POST['dni'];
  }
  $data = array();
  $consulta = @mysql_query("SELECT * FROM usuario WHERE dni LIKE '%".$dni."%' ");
  $fila = mysql_fetch_assoc($consulta); 
//$array = mysql_fetch_array($consulta);
  $total = mysql_num_rows($consulta);
 ?>
<?php if($total>0 && $dni!='') {?>
    <?php do{?>
        <?php $data[] = $fila;
             //echo $array['nombre']; ?> 
    <?php } while($fila = mysql_fetch_assoc($consulta)); ?>
<?php 
        echo json_encode($data);
    } ?>
