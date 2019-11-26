<?php

    $sevidor = "127.0.0.1";
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


    function validarExistenciaImagen($imagen,$conexion){
        $sql = "SELECT * FROM postales WHERE img = '$imagen'";
        $respuesta = mysqli_query($conexion,$sql);
        $longitug = mysqli_num_rows($respuesta);

        if($longitug >= 1){
            return $longitug;
        }
        else{
            return 0;
        }
    }

    //funcion para dar de baja

    function eliminarUsuario($correo,$conexion){

        if(validarExistencia($correo,$conexion)){
            $sql = "DELETE FROM usuarios WHERE correo = '$correo'";
            mysqli_query($conexion,$sql);
            return 1;
        }
        else{

            return 0;

        }
        
    }

    function eliminarImagen($imagen,$conexion){

        if(validarExistenciaImagen($imagen,$conexion)){
            $sql = "DELETE FROM postales WHERE img ='$imagen'";
            mysqli_query($conexion,$sql);
            return 1;
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
    function get_postales_env($correo,$conexion,$offset){
        $envios=array();
        $resultado = mysqli_query($conexion,"select count(*) from envios");
        $limite=mysqli_fetch_assoc($resultado)["count(*)"];
        $sql = "SELECT usr.correo,date(env.fecha_hora) as 'fecha',cat.nombre,post.img from usuarios usr,".
        "envios env,categorias cat,postales post where env.id_remitente=".
        "(select id_usuario from usuarios where correo='".$correo."')".
        "and usr.id_usuario=env.id_destinatario and env.id_postal=post.id_postal and ". 
        "post.id_categoria=cat.id_categoria order by fecha  LIMIT ".$limite." OFFSET ".$offset.";";
        $resultado = mysqli_query($conexion,$sql);
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $envio=new stdClass;
            $envio->destinatario =$fila["correo"];
            $envio->fecha=cumple($fila["fecha"]);
            $envio->postal="./../../postales/".$fila["nombre"]."/".$fila["img"];
            array_push($envios,$envio);
        }
        return $envios;
    }
    function get_postales_rec($correo,$conexion,$offset){
        $recibos=array();
        $resultado = mysqli_query($conexion,"select count(*) from envios");
        $limite=mysqli_fetch_assoc($resultado)["count(*)"];
        $sql = "SELECT usr.correo,date(env.fecha_hora) as 'fecha',cat.nombre,post.img from usuarios usr,".
        "envios env,categorias cat,postales post where env.id_destinatario=".
        "(select id_usuario from usuarios where correo='".$correo."')".
        "and usr.id_usuario=env.id_remitente and env.id_postal=post.id_postal and ". 
        "post.id_categoria=cat.id_categoria order by fecha LIMIT ".$limite." OFFSET ".$offset.";";
        $resultado = mysqli_query($conexion,$sql);
        
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $recibo=new stdClass;
            $recibo->remitente =$fila["correo"];
            $recibo->fecha=cumple($fila["fecha"]);
            $recibo->postal="./../../postales/".$fila["nombre"]."/".$fila["img"];
            array_push($recibos,$recibo);
        }
        return $recibos;
    }
    function get_postales($conexion,$categoria,$offset,$limite){
        $postales=array();
        if($categoria="todas"){
            $sql="select img,nombre from postales post,categorias cat where ".
             "cat.id_categoria=post.id_categoria order by id_postal desc limit ".$limite." offset ".$offset.";";            
        }
        else{
            $sql="select img,nombre from postales post,categorias cat where ".
             "cat.id_categoria=post.id_categoria and cat.nombre='".$categoria."' order by id_postal desc limit ".$limite." offset ".$offset.";";  
        }
        //echo $sql;
        $resultado = mysqli_query($conexion,$sql);
        while ($fila = mysqli_fetch_assoc($resultado)) {
            
            $cadena="./postales/".$fila["nombre"]."/".$fila["img"];
            
            array_push($postales,$cadena);
        }
        return $postales;
    }

    
?>
