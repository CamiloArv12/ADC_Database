<?php
  require('../conect-bd.php');
  $ref_os = $_POST['ref_os'];
  $equiposSelQ = "SELECT Equipos FROM cotizaciones WHERE noCotizacion  ='$ref_os'";
  $resultadoA_E=$conexion->query($equiposSelQ);
  $html="";
  while ($row = $resultadoA_E->fetch_assoc()){  
    //echo '.$row[ Fecha"].'>'.$row["noCotizacion"].';
    //echo $datos;
    $separar=$row['Equipos'];
  }     
  $separado=explode(" ",$separar);
  $cant_datos=count($separado);
  for ($i=0; $i < $cant_datos ; $i++) { 
        //echo $separado[$i];
        $html.= "<option value='".$separado[$i]."'>".$separado[$i]."</option>"; 
  }
  echo $html;
  //echo $separado[0];
  
?>