<?php
    include './assets/connection.php';
    
    class PDF extends FPDF {
        function Header() {
            $this->Image('./assets/imgs/logo.png', 10, 6, 27);
            $this->SetFont('Arial','B',15);
            $this->Cell(80);
            $this->Cell(30, 10, 'Headeing', 1, 0, 'C');
            $this->Ln(30);
        }
        function Footer() {
            $this->SetY(-20);
            $this->SetFont('Arial', 'I', 8);
            $this->Cell(0, 10, "Page ". $this->PageNo(). '/(nb)', 0,  0, 'C');

        }
    }

    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->SetFont('Times', '', 11);
    for ($i = 1; $i < 30; $i++) {
        $pdf->Cell(0, 10, "Printing  line number $i", 0, 1);
    }
    $pdf->Output();
?>