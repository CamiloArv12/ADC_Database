<?php
  require('../conect-bd.php');
  $ref_eq = $_POST['ref_eq'];
  $equiposSelQ = "SELECT Nombre_Equipo, Ref FROM equipos WHERE Ref ='$ref_eq'";
  $resultadoA_E=$conexion->query($equiposSelQ);
  
  
  while ($row = $resultadoA_E->fetch_assoc()){  
    $html= "<option value='".$row['Ref']."'>".$row['Nombre_Equipo']."</option>"; 
    //echo '.$row["Ref"].'>'.$row["Nombre_Equipo"].';
  }
  echo $html;
?>


