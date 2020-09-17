<?php
  
 session_start();
 require('./conector.php');
 $con = new ConectorBD('localhost','root1','12345');
 $response['conexion'] = $con->initConexion('calendario_db');

 
 /* Calculo fecha start nueva*/
   $fecha =$_POST['start_date'];
   $nDays = $_POST['diff_days'];  
   $nuevafecha = strtotime($fecha . ' '.$nDays.'days');
   $nuevafecha = date('Y-m-d',$nuevafecha);
   /*-------------------------------------*/
   
    
   //$diff = $fecha->diff($fecha_End);

   /* Calculo fecha end nueva*/
   $fecha_End =$_POST['end_date'];
   $end_date = strtotime($fecha_End . ' '.$nDays.'days'); //Agrego dias movidos
   $end_date = date('Y-m-d',$end_date); // Agrego 
   /*-------------------------------------*/
   
   print_r($end_date);
 if ($response['conexion']=='OK') {
     
    $con->updateEvent($_POST['id'],$nuevafecha,$end_date);
    $con->cerrarConexion();
 }
 ?>

