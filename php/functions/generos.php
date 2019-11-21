<?php
    require './cn.php';    

    $consulta = "
    Select count(genero) tot
	From usuarios
	Where genero = '1'
    ";

    $hombres = ($mysqli->query($consulta))->fetch_assoc();

    $consulta = "
    Select count(genero) tot
	From usuarios
	Where genero = '0'
    ";

    $mujeres = ($mysqli->query($consulta))->fetch_assoc();

    $data = array(
        0 => $hombres['tot'],
        1 => $mujeres['tot']
    );

    echo json_encode($data);
?>