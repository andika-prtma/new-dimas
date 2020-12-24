<?php 

// require_once('fpdf.php');
// require_once('fpdi.php');

require(dirname(__DIR__ ) . '/vendor/fpdf/fpdf.php');
require(dirname(__DIR__ ) . '/vendor/FPDI/fpdi.php');
 
$fullPathToFile = dirname(__DIR__ ) . "/document.pdf";
$imageSource = dirname(__DIR__ ) . "/custom.png";
function generatePDF($source, $image) {


$pdf = new FPDI();
$pdf->AddPage();
$pdf->setSourceFile($source);
$template = $pdf->importPage(1);
$pdf->useTemplate($template);
$pdf->Image($image, 1, 2, 50, 50);
$pdf->Output();
}
 
generatePDF($fullPathToFile, $imageSource);