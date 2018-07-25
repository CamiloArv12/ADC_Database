<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reportes</title>

    <script language="javascript" src="js/jquery-3.3.1.js"></script>
    <script language="javascript">
        function buscar_OS(){
            ref_os=$('input:text[name=nOrdenR]').val();
            $.post("includes/buscar_os.php", {ref_os:ref_os}, function(data){
                $('#detOS').html(data);
            });
        }

        $(document).ready(function(){
            $("#detOS").change(function(){
                $("#detOS option:selected").each(function(){
                    ref_eq=$(this).val();
                    $.post("includes/getAccesorios.php", {ref_eq:ref_eq}, function(data){ref_eq
                        $("#listado_eq").html(data);
                    });
                });
            })
        });
    </script>
</head>
<body>
    <form id="buscar-os" name="buscar-os" method="POST">
        <div> No. Orden: <input type="text" name="nOrdenR" id"nOrdenR">
            <input type="button" id="buscarOS" name="buscarOS" value="Buscar" onclick="buscar_OS()">
        </div>
        <div> <select multiple="multiple" id="detOS" name="detOS" size="5"></select>   </div>    
        <div> <table id="listado_eq" name="listado_eq"></table>
        </div>
    </form>    
</body>
</html> 