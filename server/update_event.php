<?php
 
 require('conexionBD.php');
  $con = new BaseDeDatos();
  $id = $_POST['id'];
  $data['fecha_inicio'] = $_POST['start_date'];
  $data['hora_inicio'] = $_POST['start_hour'];
  $data['fecha_final'] = $_POST['end_date'];
  $hora['hora_final'] = $_POST['end_hour'];

  $Retorno;

  if($con->initConexion()){
    
   $con->actualizar($data,$id);  
    
    $Retorno = json_encode(array("msg"=>"OK"));
    }else{
    $Retorno = json_encode(array("msg"=>"Error al registrar el evento"));
  }

  $con->cerrarConexion();

  echo $Retorno;

 ?>
