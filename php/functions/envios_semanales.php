<?php
    require './cn.php';    

    $consulta = "
    SELECT COUNT(id_postal) AS r FROM envios
    WHERE fecha_hora >= curdate() -6 and fecha_hora <= curdate()+1
    AND DAYofweek(fecha_hora) = 2;
    ";
    $lunes = ($mysqli->query($consulta))->fetch_assoc();

    $consulta = "
    SELECT COUNT(id_postal) AS r FROM envios
    WHERE fecha_hora >= curdate() -6 and fecha_hora <= curdate()+1
    AND DAYofweek(fecha_hora) = 3;
    ";
    $martes = ($mysqli->query($consulta))->fetch_assoc();

    $consulta = "
    SELECT COUNT(id_postal) AS r FROM envios
    WHERE fecha_hora >= curdate()-6 and fecha_hora <= curdate()+1
    AND DAYofweek(fecha_hora) = 4;
    ";
    $miercoles = ($mysqli->query($consulta))->fetch_assoc();

    $consulta = "
    SELECT COUNT(id_postal) AS r FROM envios
    WHERE fecha_hora >= curdate() - 6 and fecha_hora <= curdate()+1
    AND DAYofweek(fecha_hora) = 5;
    ";
    $jueves = ($mysqli->query($consulta))->fetch_assoc();

    $consulta = "
    SELECT COUNT(id_postal) AS r FROM envios
    WHERE fecha_hora >= curdate() - 6 and fecha_hora <= curdate()+1
    AND DAYofweek(fecha_hora) = 6;
    ";
    $viernes = ($mysqli->query($consulta))->fetch_assoc();

    $consulta = "
    SELECT COUNT(id_postal) AS r FROM envios
    WHERE fecha_hora > curdate() - 6 and fecha_hora <= curdate()+1
    AND DAYofweek(fecha_hora) = 7;
    ";
    $sabado = ($mysqli->query($consulta))->fetch_assoc();

    $consulta = "
    SELECT COUNT(id_postal) AS r FROM envios
    WHERE fecha_hora >= curdate() - 6 and fecha_hora <= curdate()+1
    AND DAYofweek(fecha_hora) = 1;
    ";
    $domingo = ($mysqli->query($consulta))->fetch_assoc();

    $data = array(
        0 => $lunes['r'],
        1 => $martes['r'],
        2 => $miercoles['r'],
        3 => $jueves['r'],
        4 => $viernes['r'],
        5 => $sabado['r'],
        6 => $domingo['r']
    );

    echo json_encode($data);
?>
