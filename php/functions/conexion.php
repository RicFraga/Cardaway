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
    function get_datos($conexion){
        $correo=$_SESSION["usuario"];
        $sql = "SELECT * FROM usuarios WHERE  correo = '$correo'  ";
        $resultado = mysqli_query($conexion,$sql);
        $fila = mysqli_fetch_assoc($resultado);
        $nombre= $fila["nombre"];
        $primer_ap=$fila["primer_apellido"];
        $segundo_ap=$fila["segundo_apellido"];
        $fecha_nac=$fila["fecha_nac"];
        $genero=$fila["genero"];
        $foto=get_foto($correo,$genero);
        return [$correo,$nombre,$primer_ap,$segundo_ap,$fecha_nac,$genero,$foto];
    }
    function get_foto($correo,$genero){
       if(file_exists("./../../usuarios/$correo.jpg")){
           return "./../../usuarios/$correo.jpg";
       }
       elseif(file_exists("./../../usuarios/$correo.png")){
        return "./../../usuarios/$correo.png";
       }
       elseif(file_exists("./../../usuarios/$correo.gif")){
        return "./../../usuarios/$correo.gif";
       }
       elseif($genero){
        return "./../../usuarios/default_h.jpg";
       }
       else{
        return "./../../usuarios/default_m.jpg"; 
       }
    }
    function actualizar_usuario($nombre,$primer_ap,$segundo_ap,$correo,
    $fechaNa,$genero,$contrasena,$correo_ant,$conexion){
        if($contrasena==""){
            $sql="Update usuarios Set correo='$correo', nombre='$nombre' ,".
            " primer_apellido='$primer_ap',  segundo_apellido='$segundo_ap', fecha_nac='$fechaNa'". 
            ", genero='$genero'  Where correo='$correo_ant';";
        }
        else{
            $sql="Update usuarios Set correo='$correo', nombre='$nombre' ,".
             " primer_apellido='$primer_ap',  segundo_apellido='$segundo_ap', fecha_nac='$fechaNa'". 
             ", genero='$genero' ,  contrasena='".md5($contrasena)."' Where correo='$correo_ant';";
        }
     
        //$sql = "SELECT * FROM usuarios WHERE correo  = '$correo'";
        $respuesta = mysqli_query($conexion, $sql);
        return $respuesta;
    }
    
?>
