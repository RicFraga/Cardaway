<?php 
include("conexion.php");


$imagen = $_POST["imagen"];


$respAX = array();


if(eliminarImagen($imagen,$conexion)){

    $respAX['resp'] = 1;
    echo json_encode($respAX);
}

else{

    $respAX['resp'] = 0;
    echo json_encode($respAX);
}

