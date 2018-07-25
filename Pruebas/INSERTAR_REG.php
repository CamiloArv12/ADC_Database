<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
	
	<?php
		

	
	//$busqueda=$_GET["buscar"];
	

	require("conect-bd.php");	
	
	
		$consulta="select * from basedatos_Maquinas where Nombre like '%$labusqueda%' "; //realizar busquedas por palabra y columna
	
		//$consulta="select * from basedatos_Maquinas";
		//traer todos los datos de una tabla
		
		$resultados=mysqli_query($conexion, $consulta);

		$consulta="inserte into basedatos_maquinas (nombre,referencia,serial,cantidad,observaciones) values";
	
	
	
	
	mysqli_close($conexion); //desconectar de la base de datos	
	
	
	
?>

	</head>
<body>

<?php
	
	
	$mibusqueda=$_GET["buscar"];
	
	$mipag=$_SERVER["php_self"];
	
	
	if($mibusqueda !=null) {
		
		ejecura_consulta($mibusqueda);
			
		
		
		
	}else{
		
	echo ("<form action='" . $mipag . "' method='get'>
	
		<label>Buscar:<input type='text' name='buscar'></label>
		
		<input type='submit' name='enviando' value='Espichame WE'>
		
		</form>");
		
		
	}
	
	
	
	
	
	
	

	
	
	
?>	
</body>
</html>