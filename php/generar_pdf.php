<?php
require 'fpdf/fpdf.php';
require 'cn.php';

class PDF extends FPDF
{
	// Page header
	function Header()
	{
	    // Logo
	    $this->Image('postal.jpg',20,15,30);
	    $this->Image('comp.png',150,15,30);
	    // Arial negrita 15
	    $this->SetFont('Arial','B',15);
	    // Move to the right
	    $this->Cell(80);
	    // Title
	    $this->Cell(30,18,'Reporte de postales',0,0,'C');
	    // Line break
	    $this->Ln(20);
	}

	// Page footer
	function Footer()
	{
	    // Position at 1.5 cm from bottom
	    $this->SetY(-15);
	    // Arial italic 8
	    $this->SetFont('Arial','I',8);
	    // Page number
	    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	}
}

// Creación del PDF

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);

// Postales más gustadas

$consulta = "
	Select img, count(envios.id_postal) tot
	From envios, postales
	Where envios.id_postal = postales.id_postal
	Group by img
	Order by tot Desc
	Limit 5
";

$resultado = $mysqli->query($consulta);

$pdf->Cell(10, 10, "", 0, 1, 'C', 0);

$pdf->SetX(30);
$pdf->Cell(50, 10, utf8_decode("Postales más gustadas"), 0, 1, 'C', 0);
$pdf->Cell(50, 10, "Nombre", 1, 0, 'C', 0);
$pdf->Cell(30, 10, utf8_decode("Envíos"), 1, 1, 'C', 0);

$pdf->SetFont('Arial','',10);
while($row = $resultado->fetch_assoc()) {
	$pdf->Cell(50, 10, $row['img'], 1, 0, 'C', 0);
	$pdf->Cell(30, 10, $row['tot'], 1, 1, 'C', 0);
}

$pdf->Cell(10, 10, "", 0, 1, 'C', 0);

// Categorías más gustadas

$consulta = "
	Select cat.nombre nom, count(cat.nombre) tot
	From envios env, categorias cat, postales post
	Where cat.id_categoria = post.id_categoria and post.id_postal=env.id_postal
	Group by cat.nombre
	Order by tot Desc
	Limit 5
	;
";


$resultado = $mysqli->query($consulta);
$pdf->SetFont('Arial','B',10);

$pdf->SetX(30);
$pdf->Cell(50, 10, utf8_decode("Categorias más gustadas"), 0, 1, 'C', 0);
$pdf->Cell(50, 10, "Nombre", 1, 0, 'C', 0);
$pdf->Cell(30, 10, utf8_decode("Envíos"), 1, 1, 'C', 0);

$pdf->SetFont('Arial','',10);
while($row = $resultado->fetch_assoc()) {
	$pdf->Cell(50, 10, $row['nom'], 1, 0, 'C', 0);
	$pdf->Cell(30, 10, $row['tot'], 1, 1, 'C', 0);
}

// Hombres

$consulta = "
	Select count(genero) tot
	From usuarios
	Where genero = '1'
";

$resultado = $mysqli->query($consulta);

$pdf->SetFont('Arial','B',10);
$pdf->SetXY(120, 39);
$pdf->Cell(50, 10, utf8_decode("Cantidad de usuarios de género masculino"), 0, 1, 'C', 0);

$x = 120;
$y = 39;

$pdf->SetFont('Arial','',10);
while($row = $resultado->fetch_assoc()) {
	$y = $y+10;
	$pdf->SetXY($x, $y);
	$pdf->Cell(50, 10, $row['tot'], 1, 0, 'C', 0);
}

$pdf->Cell(10, 10, "", 0, 1, 'C', 0);

// Mujeres

$consulta = "
	Select count(genero) tot
	From usuarios
	Where genero = '0'
";

$y = $y + 15;
$resultado = $mysqli->query($consulta);
$pdf->SetXY($x, $y);
$pdf->SetFont('Arial','B',10);

$pdf->Cell(50, 10, utf8_decode("Cantidad de usuarios de género femenino"), 0, 1, 'C', 0);

$pdf->SetXY($x, $y);
$pdf->SetFont('Arial','',10);
while($row = $resultado->fetch_assoc()) {
	$y = $y+10;
	$pdf->SetXY($x, $y);
	$pdf->Cell(50, 10, $row['tot'], 1, 0, 'C', 0);
}

$pdf->Cell(10, 10, "", 0, 1, 'C', 0);

// Edad de los usuarios

$consulta = "
	Select fecha_nac
	From usuarios
";

$y = $y + 15;
$resultado = $mysqli->query($consulta);
$pdf->SetXY($x, $y);
$pdf->SetFont('Arial','B',10);

$pdf->Cell(50, 10, utf8_decode("Edades de los usuarios"), 0, 1, 'C', 0);

$pdf->SetXY($x, $y);
$pdf->SetFont('Arial','',10);
while($row = $resultado->fetch_assoc()) {
	$y = $y+10;
	$pdf->SetXY($x, $y);
	$edad = busca_edad($row['fecha_nac']);
	$pdf->Cell(50, 10, $edad, 1, 0, 'C', 0);
}

$pdf->AddPage();

$pdf->Cell(10, 10, "", 0, 1, 'C', 0);


$pdf->Output();


function busca_edad($fecha_nacimiento){
	$dia=date("d");
	$mes=date("m");
	$ano=date("Y");


	$dianaz=date("d",strtotime($fecha_nacimiento));
	$mesnaz=date("m",strtotime($fecha_nacimiento));
	$anonaz=date("Y",strtotime($fecha_nacimiento));


	//si el mes es el mismo pero el día inferior aun no ha cumplido años, le quitaremos un año al actual

	if (($mesnaz == $mes) && ($dianaz > $dia)) {
		$ano=($ano-1); }

	//si el mes es superior al actual tampoco habrá cumplido años, por eso le quitamos un año al actual

		if ($mesnaz > $mes) {
			$ano=($ano-1);}

	 	//ya no habría mas condiciones, ahora simplemente restamos los años y mostramos el resultado como su edad

		$edad=($ano-$anonaz);


		return $edad;
	}
?>