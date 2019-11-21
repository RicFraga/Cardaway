<?php
    require './cn.php';    

    $consulta = "
    SELECT COUNT(id_postal) AS r FROM envios
    WHERE fecha_hora >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY
    AND fecha_hora < curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY
    AND DAY(fecha_hora) = 1;
    ";
    $lunes = ($mysqli->query($consulta))->fetch_assoc();

    $consulta = "
    SELECT COUNT(id_postal) AS r FROM envios
    WHERE fecha_hora >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY
    AND fecha_hora < curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY
    AND DAY(fecha_hora) = 2;
    ";
    $martes = ($mysqli->query($consulta))->fetch_assoc();

    $consulta = "
    SELECT COUNT(id_postal) AS r FROM envios
    WHERE fecha_hora >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY
    AND fecha_hora < curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY
    AND DAY(fecha_hora) = 3;
    ";
    $miercoles = ($mysqli->query($consulta))->fetch_assoc();

    $consulta = "
    SELECT COUNT(id_postal) AS r FROM envios
    WHERE fecha_hora >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY
    AND fecha_hora < curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY
    AND DAY(fecha_hora) = 4;
    ";
    $jueves = ($mysqli->query($consulta))->fetch_assoc();

    $consulta = "
    SELECT COUNT(id_postal) AS r FROM envios
    WHERE fecha_hora >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY
    AND fecha_hora < curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY
    AND DAY(fecha_hora) = 5;
    ";
    $viernes = ($mysqli->query($consulta))->fetch_assoc();

    $consulta = "
    SELECT COUNT(id_postal) AS r FROM envios
    WHERE fecha_hora >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY
    AND fecha_hora < curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY
    AND DAY(fecha_hora) = 6;
    ";
    $sabado = ($mysqli->query($consulta))->fetch_assoc();

    $consulta = "
    SELECT COUNT(id_postal) AS r FROM envios
    WHERE fecha_hora >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY
    AND fecha_hora < curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY
    AND DAY(fecha_hora) = 7;
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
