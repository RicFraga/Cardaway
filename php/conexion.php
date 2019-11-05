<?php

    $sevidor = "127.0.0.1";
    $usuarioBD = "root";
    $contrasenaBD = "root";
    $nombreBD = "web";
    $conexion = mysqli_connect($sevidor,$usuarioBD,$contrasenaBD,$nombreBD);

    mysqli_query($conexion,"SET NAMES 'utf8'");

    if(mysqli_connect_errno($conexion)){
        die("problemas con la conexion".mysqli_connect_error());
    }
    else{

        //echo "conexion exitosa";
        mysqli_query($conexion,"SET NAMES 'utf8");
    }

    
    //echo validarExistencia("Angel","Ramirez","Ponce",$conexion);

    //echo validarLogeo("felipe96@hotmail.com","1234",$conexion);

    function validarLogeo($correo,$contrasena,$conexion){

        $sql = "SELECT * FROM usuarios WHERE  correo = '$correo'";
        $respuesta = mysqli_query($conexion,$sql);

        $longitug = mysqli_num_rows($respuesta);

        if($longitug ==  1){

            $informarcion = mysqli_fetch_row($respuesta);

            return $informarcion[0];

        }

        else{

            return "Error";
        }



    }


    function validarExistencia($nombre,$primer_ap,$segundo_ap,$conexion){

        $sql = "SELECT * FROM usuarios WHERE nombre like '$nombre' AND primer_apellido like '%$primer_ap' OR segundo_apellido like '%$segundo_ap'" ;
        $respuesta = mysqli_query($conexion, $sql);
    
        $longitug = mysqli_num_rows($respuesta);

        if($longitug >= 1){

            return $longitug;

        }
        else{
            return 0;
        }
       

    }


    function registrarUsuario($nombre,$primer_ap,$segundo_ap,$correo,$fechaNa,$genero,$contrasena,$conexion){

       //preparamos la instruccion sql
        $stmt = mysqli_prepare($conexion,"INSERT INTO usuarios VALUES(?,?,?,?,?,?,?)");

        //asociamos variables a parametros de consulta

        mysqli_stmt_bind_param($stmt,'sssssds',$nombre,$primer_ap,$segundo_ap,$correo,$fechaNa,$genero,$contrasena);
        //ejecuatmos consulta

        mysqli_stmt_execute($stmt);

        //resultado de la consulta  ->> FUNCIONANDO!

        //$resul =  mysqli_stmt_affected_rows($stmt);


    }
    
    

    
     
       
      
      

        

        
       
        
        
       

    

?>
