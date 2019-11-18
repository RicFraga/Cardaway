<?php
	/* Recupero todos los valores del arreglo POST
    =============================================== */
    // $array = array(
    //     "nombre" => "bar",
    //     "usuario" => TRUE,
    // );
    	foreach($_POST as $nombre_campo => $valor){ 
			$asignacion = "\$".$nombre_campo."='".trim($valor)."';"; 
			eval($asignacion); 
        }
      #  echo $usuario;
	/* ============================================ */
?>