<?php

  
  class ConectorBD
  {
    private $host;
    private $user;
    private $password;
    private $conexion;

    function __construct($host, $user, $password){
      $this->host = $host;
      $this->user = $user;
      $this->password = $password;
    }

    function initConexion($nombre_db){
      $this->conexion = new mysqli($this->host, $this->user, $this->password, $nombre_db);
      if ($this->conexion->connect_error) {
        return "Error:" . $this->conexion->connect_error;
      }else {
        return "OK";
      }
    }
  

    function cerrarConexion(){
      $this->conexion->close();
    }

      
    function getConexion(){
      return $this->conexion;
    }
    
     function ejecutarQuery($query){
      return $this->conexion->query($query);
    }
    
    function consultar($tablas,$condicion = ""){
      $sql = "SELECT * FROM ";
      
      if ($tablas == "") {
        $sql .= " Usuarios ";
      }else {
        $sql .= " ".$tablas. " ";
      }
      if ($condicion == "") {
        $sql .= " ;";
      }else {
        $sql .= $condicion." ;";
      }
      //print_r("sqlSentencia: ".$sql);  
      return $this->ejecutarQuery($sql);
    }
    
    
     
     function obtenerEvento($condicion= ""){
      $sql = "SELECT * FROM eventos ";
      $sql .= " where ". $condicion . "';";
       
      return $this->ejecutarQuery($sql);
    }
    
    
    function createUser($nombre_completo,$correo_electronico,$password,$fecha_nacimiento){
        
     $sql = "INSERT INTO usuarios (nombre_completo, correo_electronico, password, fecha_nacimiento)VALUES ('$nombre_completo','$correo_electronico','$password','$fecha_nacimiento')";

    if ($this->ejecutarQuery($sql) === TRUE) {
         $response['msg'] =  "OK";
     } 
     else {
        $response['msg'] = "Error: " . $sql;
     }
         print_r("result User: ". $response['msg']);
    }
  
       
    
    function addNewEvent($titulo,$start_date,$start_hour,$end_date,$allDay,$correo_electronico,$end_hour){
     $idEvento = 0; 
     if($allDay==true){ 
         $allDay="0";
     }else
         {$allDay ="1";}
       
     $sql = "INSERT INTO eventos (id_evento, title, start, hora_inicio, end, allDay, correo_electronico, hora_fin)VALUES ('$idEvento','$titulo','$start_date','$start_hour','$end_date','$allDay','$correo_electronico','$end_hour')";

    if ($this->ejecutarQuery($sql) === TRUE) {
         $response['msg']="OK";
     } 
     else {
        $response['msg'] = "Error: " . $sql;
     }
    }
  
      
   function deleteEvent($id_evento){
       $sql = "DELETE FROM eventos where id_evento = '$id_evento'";

        if ($this->ejecutarQuery($sql) === TRUE) {
             $response['msg'] =  "OK";
         } 
        else {
             $response['msg'] = "Error: " . $sql;
        }
    }
    
  
   function updateEvent($id_evento,$start_date,$end_date){
     
        $sql = "UPDATE eventos SET  start='$start_date', end='$end_date' where id_evento = '$id_evento'";
        if ($this->ejecutarQuery($sql) === TRUE) {
           $response['msg']="OK";
        }
        else{
            $response['msg'] = "Error: " . $sql;
        }
    }
    
 }
  
  
 ?>

 