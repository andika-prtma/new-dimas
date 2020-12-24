<?php 

// require_once('fpdf.php');
// require_once('fpdi.php');

//$id = $_GET['id'];
$id = 16;

$konek = mysqli_connect('localhost','root','','db_new_dimas');
$buka = mysqli_fetch_array(mysqli_query($konek,"SELECT id_doc,ID,file_pdf FROM tbl_document_revisi WHERE ID='$id' "));


require(dirname(__DIR__ ) . '/vendor/fpdf/fpdf.php');
require(dirname(__DIR__ ) . '/vendor/FPDI/fpdi.php');
 
$id_doc 	= $buka['id_doc'];
$file_pdf 	= $buka['file_pdf'];
$id_doc_static 		= 16;
$file_pdf_static 	= 'PU-DDC-005_Prosedur_Pengendalian_Ketidaksesuaian_dan_Tindakan_dan_Perbaikan.pdf';

// var_dump($buka);
//echo dirname(__DIR__ ).'\attachment/'.$id_doc.'/';


$get_id  = $_GET['id_document'];
$get_pdf = $_GET['pdf'];

//1. bisa
$url 	= dirname(__DIR__ ) . "/attachment/".$id_doc_static."/".$file_pdf_static;
//2. tidak bisa
$url2 	= dirname(__DIR__ ) . "/attachment/".$id_doc."/".$file_pdf_static;
//3.tidak bisa
$url3 	= dirname(__DIR__ ) . "/attachment/".$id_doc_static."/".$file_pdf;
//4.
$url4 	= dirname(__DIR__ ) . "/attachment/".$get_id."/".$get_pdf;


$source = $url4;
$image = dirname(__DIR__ ) . "/stamp.png";
$pdf = new FPDI();
$pdf->setSourceFile($source);
$sc = $pdf->setSourceFile($source);
for($i=1; $i <= $sc; $i++) {
    //$pdf->endPage();
    $template = $pdf->importPage($i);
	$pdf->Image($image, 1, 10, 50, 15);
    //$pdf->SetXY(95, 16);  
    $pdf->AddPage();
	$pdf->useTemplate($template);
}
$pdf->Output();
// echo '1.'.$url.'<br>';
// echo '2.'.$url2.'<br>';
// echo '3.'.$url3.'<br>';
// echo '4.'.$url4;