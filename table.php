<?php 
require('fpdf/fpdf.php');

function setTextColorHex($hex)
{
    global $pdf; // Access the global $pdf object
    // Convert hexadecimal color code to RGB
    $hex = str_replace("#", "", $hex);
    if (strlen($hex) == 3) {
        $r = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
        $g = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
        $b = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
    } else {
        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));
    }

    // Set text color in FPDF
    $pdf->SetTextColor($r, $g, $b);
}

function SetCell($payload)
{

    global $pdf;
    $pdf->SetY($payload['Y']);
    $pdf->SetX($payload['X']);
    $pdf->SetFont($payload['font']['family'], $payload['font']['style'], $payload['font']['size']);
    setTextColorHex($payload['textColor']);
    $pdf->Cell($payload['with'], $payload['height'], iconv('UTF-8', 'windows-1252', $payload['text']), $payload['border'], $payload['ln'], $payload['align'], $payload['fill']);
}

$pdf = new FPDF();
// $isLastPage = false;
$pdf->AliasNbPages();
$pdf->AddPage();


$pdf->SetLeftMargin(6);
$pdf->SetAutoPageBreak(false);
$pdf->SetFont('Arial', '', 7);
SetCell([
    'Y' => 15,
    'X' => 6,
    'font' => [
        'family' => 'Arial',
        'style' => '',
        'size' => 7
    ],
    'textColor' => '#000000',
    'with' => 10,
    'height' => 1,
    'text' => 'Reference',
    'border' => 0,
    'ln' => 0,
    'align' => 'C',
    'fill' => false
]);
SetCell([
    'Y' => 15,
    'X' => 20,
    'font' => [
        'family' => 'Arial',
        'style' => '',
        'size' => 7
    ],
    'textColor' => '#000000',
    'with' => 10,
    'height' => 1,
    'text' => 'Designation',
    'border' => 0,
    'ln' => 0,
    'align' => 'C',
    'fill' => false
]);
SetCell([
    'Y' => 15,
    'X' => 31,
    'font' => [
        'family' => 'Arial',
        'style' => '',
        'size' => 7
    ],
    'textColor' => '#000000',
    'with' => 10,
    'height' => 1,
    'text' => 'Qte',
    'border' => 0,
    'ln' => 0,
    'align' => 'C',
    'fill' => false
]);
$pdf->Output();