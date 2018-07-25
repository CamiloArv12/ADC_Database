<?php
    require('fpdf/fpdf.php');   
    function datos_cot($orden, $fecha, $equipos){
        $hola=1234;
        $pdf=new FPDF('P','mm','Letter');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(40,10,utf8_decode('Cotización No.' ) . $hola);
        $pdf->Output();    
    }
    
?>
