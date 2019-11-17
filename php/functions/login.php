<?php
session_start();
include("conexion.php");



$correo = $_POST["usuario"];
$contrasena = md5($_POST["contrasena"]);


$respAX = array();

$result = validarLogeo($correo,$contrasena,$conexion);



if($result == "Error"){

    $respAX["resp"] = 0;
    echo json_encode($respAX);
    
    
}

else{

    $respAX["resp"] = $result;
    $_SESSION['usuario'] = $correo;
    $_SESSION['conexion']=$conexion;
    echo json_encode($respAX);
}


?>