<?php
   // session_start();
    require('fpdf/fpdf.php');
    require('guardar_cot.php');
    require('conect-bd.php');

class PDF extends FPDF {

//----------HEADER---------//
    function Header(){
        // Logo
        $this->Image('logo.png',8,8, 26,26);
        // Arial bold 15
        $this->SetFont('Arial','B',8);
        // Movernos a la derecha
        $this->Cell(30);
        // Título
        $this->Cell(12,4,utf8_decode('CLIENTE:'),1,0,'L');

        $this->Cell(70);
        $this->Cell(12,4,utf8_decode('FECHA:'),1,0,'L');

        $this->Cell(50);
        $nCot=$_SESSION['noCot'];
        $this->Cell(12,4,utf8_decode('Cotización No.')." ".$nCot,1,0,'R');
        // Salto de línea
        $this->Ln(5); 
//--------------------------------//
        $this->Cell(30);
        $this->Cell(12,4,utf8_decode('PROYECTO:'),1,0,'L');

        $this->Cell(70);
        $this->Cell(12,4,utf8_decode('GAFER:'),1,0,'L');
        $this->Ln(5);
//--------------------------------//
        $this->Cell(30);
        $this->Cell(12,4,utf8_decode('HORA DE LLAMADO:'),1,0,'L');

        $this->Cell(70);
        $this->Cell(12,4,'DIR.FOT:',1,0,'L');
        $this->Ln(5);
//--------------------------------//
        $this->Cell(30);
        $this->Cell(12,4,utf8_decode('LOCACIÓN:'),1,0,'L');

        $this->Cell(70);
        $this->Cell(12,4,utf8_decode('PRODUCTOR:'),1,0,'L');
        $this->Ln(20);
    }
//-----------Tabla simple---------//
    // 
    function BasicTable($header, $data)
    {
        // Cabecera
        foreach($header as $col)
            $this->Cell(40,7,$col,1);
        $this->Ln();
        // Datos
        foreach($data as $row)
        {
            foreach($row as $col)
                $this->Cell(40,6,$col,1);
            $this->Ln();
        }
    }
//-------Cargar datos--------------//
    function LoadData($query_cot){
        require('conect-bd.php');  
        $eqyac = "SELECT Equipos FROM cotizaciones WHERE noCotizacion = '$query_cot'";
        $datos=$conexion->query($eqyac);
        $texto="";

        while ($rowD = $datos->fetch_assoc()){
           
        }
        $texto = $rowD['Equipos'];

        $separado=explode(" ",(string)$texto);
        $cant_datos=count($separado);
        
        // for ($i=0; $i < $cant_datos ; $i++) { 
        //     $query_acc = "SELECT Nombre, Serial, Cantidad, Observaciones FROM basedatos_maquinas WHERE Referencia ='$separado[$i]' ORDER BY Nombre";
        //     $resultadoA=$conexion->query($query_acc);

        //     while ($rowA = $resultadoA->fetch_assoc()){
        //         // $data[$i][0]=$rowA['Nombre'];
        //         // $data[$i][1]=$rowA['Cantidad'];
        //         // $data[$i][2]=$rowA['Serial'];
        //     }
        //     foreach ($rowA as $row) {
        //         $data[]=$rowA['Nombre'].";".$rowA['Cantidad'].";".$rowA['Serial'];
        //     }

        // } 
        // return $data;   
    }
//--------FOOTER--------//
    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}
//----------- CONTENIDO PRINCIPAL-----------//

    $pdf=new PDF('P','mm','Letter');
    $pdf->AliasNbPages();
    $pdf->AddPage();

    //--------------------------------//
            
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(10);
            $pdf->Cell(12,4,utf8_decode('Personal técnico'),1,0,'L');
            $pdf->Ln(5);


            $pdf->Cell(0,1,utf8_decode(''),1,0,'L');
            $pdf->Ln(5);

    $pdf->SetFont('Arial','',8);
    $header = array ('Nombre', 'Cantidad', 'Serial');
    $data = $pdf->LoadData($_SESSION["noCot"]);
    $pdf->BasicTable($header,$data);
        // $align=0;
    // for($i=1;$i<=40;$i++){
    //     if ($align%2==0)
    //         $pdf->Cell(0,10,utf8_decode('Imprimiendo línea número ').$i,0,1);
    //     elseif ($align%2!=0) {
    //         $pdf->Cell(0,10,utf8_decode('hola').$i,0,2);
    //     }
    //     $align++;
    // }
    $pdf->Output();
?>
    





