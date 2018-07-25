<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="gen_pdf.php" method="GET" > 
            <?php
                require('conect-bd.php');
                session_start();
                if ($_POST){
                     if (isset($_POST["seleccion"]) and isset($_POST["Guardar"])){
                    
                        $save=$_POST["seleccion"];
                        $tamano=count($save);

                        for ($i=0; $i < $tamano ; $i++) { 
                            if ($i==0) {
                                $datos= $save[$i];
                            }else{
                                $datos= $datos. " " .$save[$i]; 
                            }
                        }
                        //echo $datos;
                        // $separado=explode(" ",$datos);
                        // $cant_datos=count($separado);

                        // for ($i=0; $i < $cant_datos ; $i++) { 
                        //     echo $separado[$i];
                        // }
                        
                        $saveQ="INSERT INTO ordenes (Fecha, Equipos) VALUES ('$date','$datos')"; 
                        $resultado= mysqli_query($conexion, $saveQ);        
    
                        if ($resultado==false){
                            echo "Error de consulta";
                        } else{
                            echo "Guardado";
                        }
                        echo "<script>window.open('gen_pdf.php', '_blank');</script>";
                   
                    }else{
                     echo "error en selección";
                    }   
                }     
            mysqli_close($conexion);
            ?>
        </form>
</body>
</html>