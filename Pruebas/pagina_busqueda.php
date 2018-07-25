<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Cotización</title>
		<script language="javascript" src"js/jquery-3.1.1.min.js"></script>
	</head>

	<body>
		<?php
 		   include("conect-bd.php");
		   $busqueda=$_GET["buscar"];

		   
	       //$consulta="SELECT * FROM basedatos_maquinas WHERE Nombre LIKE '%$busqueda%'  "; //realizar busquedas por palabra y columna
		   $eqQ="SELECT Nombre, Categoria FROM categorias ORDER BY Nombre ASC";
		   //$consulta="select * from basedatos_Maquinas";
	        //traer todos los datos de una tabla
		   //$resultado=mysqli->query($eqQ);
		   eqQ($conexion, $eqQ);
		   
		   while(($fila=mysqli_fetch_array($eqQ_res, MYSQL_ASSOC))) { //imprimir los datos de una tabla
				echo $fila["Nombre"] . " | ";
		        echo $fila["Ref"] . " | ";
			    echo "<br>";
		   }
		   mysqli_close($conexion); //desconectar de la base de datos
		?>
	</body>
</html>
