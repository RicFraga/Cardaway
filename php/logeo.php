<?php

include("conexion.php");


$correo = $_POST["usuario"];
$contrasena = $_POST["contrasena"];


$respAX = array();

$result = validarLogeo($correo,$contrasena,$conexion);



if($result == "Error"){

    $respAX["resp"] = 0;
    echo json_encode($respAX);
}

else{

    $respAX["resp"] = $result;
    echo json_encode($respAX);
}




?>