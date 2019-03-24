<?php
require('conexionBD.php');
$id = $_POST['id'];

$con = new BaseDeDatos();
$Retorno;

if($con->initConexion()){
$con->eliminar($id); 

$Retorno = json_encode(array("msg"=>"OK"));
}else{
$Retorno = json_encode(array("msg"=>"Error al registrar el evento"));
}

$con->cerrarConexion();

echo $Retorno;


 ?>
