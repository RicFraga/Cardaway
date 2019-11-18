<?php
    include("./parsers.php");
    include("./conexion.php");
    
    $myObj= new stdClass;
    session_start();
    $correo=$_SESSION["usuario"];
    $envios=get_postales_env($correo,$conexion);
    $myObj->enviadas=$envios;

        //$envio=new stdClass;
        // $envio->destinatario ="hadad.bautista@gmail.com";
        // $envio->fecha="20/01/2006";
        // $envio->postal="./../../postales/Comida/limones_01.jpg";
        // array_push($envios,$envio);

        // $envio=new stdClass;
        // $envio->destinatario ="hadad.bautista@gmail.com";
        // $envio->fecha="19/04/2006";
        // $envio->postal="./../../postales/Comida/pina_01.jpg";
        // array_push($envios,$envio);
        
        // 
        $recibos=get_postales_rec($correo,$conexion);
        $myObj->recibidas=$recibos;
        
$myJSON = json_encode($myObj);

echo $myJSON;




?>