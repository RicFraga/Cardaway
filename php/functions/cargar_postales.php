<?php
   include("./parsers.php");
   include("./conexion.php");
   include("./get_Posts.php");
$myObj= new stdClass;

/*
$algo='./postales/Otros/girasol_01.jpg';
$arreglo=array();
array_push($arreglo,$algo);
array_push($arreglo,$algo);
array_push($arreglo,$algo);
array_push($arreglo,$algo);
array_push($arreglo,$algo);
array_push($arreglo,$algo);
$myObj->postales=$arreglo;
*/
$myObj->postales=get_postales($conexion,"todas",$offset,$limit);
$myJSON = json_encode($myObj);
echo $myJSON;
?>