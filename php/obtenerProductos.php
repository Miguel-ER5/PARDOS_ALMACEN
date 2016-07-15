<?php
  require_once('conexionBD.php');
  conectar();
  $id_proveedor = '';
  
  if(isset($_POST['id'])){
      $id_proveedor= $_POST['id'];
  }
  $data = array();
  $consulta = mysql_query("SELECT nombre,razonSocial,unidadMedida FROM producto inner join proveedor on proveedor_idProveedor=idProveedor where razonSocial LIKE '%".$id_proveedor."%'");
  $fila = mysql_fetch_assoc($consulta); 
//$array = mysql_fetch_array($consulta);
  
 ?>
<?php if($id_proveedor!="") {?>
    <?php do{?>
        <?php $data[] = $fila;
             //echo $array['nombre']; ?> 
    <?php } while($fila = mysql_fetch_assoc($consulta) ); ?>
<?php 
        echo json_encode($data);
    } ?>
