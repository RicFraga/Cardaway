<?php
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
function anti_parser($cad){
    $meses=array("Enero","Febrero","Marzo","Abril","Mayo","Junio",
    "Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
    sscanf($cad,"%d-%d-%d",$y,$m,$d);
    $aux=sprintf  ("%s %02d , %s %d",zeller($y,$m,$d),$d,$meses[$m-1],$y);
    return $aux;


}
function zeller($y,$m,$d){
	 $constantes=array(0,3,2,5,0,3,5,1,4,6,2,4);
	 $dias=array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado");
	 if($m<3){
	 	$y=$y-1;
	 }
	 $w=($y+$y/4-$y/100+$y/400+$constantes[$m-1]+$d)% 7;
	 return $dias[$w];
}
function cumple($cad){
    sscanf($cad,"%d-%d-%d",$y,$m,$d);
    $aux=sprintf("%02d/%02d/%d",$d,$m,$y);
    return $aux;
}
function genero($boole){
    if($boole){
        return "Hombre";
    }
    else{
        return "Mujer";
    }
}
?>