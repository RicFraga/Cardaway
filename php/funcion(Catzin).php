<?php 
//Cadena Ejemplo
//$cadena="Viernes 20 , Agosto  1999";
//echo parser($cadena);

function parser($cadena){
    $dia_let;
    $dia_num;
    $mes_let;
    $año_num;
    sscanf($cadena,"%s %s , %s %s",$dia_let,$dia_num,$mes_let,$año_num);
    $mes_num;
    switch ($mes_let) {
        case "Enero":
            $mes_num="01";
            break;
        case "Febrero":
            $mes_num="02";
            break;
        case "Marzo":
            $mes_num="03";
            break;
        case "Abril":
            $mes_num="04";
            break;
        case "Mayo":
            $mes_num="05";
            break;
        case "Junio":
            $mes_num="06";
            break;
        case "Julio":
            $mes_num="07";
            break;
        case "Agosto":
            $mes_num="08";
            break;
        case "Septiembre":
            $mes_num="09";
            break;
        case "Octubre":
            $mes_num="10";
            break;
        case "Noviembre":
            $mes_num="11";
            break;
        case "Diciembre":
            $mes_num="12";
            break;

    }
    return $año_num."-".$mes_num."-".$dia_num;
 
}
?>

