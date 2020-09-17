<?php
  
 session_start();
 require('./conector.php');
 $con = new ConectorBD('localhost','root1','12345');
 $response['conexion'] = $con->initConexion('calendario_db');

 
 if ($response['conexion']=='OK') {
    $con->addNewEvent($_POST['titulo'],$_POST['start_date'],$_POST['start_hour'],$_POST['end_date'],$_POST['allDay'], $_SESSION['usuarioLogueado'],$_POST['end_hour']);
   
    
    $con->cerrarConexion();
  }
 ?>


 
        



