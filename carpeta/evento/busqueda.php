<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Manejo de eventos</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<div class="row" id="encabezado">
		<div class="col-sm-12">
			<?php 
			include("php/encabezado.php");
			?>
		</div>
	</div>
	<div class="row" id="principal">
		<div class="col-sm-2" id="menu">
			Menu
			<?php 
			include("php/menu.php");
			?>
		</div>
		<div class="col-sm-10" id="contenido">
			
			<?php 
			include "php/conexionbd.php";
			$link=AbrirConexion();
			$CadSql="Select cod_tipo_evento,des_tipo_evento from tipo_evento;";
			$tipo_evento=EjecutarConsulta($CadSql,$link);


			
			?>
			<div class="row amarillo">
				<div class="col-sm-6">
					Tipo evento
				</div>
				<div class="col-sm-6">
					<select name="cboTipoEvento" id="cboTipoEvento" required="required" class="azul">
						<option value="0">Escoja evento</option>
						<?php 
						while ($fila=mysqli_fetch_array($tipo_evento)) {
							?>
							<option value="<?php echo $fila['cod_tipo_evento'];?>">
								<?php echo $fila["des_tipo_evento"]; ?>
							</option>
							<?php 
						}
						?>
					</select>
				</div>
			</div>
			<div id="resultado">
				
			</div>

			<?php 

			CerrarConexion($link);
			?>

		</div>
	</div>
	<div class="row" id="pie">
		<div class="col-sm-12">
			<?php 
			include("php/pie.php");
			?>
		</div>
	</div>
</body>
</html>
<script type="text/javascript">

$(document).ready(function(){
	
		$("#cboTipoEvento").change(function(){
			var codTipo=$("#cboTipoEvento").val();
			BuscarEvento(codTipo);
		});
		
	});	

</script>
<script type="text/javascript">
	
	function BuscarEvento(codTipo)
	{
		
		$.ajax({
			type:"POST",
			url:"tipoeventos.php",
			data:"tipo="+codTipo,
			success:function(r){
				$("#resultado").html(r);
			}
		});
	}


</script>
