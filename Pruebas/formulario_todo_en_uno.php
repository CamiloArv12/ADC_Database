<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Documento sin título</title>
		<?php
                function ejecuta_consulta($labusqueda)
                {
                    //$busqueda=$_GET["buscar"];
                    include("conect-bd.php");
                    $consulta="select * from basedatos_maquinas where Nombre like '%$labusqueda%' "; //realizar busquedas por palabra y columna
                    //$consulta="select * from basedatos_Maquinas";
                    //traer todos los datos de una tabla
                    $resultados=mysqli_query($conexion, $consulta);
                    while ($fila=mysqli_fetch_array($resultados, MYSQL_ASSOC)) { //imprimir los datos de una tabla
                        echo $fila["Nombre"] . " | ";
                        echo $fila["Referencia"] . " | ";
                        echo $fila["Serial"] . " | ";
                        echo $fila["Cantidad"] . " | ";
                        echo $fila["Observaciones"] . " | ";
                        echo "<br>";
                    }
                    mysqli_close($conexion); //desconectar de la base de datos
                }
            ?>
	</head>
	<body>
		<?php
                $mibusqueda=$_GET["buscar"];
                $mipag=$_SERVER["php_self"];

                if ($mibusqueda !=null) {
                    ejecuta_consulta($mibusqueda);
                } else {
                    echo("<form action='" . $mipag . "' method='get'>
						<label>Buscar:<input type='text' name='buscar'></label>
						<input type='submit' name='enviando' value='Espichame WE'>
						</form>");
                }
            ?>
	</body>
</html>
