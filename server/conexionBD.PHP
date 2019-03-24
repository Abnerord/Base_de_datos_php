<?php 



class BaseDeDatos {
   private $host = "localhost";
   private $user = "user_prueba";
   private $password = "12345";
   private $BD = "examen_next_u";

    private  $conexion;

    function initConexion(){
        $this->conexion = new mysqli($this->host, $this->user, $this->password, $this->BD);
        if ($this->conexion->connect_error){
            return "Error: ".$this->conexion->connect_error;
        }else{
            return "ok";
        }
    }

    function consultarUsuario ($email){
        $sql = "SELECT email, password FROM usuarios WHERE email ="."'".$email."';";
        $resultado = $this->query($sql);
        $array = mysqli_fetch_array($resultado);
        return $array;
    }

    function consultarEvento (){
        $sql = "SELECT id,titulo, fecha_inicio, hora_inicio, fecha_final, hora_final, dia_completo FROM eventos WHERE email ="."'".$_COOKIE['emailuser']."';";
        $resultado = $this->query($sql);
        $event;
        
        while($array = mysqli_fetch_array($resultado)){
            if(empty($event)){
                $event = "[".json_encode(array("id"=>$array["id"],"title"=>$array["titulo"], "start"=>$array["fecha_inicio"]." ".$array["hora_inicio"],"allDay"=>$array["dia_completo"] ,"end"=>$array["fecha_final"]." ".$array["hora_final"] ));
            }else{
                $event = $event.",".json_encode(array("id"=>$array["id"],"title"=>$array["titulo"], "start"=>$array["fecha_inicio"]." ".$array["hora_inicio"],"allDay"=>$array["dia_completo"] ,"end"=>$array["fecha_final"]." ".$array["hora_final"] ));
            }
        }

        if(!empty($event)){
            $event= $event."]";
        }

        return $event;
    }

    function insertDatos($tabla,$data){
        $sql = 'INSERT INTO '.$tabla.' (';
        $i = 1;
        
        foreach($data as $key => $value){
            $sql .= $key;
            if($i < count($data)){
                $sql .= ', ';
            }else{
                $sql .= ') ';
            }

            $i++;
        }

        $sql .= 'VALUES (';
        $i = 1;

        foreach($data as $key => $value){
            $sql .= "'".$value."'";
            if($i<count($data)){
                $sql .= ', ';
            }else{
                $sql .= ');';
            }            
            $i++;
        }

        return $this->query($sql);
    }

    function actualizar($data,$id){
        $sql = 'UPDATE eventos set ';
        $i = 1;
        
        foreach($data as $key => $value){
            $sql .= $key."='".$value."'";
            if($i < count($data)){
                $sql .= ', ';
            }else{
                $sql .= ' WHERE id='.$id.' ;';
            }

            $i++;
        }

        return $this->query($sql);
    }

    function eliminar($id){
        $sql = "DELETE from eventos where id=".$id;
        $this->query($sql);
    }

    function query($query){
        return $this->conexion->query($query);
    }

    function cerrarConexion(){
        $this->conexion->close();
    }


}
?>