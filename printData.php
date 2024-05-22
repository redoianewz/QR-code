<?php
require('fpdf/fpdf.php');
require('phpqrcode/qrlib.php');

if (isset($_POST['data'])) {
    $data = json_decode($_POST['data'], true);

    $pdf = new FPDF();
    $pdf->AliasNbPages();
    $pdf->SetAutoPageBreak(false);

    // Set card dimensions
    $cardWidth = 100; // Width of each card in millimeters
    $cardHeight = 60; // Height of each card in millimeters
    $marginX = 10; // Horizontal margin
    $marginY = -4; // Vertical margin

    $pageWidth = 120; // A4 width in millimeters
    $pageHeight = 297; // A4 height in millimeters

    // Initial position
    $x = $marginX;
    $y = $marginY + 8;

    // Add first page
    $pdf->AddPage('P',[120, 297]);
    

    // Loop through card data and add each card to the PDF
    foreach ($data as $row) {
        // Extract individual data elements
        $client = $row[0];
        $pro = $row[1];
        $machine = $row[2];
        $qte = $row[3];
        $date = $row[4];
        $qrCodeData = 'google.com';

        // Check if we need to add a new page
        if ($y + $cardHeight + $marginY > $pageHeight) {
            $pdf->AddPage('P', [120, 297]);
            $x = $marginX;
            $y = $marginY + 8;
        }

        // Draw the card
        $pdf->Rect($x, $y, $cardWidth, $cardHeight -8, 'D'); // Draw a rectangle (card border)
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetXY($x + 10, $y + 18); // Set position for the card content

        $pdf->Image('assets/images/oreif.png', $x - 3, $y - 16, 50);
        $pdf->SetX($x + 2 );
        $pdf->Cell($cardWidth, $cardHeight / 7, "Date: $date", 0, 1, 'L');
        $pdf->SetXY($x + 2, $y + 24);
        $pdf->Cell($cardWidth, $cardHeight / 7, $client, 0, 1, 'L');
        $pdf->SetXY($x + 2, $y + 30);
        $pdf->Cell($cardWidth, $cardHeight / 7,  $pro, 0, 1, 'L');
        $pdf->SetXY($x + 2, $y + 36);
        $pdf->Cell($cardWidth, $cardHeight / 7, "Machine: $machine", 0, 1, 'L');
        $pdf->SetXY($x + 2, $y + 42);
        $pdf->Cell($cardWidth, $cardHeight / 7, "Qte: $qte", 0, 1, 'L');

        $tempDir = 'assets/images/'; // Temporary directory to save QR code images
        if (!file_exists($tempDir)) {
            mkdir($tempDir);
        }
        $qrCodeFile = $tempDir . 'qrcode.png';
        QRcode::png($qrCodeData, $qrCodeFile);
      
        // Add QR code to the card
        $pdf->Image($qrCodeFile, $x + 65, $y, 35, 35);


        // Clean up: delete temporary QR code file
        unlink($qrCodeFile);

        // Update position for next card
        $y += $cardHeight + $marginY;
    }

    // Set headers to output the PDF directly
    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="table_data.pdf"');
    $pdf->Output();
    exit;
}
