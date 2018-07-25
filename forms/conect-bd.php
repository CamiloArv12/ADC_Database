<?php
	$db_host="localhost";
	$db_nombre="base_prueba";
	$db_usuario="root";
	$db_pasword="";

	$conexion= new mysqli($db_host,$db_usuario, $db_pasword,$db_nombre);
	$conexion->set_charset("utf8");
		if (mysqli_connect_errno()) {
			echo "ERROR CATASTROFICO, CORRE WE";
			exit();
		}
		// mysqli_select_db($conexion, $db_nombre) or die("No se encuentra");
		// mysqli_set_charset($conexion, "utf8");
		//coneccion a la base de datos host
?>
