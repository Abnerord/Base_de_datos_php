<?php

    require('conexionBD.php');

    $con = new BaseDeDatos();

    if($con->initConexion()=='ok'){
        $data['email'] = 'abner@nextu.com';
        $data['nombre'] = 'abner';
        $data['apellido'] = 'rodriguez';
        $data['password'] = password_hash('123456', PASSWORD_BCRYPT);
        $data['fecha_nacimiento'] = "1992/09/06";
        $con->insertDatos("usuarios",$data);

        $data['email'] = 'rafa@nextu.com';
        $data['nombre'] = 'rafa';
        $data['apellido'] = 'rodriguez';
        $data['password'] = password_hash('123456', PASSWORD_BCRYPT);
        $data['fecha_nacimiento'] = "1988/12/13";
        $con->insertDatos("usuarios",$data);

        $data['email'] = 'edgar@nextu.com';
        $data['nombre'] = 'edgar';
        $data['apellido'] = 'rodriguez';
        $data['password'] = password_hash('123456', PASSWORD_BCRYPT);
        $data['fecha_nacimiento'] = "1984/05/19";
        $con->insertDatos("usuarios",$data);

        $con->cerrarConexion();

    }else{
        echo("se presento un error en la conexion");
    }



 ?>
