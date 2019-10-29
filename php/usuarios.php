<?php



$nombre = $_POST["nombre"]
$correo = $_POST["correo"];

$respAX = array();

$respAX["usuario"] = $nombre;
$respAX["email"] = $correo;

echo json_encode($respAX);



?>