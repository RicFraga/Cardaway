<?php

include("conexion.php");

$nombre =$_POST["nombre"];
$primer_ap = $_POST["primer_ap"];
$segundo_ap = $_POST["segundo_ap"];
$genero = $_POST["group1"];
$contrasena = md5($_POST["contrasena"]);
$correo = $_POST["correo"];
$fecha = date(parser($_POST["date"]));

$respAX = array();


$estado = validarExistencia($correo,$conexion);

if($estado != 1){
    //retorna 1 --> el usuario no esta en la base y ya fue registrado

    registrarUsuario($nombre,$primer_ap,$segundo_ap,$correo,$fecha,$genero,$contrasena,$conexion);
    $respAX["msj"] = 1;
    echo json_encode($respAX);
    
}
else{
    //retorna 0 -- > el usuario está en la base, no se registró
    $respAX["msj"] = 0;
    echo json_encode($respAX);

}


function parser($cadena){
    $dia_let;
    $dia_num;
    $mes_let;
    $año_num;
    sscanf($cadena,"%s %s , %s %s",$dia_let,$dia_num,$mes_let,$año_num);
    $mes_num;
    switch ($mes_let) {
        case "Enero":
            $mes_num="01";
            break;
        case "Febrero":
            $mes_num="02";
            break;
        case "Marzo":
            $mes_num="03";
            break;
        case "Abril":
            $mes_num="04";
            break;
        case "Mayo":
            $mes_num="05";
            break;
        case "Junio":
            $mes_num="06";
            break;
        case "Julio":
            $mes_num="07";
            break;
        case "Agosto":
            $mes_num="08";
            break;
        case "Septiembre":
            $mes_num="09";
            break;
        case "Octubre":
            $mes_num="10";
            break;
        case "Noviembre":
            $mes_num="11";
            break;
        case "Diciembre":
            $mes_num="12";
            break;

    }
    return $año_num."-".$mes_num."-".$dia_num;
 
}


?>
