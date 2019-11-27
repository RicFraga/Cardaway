<?php
    require './cn.php';    

    $consulta = "
    Select cat.nombre nom, count(cat.nombre) tot
    From envios env, categorias cat, postales post
    Where cat.id_categoria = post.id_categoria and post.id_postal=env.id_postal
    And fecha_hora > curdate() - 6 
    And fecha_hora <= curdate() +1
    Group by cat.nombre
    Order by tot Desc
    Limit 4
    ";
    
    $resultado = ($mysqli->query($consulta));
    $nom = array();
    $val = array();

    $data = array();

    while ($fila = $resultado->fetch_assoc()) {
        array_push($data, $fila['nom'], $fila['tot']);
    }

    echo json_encode($data);
?>