<?php
	require("conect-bd.php");
    $eqQ="SELECT Nombre, Tipo FROM categorias ORDER BY Nombre ASC";
	$resultado=$conexion->query($eqQ);
    session_start();
	$ultimo="SELECT noCotizacion FROM cotizaciones order by noCotizacion DESC LIMIT 5";
    $ult_reg=$conexion->query($ultimo);

    $fecha = getdate();
	$_SESSION['fecha']= $fecha['mday'] ."/". $fecha['mon']."/". $fecha['year'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Orden de Salida</title>

    <script language="javascript" src="js/jquery-3.3.1.js"></script>
    <script language="javascript">
        function buscar(){
            ref=$('input:text[name=nCot]').val();
            $.post("includes/buscar_cot.php", {ref:ref}, function(data){
                $('#listado_eq').html(data);
            });
        }

        $(document).ready(function(){
            $("#buscarCot").change(function(){
                $("#buscarCot option:selected").each(function(){
                    ref=$(this).val();
                    $.post("includes/buscar_cot.php", {ref:ref}, function(data){ref
                        $("#listado_eq").html(data);
                    });
                });
            })
        });

        $(document).ready(function () {
				$("#Selecciona_Categoria").change(function () {
					$("#Selecciona_Categoria option:selected").each(function(){
						tipo_eq=$(this).val();
						$.post("includes/getEquipos.php", { tipo_eq: tipo_eq }, function(data){
							$("#Selecciona_Equipo").html(data);
						});
					});
				})
			});	

			$(document).ready(function () {
				$("#Selecciona_Equipo").change(function(){

					$("#Selecciona_Equipo option:selected").each(function(){
						ref_eq=$(this).val();
						$.post("includes/getAccesorios.php", { ref_eq: ref_eq}, function(data){
							$("#Accesorios").html(data);
				 		});
					});
				})
			});

			function add_equipo(){
				$("#Selecciona_Equipo option:selected").each(function(){
						ref_eq=$(this).val();
						$.post("includes/add_equipo.php", { ref_eq: ref_eq}, function(data){
							$("#seleccion").append(data);
				 		});
						$("#Selecciona_Equipo").find('option[value="'+ref_eq+'"]').remove(); 
				});
			}
			function elim_equipo(){
				$("#seleccion option:selected").each(function(){
					ref_eq=$(this).val();
					$("#seleccion").find('option[value="'+ref_eq+'"]').remove();  
					$.post("includes/add_equipo.php", { ref_eq: ref_eq}, function(data){
						$("#Selecciona_Equipo").append(data);
				 	});					
				});
			}	
			function setHeight(txtdesc) {
				txtdesc.style.height = txtdesc.scrollHeight + "px";
			}	
			function seleccionarTodo(id)
			{
				// Recorremos todos los valores
				$("#"+id+" option").each(function(){
		
					// Marcamos cada valor como seleccionado
					$("#"+id+" option[value="+this.value+"]").prop("selected",true);
				}); 
			}
    </script>
</head>
<body>
    <form id="genOS" name="genOS" method="POST" action="guardar_os.php" >
        <div> Cotizaciones Recientes<select id="buscarCot" name="buscarCot">
                <option value="Seleccionar"> Seleccionar </option>
                <?php 
                    while ($row=$ult_reg->fetch_assoc()){
                        echo '<option value="'.$row['noCotizacion'].'">'.$row['noCotizacion'].'</option>';
                    }
                ?>        
             </select>
             Buscar <input type="text" id="nCot" name="nCot">
             <input type="button" id="nCot" name="nCot" value="Buscar" onclick="buscar()">

             Fecha: <select name="fecha">
				<option value="
					<?php $date = getdate();?>
					<?php echo $date['mday'] ."/". $date['mon']."/". $date['year'];?>">
					<?php $date = getdate();?><?php echo $date['mday'] ."/". $date['mon']."/". $date['year']; ?></option>
				</select>
             Orden de salida <select  name="numOS"> </select>
        </div>
        <div> <select id="listado_eq" name="listado_eq" size="5"></select>
        </div>
                    
        <div>Selecciona Categoría : 
				<select name="Selecciona_Categoria" id="Selecciona_Categoria">
					<option value="0">Seleccionar Categoría</option>
					<?php while ($row = $resultado->fetch_assoc()) { ?>
						<option value="<?php echo $row['Tipo']; ?>">
							<?php echo $row['Nombre']; ?>
						</option>					
					<?php } ?>
				</select>
               
			</div>			
			
			<br>

			<div> Selecciona Equipo: <select multiple="multiple" size ="10" name="Selecciona_Equipo" id="Selecciona_Equipo" ></select>
			</div>
			
			<br>

			<div> <input type="button" name="agregar_eq" value="Agregar" onclick="add_equipo()"> 

		    	<input type="button" name="eliminar_eq" value="Eliminar" onclick="elim_equipo()"> 
			</div>		
			<br>
			<div> Seleccionados<select multiple="multiple" form="main-form" id="seleccion" name="seleccion[]" size="10"></select>
				<br>
				<br>
				<input type="submit" id="Guardar" name="Guardar" value="Guardar" onclick="seleccionarTodo('seleccion')"> 
				<br>
			</div>
    </form>

</body>
</html>