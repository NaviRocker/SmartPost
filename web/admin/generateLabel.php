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
$cellWidth = 60;
$cellHeight = 60;

// Column 1: Image (QR Code)
$pdf->Cell($cellWidth, $cellHeight, $pdf->Image("test.png", $pdf->GetX(), $pdf->GetY(), $cellWidth, $cellHeight), 0, 0, 'C');

// Column 2: Sender
$pdf->MultiCell($cellWidth, 10, 'Sender', 0, 'C');
$pdf->MultiCell($cellWidth, 10, '', 0, 'C');
$pdf->MultiCell($cellWidth, 10, '', 0, 'C');


// Column 3: Receiver


$pdf->Output();
?>
