<?php
session_start();
include("conexion.php");

if(admin($_POST["usuario"],$_POST["contrasena"],$conexion) ){
    $respAX["resp"] = -1;
    $_SESSION['admin'] = "admin";
    echo json_encode($respAX);
}
else{

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
    echo json_encode($respAX);
}
}


?>