<?php

    $sevidor = "localhost";
    $usuarioBD = "root";
    $contrasenaBD = "";//Movi esta linea para que todos tengamos la misma base att:Hadad Bautista
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

    
    //echo validarExistencia("ehecatzin96@hotmail.com",$conexion);

    //$contrasena = md5("qwerty");

    //echo validarLogeo("angelito_mix@gmail.com",$contrasena,$conexion);

    function validarLogeo($correo,$contrasena,$conexion){

        $sql = "SELECT * FROM usuarios WHERE  correo = '$correo' AND contrasena = '$contrasena'";
        $respuesta = mysqli_query($conexion,$sql);

        $longitug = mysqli_num_rows($respuesta);

        if($longitug ==  1){

            $informarcion = mysqli_fetch_row($respuesta);

            return $informarcion[1];

        }

        else{

            return "Error";
        }



    }


    function validarExistencia($correo,$conexion){

        $sql = "SELECT * FROM usuarios WHERE correo  = '$correo'";
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
        $stmt = mysqli_prepare($conexion,"INSERT INTO usuarios VALUES(?,?,?,?,?,?,?,?)");

        //asociamos variables a parametros de consulta
        $id=null;
        mysqli_stmt_bind_param($stmt,'dsssssds',$id,$nombre,$primer_ap,$segundo_ap,$correo,$fechaNa,$genero,$contrasena);
        //ejecuatmos consulta

        mysqli_stmt_execute($stmt);

        //resultado de la consulta  ->> FUNCIONANDO!

        //$resul =  mysqli_stmt_affected_rows($stmt);


    }
    
    

    
     
       
      
      

        

        
       
        
        
       

    

?>
