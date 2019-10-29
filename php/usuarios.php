<?php



$nombre = $_POST["nombre"];

$respAX = array();

$respAX["msj"] = $nombre;

echo json_encode($respAX);






?>
