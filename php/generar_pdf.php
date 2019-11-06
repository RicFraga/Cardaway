<?php
require 'fpdf/fpdf.php';
require 'cn.php';

class PDF extends FPDF
{
	// Page header
	function Header()
	{
	    // Logo
	    $this->Image('postal.jpg',10,6,30);
	    $this->Image('comp.png',170,6,30);
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


$pdf->Cell(10, 30, "", 0, 1, 'C', 0);



$pdf->Output();
?>
