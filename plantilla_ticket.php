<?php
require('fpdf/fpdf.php');
date_default_timezone_set('America/El_Salvador');

//podemos definir el ancho en una variable para que no les cueste cambiarlo despues
$ancho = 5;

//definimos la orientacion de la pagina y el array indica el tamaño de la hoja
$pdf=new FPDF('P','mm',array(80,150));
$pdf->AddPage(); 
$pdf->SetFont('Arial','B',8);   

$pdf->setY(5);
$pdf->setX(15);
$pdf->Cell(50,$ancho,"NOMBRE DE LA EMPRESA",'B',0,'C');
$pdf->Ln(6);
$pdf->SetFont('Arial','',7);   

$pdf->setX(5);
//              Encabezado
$pdf->Cell(10, 7, utf8_decode('Cant'),0,0,'C',0);
$pdf->Cell(25, 7, utf8_decode('Descripción'),0,0,'C',0);
$pdf->Cell(10, 7, utf8_decode('Precio'),0,0,'C',0);
$pdf->Cell(10, 7, utf8_decode('Total'),0,1,'C',0);

//              DATOS

for ($i=0; $i < 5; $i++) { 
$pdf->setX(5);
$pdf->Cell(10, 5, $i+1,0,0,'C',0);
$pdf->Cell(25, 5, utf8_decode('Figura de acción'),0,0,'C',0);
$pdf->Cell(10, 5, '$'.number_format('200'),0,0,'C',0);
$pdf->Cell(10, 5, '$'.number_format('100'),0,1,'C',0);
}

$pdf->Ln(5);
//              TOTAL
$pdf->setX(5);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(45,5,'TOTAL',0,0,'L',0);

$pdf->SetFont('Arial','',8);
$pdf->Cell(10,5,'$'.number_format('4000'));



$pdf->Ln(10);
$pdf->SetFont('Arial','B',8);
$pdf->setX(15);
$pdf->Cell(5,$ancho+6,utf8_decode('¡GRACIAS POR TU COMPRA!'));

$pdf->Output();
?>