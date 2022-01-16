<?php
require('fpdf/fpdf.php');
date_default_timezone_set('America/El_Salvador');
class PDF extends FPDF
{
// Cabecera de página
//Numeros de paginas
//SetTextColor(255,255,255);es RGB extraer colores con GIMP
//SetFillColor()
//SetDrawColor()
//Line(derecha-izquierda, arriba-abajo,ancho,arriba-abajo)
//Color line setDrawColor(61,174,233)
//GetX() || GetY() posiciones en cm
//Grosor SetLineWidth(1)
// SetFont(tipo{COURIER, HELVETICA,ARIAL,TIMES,SYMBOL, ZAPDINGBATS}, estilo[normal,B,I ,A], tamaño)
// Cell(ancho , alto,texto,borde(0/1),salto(0/1),alineacion(L,C,R),rellenar(0/1)
//AddPage(orientacion[PORTRAIT, LANDSCAPE], tamño[A3.A4.A5.LETTER,LEGAL],rotacion)
//Image(ruta, poscisionx,pocisiony,alto,ancho,tipo,link)
//SetMargins(10,30,20,20) luego de addpage
  
function Header()
{
$this->Image('img/logo.png',-1,-1,85);
$this->Image('img/shinheky.png',150,15,25);

$this->SetY(40);
$this->SetX(145);
$this->SetFont('Arial','B',12);

$this->SetTextColor(246, 130, 14 );
$this->Cell(50, 8, 'Shingeki no Kyojin',0,1);
$this->SetY(45);
$this->SetX(147);
$this->SetFont('Arial','',8);
$this->Cell(40, 8, '1º E Villa Perales de Arriba');
$this->SetTextColor(30,10,32);
$this->Ln(30);

}

function Footer()
{
     $this->SetFont('helvetica', 'B', 8);
        $this->SetY(-15);
        $this->Cell(95,5,utf8_decode('Página ').$this->PageNo().' / {nb}',0,0,'L');
        $this->Cell(95,5,date('d/m/Y | g:i:a') ,00,1,'R');
        $this->Line(10,287,200,287);
        $this->Cell(0,5,utf8_decode("Kodo Sensei © Todos los derechos reservados."),0,0,"C");
        
}


}



$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetAutoPageBreak(true, 20);
$pdf->SetTopMargin(500);
$pdf->SetLeftMargin(10);
$pdf->SetRightMargin(10);
$pdf->SetX(15);
$pdf->SetFillColor(210,57,57);
$pdf->SetDrawColor(255, 255, 255);
// Cell(ancho , alto,texto,borde(0/1),salto(0/1),alineacion(L,C,R),rellenar(0/1)

$pdf->SetFont('Arial','B',10);
$pdf->Cell(12, 12, utf8_decode('N°'),1,0,'C',1);
$pdf->Cell(80, 12, utf8_decode('item descripción'),1,0,'C',1);
$pdf->Cell(30, 12, utf8_decode('Precio'),1,0,'C',1);
$pdf->Cell(30, 12, utf8_decode('Cantidad'),1,0,'C',1);
$pdf->Cell(30, 12, utf8_decode('Total'),1,1,'C',1);

$pdf->SetFont('Arial','',10);
for ($i = 0; $i <40 ; $i++) {
  $pdf->SetX(15);
$pdf->SetFillColor(255,255,255);
$pdf->SetDrawColor(65, 61, 61);
$pdf->Cell(12, 8, utf8_decode('1'),'B',0,'C',1);
$pdf->Cell(80, 8, utf8_decode('Titan Colosal'),'B',0,'C',1);
$pdf->Cell(30, 8, utf8_decode('$20.50'),'B',0,'C',1);
$pdf->Cell(30, 8, utf8_decode('4'),'B',0,'C',1);
$pdf->Cell(30, 8, utf8_decode('$82.00'),'B',1,'C',1);
$pdf->Ln(0.5);
}

$pdf->Output();
?>