<?php

include("conexion.php");
include("funcion(Catzin).php");



$nombre =$_POST["nombre"];
$primer_ap = $_POST["primer_ap"];
$segundo_ap = $_POST["segundo_ap"];
$genero = $_POST["group1"];
$contrasena = md5($_POST["contrasena"]);
$correo = $_POST["correo"];
$fecha = date(parser($_POST["date"]));

$respAX = array();


$estado = validarExistencia($nombre,$primer_ap,$segundo_ap,$conexion);

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



?>
