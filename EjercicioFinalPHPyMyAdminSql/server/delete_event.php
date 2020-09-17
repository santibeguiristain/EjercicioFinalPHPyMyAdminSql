<?php
  
 session_start();
 require('./conector.php');
 $con = new ConectorBD('localhost','root1','12345');
 $response['conexion'] = $con->initConexion('calendario_db');

 
 if ($response['conexion']=='OK') {
    
    $con->deleteEvent($_POST['id_evento']);
    $con->cerrarConexion();
  }
 ?>
