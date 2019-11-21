<?php
    require './cn.php';    

    $consulta = "
	Select img, count(envios.id_postal) tot
	From envios, postales
	Where envios.id_postal = postales.id_postal	
	Group by img
	Order by tot Desc
	Limit 4
    ";
    
    $resultado = ($mysqli->query($consulta));
    $nom = array();
    $val = array();

    $data = array();

    while ($fila = $resultado->fetch_assoc()) {
        array_push($data, $fila['img'], $fila['tot']);        
    }    

    echo json_encode($data);
?>
