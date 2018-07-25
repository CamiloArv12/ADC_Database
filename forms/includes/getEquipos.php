<?php 
    require('../conect-bd.php');
    $tipo_eq = $_POST['tipo_eq'];
    $equiposQ = "SELECT Nombre_Equipo, Ref FROM equipos WHERE Tipo ='$tipo_eq' ORDER BY Nombre_Equipo";
    $resultadoE=$conexion->query($equiposQ);

    $html = "<option value='0'>Seleccionar Equipo</option>";

    while ($rowE = $resultadoE->fetch_assoc()){
        $html.= "<option value='".$rowE['Ref']."'>".$rowE['Nombre_Equipo']."</option>"; 
    }
    echo $html;
?>