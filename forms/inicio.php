<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADC_RENTAL</title>
</head>
<body>
    <?php session_start();?>
    <t> Base de Datos </t>
    <br>
    <br><input type="button" value="Orden de Salida" onclick="location='/ADC_Database/forms/orden_salida.php'">
    <input type="button" value="Cotizaciones" onclick = "location='/ADC_Database/forms/formulario_cotizacion.php'">
    <input type="button" value="Reportes" onclick = "location='/ADC_Database/forms/reportes.php'">
</body>
</html>