<?php
require('fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 18);
$pdf->Cell(0, 10, 'Mon Super Titre');
$pdf->Output();
?>