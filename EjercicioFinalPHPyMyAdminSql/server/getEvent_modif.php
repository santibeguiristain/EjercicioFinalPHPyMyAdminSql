<?php
  
  session_start();
  require('./conector.php');
   
  $con = new ConectorBD('localhost','root1','12345');

  $response['conexion'] = $con->initConexion('calendario_db');
  $data = array();
   
  if ($response['conexion']=='OK') {
      $condicion = "id_evento= '". $_POST['id_evento'];
      $resultado_consulta = $con->obtenerEvento($condicion);
 
    if ($resultado_consulta->num_rows != 0) {
        $f=0;
        while($fila=$resultado_consulta->fetch_assoc()){
            $userData['id'] = $fila['id_evento'];
            $userData['title'] = $fila['title'];
            $userData['start'] = $fila['start'] ;
            $fecha =$fila['start'];
            $userData['startHora'] = $fila['start'] ." " .$fila['hora_inicio'];
           // $userData['hora_inicio'] = $fila['hora_inicio'];
            $userData['end'] = $fila['end'];
            //$userData['end'] = $fila['end'] . " " .$fila['hora_fin'];
            /*$userData['allDay'] = $fila['allDay'];
            $userData['correo_electronico'] = $fila['correo_electronico'];
            $userData['hora_fin'] = $fila['hora_fin'];*/
            $data['result'][$f] = $userData;
            $f++;
        }
        $data['msg'] = 'OK';    
    }else{ 
        $data['msg'] = 'false';
    }
  }
  
    echo json_encode($data);
    $con->cerrarConexion();
 
 ?>

 