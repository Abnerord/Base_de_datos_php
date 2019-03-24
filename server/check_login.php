<?php
    require('conexionBD.php');
    $usuario = $_POST['username'];
    $pass = $_POST['password'];
   
    $con = new BaseDeDatos();
    
    
    if($con->initConexion()){
       $lista = $con->consultarUsuario($usuario);

       if ($lista == ""){
        $Retorno = "el usuario o contraseña son incorrectos";
       }else{
         $email = $lista['email'];
         setcookie('emailuser',$email);
         $password = password_verify($pass,$lista['password']);
         if ($email == $usuario && $password == 1){
             $Retorno = "OK";
         }else{
             $Retorno = "el usuario o contraseña son incorrectos";
         }
       }
       
    }else{
        $Retorno = "sucedio un error en la base de datos";
    }

    $con->cerrarConexion();
    echo json_encode(array("msg"=>$Retorno));

 ?>
