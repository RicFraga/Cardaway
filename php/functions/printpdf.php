<?php

require "./../../fpdf/fpdf.php";

class PDF extends FPDF
{
	// Page header
	function Header()
	{
	    // Logo
	    $this->Image('./../../images/postal.jpg',20,15,30);
	    $this->Image('./../../images/comp.png',150,15,30);
	    // Arial negrita 15
	    $this->SetFont('Arial','B',15);
	    // Move to the right
	    $this->Cell(80);
	    // Title
	    $this->Cell(30,18,'CARDAWAY',0,0,'C');
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

//Creacion del pdf
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->SetXY(500,50);
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);

//Obtenemos los datos del formulario
$nombre=$_GET['nombre'];
$msj=$_GET['msj'];

//Imprimimos los datos en el pdf
$pdf->SetXY(80,30);
$pdf->Cell(50, 10,utf8_decode($nombre), 0, 1, 'C', 0);
$pdf->SetXY(30,50);
$pdf->MultiCell(150,5,utf8_decode($msj), 0,'C',0);
$pdf->Image('./../../postales/amor/gato_01.png',30,100,150,150,'PNG','Imagen');

//Pagina A4 es de 210,300

//Imprimir el pdf
$pdf->Output();

?>