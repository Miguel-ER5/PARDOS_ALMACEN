<?php
  require_once('conexionBD.php');
  conectar();
  $razonSocial = '';
  
  if(isset($_POST['razonSocial'])){
      $razonSocial= $_POST['razonSocial'];
  }
  $data = array();
  $consulta = @mysql_query("SELECT * FROM proveedor WHERE razonSocial LIKE '%".$razonSocial."%' ");
  $fila = mysql_fetch_assoc($consulta); 
//$array = mysql_fetch_array($consulta);
  $total = mysql_num_rows($consulta);
 ?>
<?php if($total>0 && $razonSocial!='') {?>
    <?php do{?>
        <?php $data[] = $fila;
             //echo $array['nombre']; ?> 
    <?php } while($fila = mysql_fetch_assoc($consulta)); ?>
<?php 
        echo json_encode($data);
    } ?>
