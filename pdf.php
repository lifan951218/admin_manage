<?php
/*

$books = array (
    'The Sun Also Rises, by Ernest Hemingway',
    'King Rat, by James Clavell',
    'The Long Tail, by Chris Anderson'
);
require( 'fpdf/fpdf.php');

$pdf = new FPDF();
$pdf->SetFont('Arial','',72);
$pdf->AddPage();
foreach ($books AS $book) {
    $pdf->MultiCell(0, 5, $book, 0, 'L');
}
//$pdf->Cell(40,10,"Hello World!",15);
$pdf->Output();
*/
require ('fpdf/chinese.php');

$pdf=new PDF_Chinese();
$pdf->AddGBFont();
$pdf->AddPage();
$pdf->SetFont('GB','',20);
$pdf->Write(10,iconv("UTF-8","gbk",'立体车库信息'));
$pdf->Output();
?>