<?php

    //llamando campos

    $nombre=$_POST['nombre'];
    $correo=$_POST['correo'];
    $telefono=$_POST['telefono'];
    $msj=$_POST['msj'];

    //Datos para el correo

    $destinatario="investment.cto@gmail.com";
    $asunto="Contacto web";

    $carta="De: $nombre\n";
    $carta.="Correo: $correo\n";
    $carta.="Telefono: $telefono\n";
    $carta.="Mensaje: $msj\n";

    //Enviando mensaje

    mail($destinatario, $asunto, $carta);
    header('Location:msjEnvio.html');
    exit;

?>