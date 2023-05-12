<?php
// Include the libraries
require_once("libraries/fpdf/fpdf.php");
require_once("libraries/phpqrcode/qrlib.php");

// Create a QR Code and save it as a png image file named test.png
QRcode::png("12345678", "test.png");

// PDF stuff
$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B',14);

// Set cell width and height
$cellWidth = 50;
$cellHeight = 50;

// Column 1: Image
// $pdf->Cell($cellWidth, $cellHeight, $pdf->Image("test.png", $pdf->GetX(), $pdf->GetY(), $cellWidth - 2, $cellHeight - 2), 1, 0, 'C');

$pdf->Cell(130 ,5,'Receiver',0,0);
$pdf->Cell(130 ,5,'Sender',0,0);
$pdf->Cell(59 ,5,'',0,1);//end of line

$pdf->Cell(130 ,5,'Naveen Rajan',0,0);
$pdf->Cell(25 ,5,'Kaveena Ekanayake',0,0);
$pdf->Cell(34 ,5,'0812224081',0,1);//end of line

$pdf->Cell(130 ,5,'25/15 C, Pushpadana Mawatha, Kandy',0,0);
$pdf->Cell(25 ,5,'Invoice #',0,0);
$pdf->Cell(34 ,5,'[1234567]',0,1);//end of line

$pdf->Cell(130 ,5,'0812224081',0,0);
$pdf->Cell(25 ,5,'Customer ID',0,0);
$pdf->Cell(34 ,5,'[1234567]',0,1);//end of line

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line

//billing address
$pdf->Cell(100 ,5,'Bill to',0,1);//end of line

//add dummy cell at beginning of each line for indentation
$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,'[Name]',0,1);

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,'[Company Name]',0,1);

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,'[Address]',0,1);

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,'[Phone]',0,1);

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line



$pdf->Output();
?>
