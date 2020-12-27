<?php 



require(dirname(__DIR__ ) . '/stamp/vendor/fpdf/fpdf.php');
require(dirname(__DIR__ ) . '/stamp/vendor/FPDI/fpdi.php');

$fileName   = $_GET['pdf'];
$fileId     = $_GET['id'];
//$name       = $_GET['name'];

//$fullPathToFile = dirname(__DIR__ ) . "/stamp/attachment/1/tester.pdf";
$fullPathToFile = dirname(__DIR__ ) . "/stamp/attachment/".$fileId."/".$fileName;
$user           = 'andika';
$date           = date('d-m-Y');


class PDF_Rotate extends FPDI {

    var $angle = 0;

    function Rotate($angle, $x = -1, $y = -1) {
        if ($x == -1)
            $x = $this->x;
        if ($y == -1)
            $y = $this->y;
        if ($this->angle != 0)
            $this->_out('Q');
        $this->angle = $angle;
        if ($angle != 0) {
            $angle*=M_PI / 180;
            $c = cos($angle);
            $s = sin($angle);
            $cx = $x * $this->k;
            $cy = ($this->h - $y) * $this->k;
            $this->_out(sprintf('q %.5F %.5F %.5F %.5F %.2F %.2F cm 1 0 0 1 %.2F %.2F cm', $c, $s, -$s, $c, $cx, $cy, -$cx, -$cy));
        }
    }

    function _endpage() {
        if ($this->angle != 0) {
            $this->angle = 0;
            $this->_out('Q');
        }
        parent::_endpage();
    }

}

class PDF extends PDF_Rotate {
    var $_tplIdx;

    function Header() {
        global $fullPathToFile;
        
        //Put the watermark
        $this->SetFont('Arial', 'B', 50);
        $this->SetTextColor(191, 191, 191);
        
        // THIS IS WHERE YOU GET THE NUMBER OF PAGES
        $this->numPages = $this->setSourceFile($fullPathToFile);
        $page = $this->setSourceFile($fullPathToFile);
        
    }

    function RotatedText($x, $y, $txt, $angle) {
        //Text rotated around its origin
        $this->Rotate($angle, $x, $y);
        $this->Text($x, $y, $txt);
        $this->Rotate(0);
    }

}


$pdf    = new PDF;
for($i = 1; $i <= $pdf->setSourceFile($fullPathToFile); $i++){
    $pdf->AddPage(); 
    $tplIdx = $pdf->importPage($i);
    $pdf->useTemplate($tplIdx, 0, 0);    
    $pdf->SetFont('Arial', 'B', 50);
    $pdf->SetTextColor(191, 191, 191);
    $pdf->RotatedText(40, 230, 'Uncontrolled document.', 45);
    $pdf->SetFont('Arial', 'B', 20);
    $pdf->RotatedText(60, 230, 'Print by:'.$user.', time:'.$date, 45);
}
$pdf->Output();