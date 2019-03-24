<?php
   require('conexionBD.php');
   
   $data['titulo'] = $_POST['titulo'];
   $data['fecha_inicio'] = $_POST['start_date'];
   $data['hora_inicio'] = $_POST['start_hour'];
   $data['fecha_final'] = $_POST['end_date'];
   $data['hora_final'] = $_POST['end_hour'];
   $data['dia_completo'] = $_POST['allDay'];
   $data['email'] = $_COOKIE['emailuser'];

   $con = new BaseDeDatos();
    $Retorno;
 
   if($con->initConexion()){
     
    $con->insertDatos('eventos',$data);
    $Retorno = json_encode(array("msg"=>"OK"));
   }else{
    $Retorno = json_encode(array("msg"=>"Error al registrar el evento"));
   }

   $con->cerrarConexion();
 
   echo $Retorno;
 ?>
