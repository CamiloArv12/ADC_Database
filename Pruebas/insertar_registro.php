<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
<?php
		

	
	//$busqueda=$_GET["buscar"];
	
	$cod=$_GET["Nombre"];
	$ref=$_GET["Referencia"];
	$ser=$_GET["Serial"];
	$cant=$_GET["Cantidad"];
	$obs=$_GET["Observaciones"];	

	require("../forms/conect-bd.php");	
	
	
		$consulta="select * from basedatos_Maquinas where Nombre like '%$labusqueda%' "; //realizar busquedas por palabra y columna
	
		//$consulta="select * from basedatos_Maquinas";
		//traer todos los datos de una tabla
		
		$resultados=mysqli_query($conexion, $consulta);

		$consulta="inserte into basedatos_maquinas (nombre,referencia,serial,cantidad,observaciones) values";
	
	
	
	
	mysqli_close($conexion); //desconectar de la base de datos	
	
	
	
?>	

	
</body>
</html>