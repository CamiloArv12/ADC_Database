<?php
    require('../conect-bd.php');
    $ref_eq = $_POST['ref_eq'];
    $accsQ = "SELECT Nombre, Serial, Cantidad, Observaciones FROM basedatos_maquinas WHERE Referencia ='$ref_eq' ORDER BY Nombre";
    $resultadoA=$conexion->query($accsQ);

    echo "<tr>";
    echo "<th>Nombre</th>";
    echo "<th>Serial</th>";
    echo "<th>Cantidad</th>";
    echo "<th>Observaciones</th>";
    echo "</tr>";

    while ($rowA = $resultadoA->fetch_assoc()){
        
        echo "<tr>";
        echo "<td>".$rowA['Nombre']."</td>"; 
        echo "<td>".$rowA['Serial']."</td>"; 
        echo "<td>".$rowA['Cantidad']."</td>"; 
        echo "<td>".$rowA['Observaciones']."</td>"; 
        echo "</tr>";
    }
    

?>