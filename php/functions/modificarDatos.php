<?php 
include("conexion.php");


$correo = $_POST["email"];


$respAX = array();


if(eliminarUsuario($correo,$conexion)){

    $respAX['resp'] = 1;
    echo json_encode($respAX);
}

else{

    $respAX['resp'] = 0;
    echo json_encode($respAX);
}



















?>