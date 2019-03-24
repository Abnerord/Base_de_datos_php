<?php
  require('conexionBD.php');
  $con = new BaseDeDatos();
  $Retorno;

  if($con->initConexion()){
    
    $lista = $con->consultarEvento();

  }else{
      $Retorno = "error en la base de datos";
  }
  $con->cerrarConexion();
  echo $lista;


 ?>
