<?php

  session_start();
  require('./conector.php');
  $con = new ConectorBD('localhost','root1','12345');

  $response['conexion'] = $con->initConexion('calendario_db');

  if ($response['conexion']=='OK') {
     $passEncript = md5($_POST['password']);
     $resultado_consulta = $con->consultar('usuarios', 'WHERE correo_electronico="'.$_POST['username'].'" AND password="'.$passEncript.'"');
        if ($resultado_consulta->num_rows != 0) {
          $response['acceso'] = 'concedido';
          $_SESSION['usuarioLogueado'] =$_POST['username'];
        }else{ 
            $response['acceso'] = 'rechazado';
        }
    }

   
  echo json_encode($response);

  $con->cerrarConexion();

 ?>