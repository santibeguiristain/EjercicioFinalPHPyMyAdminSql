<?php
// Script -CREADOR DE USUARIOS - para ejecutar.
 
 session_start();
 require('./conector.php');
 $con = new ConectorBD('localhost','root1','12345');
 $response['conexion'] = $con->initConexion('calendario_db');

 
 if ($response['conexion']=='OK') {
     $passEncript = md5('pass1');
     $con->createUser('nombreUs1','us1@mail.com',$passEncript,'01/01/1991');
    
     $passEncript = md5('pass2');
     $con->createUser('nombreUs2','us2@mail.com',$passEncript,'02/02/1992');
    
     $passEncript = md5('pass3');
     $con->createUser('nombreUs3','us3@mail.com',$passEncript,'03/03/1993');
    
     
     $con->cerrarConexion();
  }
 ?> 



 ?>
