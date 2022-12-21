<?php 
 if(isset($_GET["idEvento"]))
 {
 	$idEvento=$_GET["idEvento"];
 	echo "id evento ".$idEvento;
 }
 else
 {
 	$idEvento=0;
 }

include "php/conexionbd.php";
$link=AbrirConexion();
$CadSql="Select rut_organizacion,nombre_organizacion 
from organizacion
order by nombre_organizacion desc;";
$organizaciones=EjecutarConsulta($CadSql,$link);

$CadSql="Select a.nombre_usuario,a.nombre_autor,a.direccion_autor,a.correo_autor from autor a;";
$tipo_eventos=EjecutarConsulta($CadSql,$link);


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=	, initial-scale=1.0">
	<title>Crear nuevo evento</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="css/estilo.css">

</head>
<body>
	<div class="container">
		<div class="row" id="encabezado">
			<div class="col-sm-12">
				<?php 
				include "php/encabezado.php";
				?>
			</div>
		</div>
		<div class="row" id="principal">
			<div class="col-sm-2" id="menu">
				<?php 
				include "php/menu.php";
				?>
			</div>
			<div class="col-sm-10" id="contenido">
				<form action="actualizar_evento.php" method="POST" id="frmEvento" name="frmEvento">
					
					<div class="row">
						<div class="col-sm-2"></div>
						<div class="col-sm-8">
							<div class="panel panel-primary">
								<div class="panel-heading">Búsqueda,modificación y/o eliminación de evento</div>
								<div class="panel-body azul">
									<div class="row ">
										<div class="col-sm-4">
											Nombre actual
										</div>
										<div class="col-sm-8">
											<select name="cboEvento" id="cboEvento">
												<option value="">Escoja nombre evento</option>
												<?php 
												while($fila=mysqli_fetch_array($eventos))
												{

													echo '<option value="'.$fila["cod_evento"].'">';
													echo $fila["nombre_evento"].'</option>';
												}		
												?>
											</select>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-4">
											Nombre evento
										</div>
										<div class="col-sm-8">
											<input type="text" id="txtNombreEvento" name="txtNombreEvento" placeholder="Digite el nombre del evento" required="required">
										</div>
									</div>
									<div class="row">
										<div class="col-sm-4">
											Fecha evento
										</div>
										<div class="col-sm-8">
											<input type="date" id="dtFechaEvento" name="dtFechaEvento" placeholder="Ingrese fecha del evento" required="required">
										</div>
									</div>
									<div class="row">
										<div class="col-sm-4">
											Hora evento
										</div>
										<div class="col-sm-8">
											<input type="time" id="tmHoraEvento" name="tmHoraEvento" placeholder="Ingrese hora del evento" required="required">
										</div>
									</div>
									<div class="row">
										<div class="col-sm-4">
											Aforo
										</div>
										<div class="col-sm-8">
											<input type="number" id="txtAforo" name="txtAforo" placeholder="Ingrese aforo del evento" required="required">
										</div>
									</div>
									<div class="row">
										<div class="col-sm-4">
											Edad mínima
										</div>
										<div class="col-sm-8">
											<input type="number" id="txtEdadMinima" name="txtEdadMinima" placeholder="Ingrese edad minima del evento" required="required">
										</div>
									</div>
									<div class="row">
										<div class="col-sm-4">
											Organizacion evento
										</div>
										<div class="col-sm-8">
											<select name="cboProductora" id="cboProductora">
												<option value="">Escoja organizacion</option>
												<?php 
												while($fila=mysqli_fetch_array($organizaciones))
												{

													echo '<option value="'.$fila["rut_organizacion"].'">';
													echo $fila["nombre_organizacion"].'</option>';

												}		
												?>
											</select>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-4">
											Tipo evento
										</div>
										<div class="col-sm-8">
											<select name="cboTipoEvento" id="cboTipoEvento">
												<option value="">Escoja tipo evento</option>

												<?php 
												while($fila=mysqli_fetch_array($tipo_eventos))
												{

													echo '<option value="'.$fila["cod_tipo_evento"].'">';
													echo $fila["des_tipo_evento"].'</option>';
												}		
												?>											
											</select>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-4">
											Region
										</div>
										<div class="col-sm-8">
											<select name="cboRegion" id="cboRegion">
												<option value="">Escoja región</option>
												<?php 
												while($fila=mysqli_fetch_array($regiones))
												{

													echo '<option value="'.$fila["cod_region"].'">';
													echo $fila["des_region"].'</option>';

												}		
												CerrarConexion($link);	
												?>
											</select>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-4">
											Provincia
										</div>
										<div class="col-sm-8">
											<select name="cboProvincia" id="cboProvincia">
												<option value="">Escoja provincia</option>
											</select>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-4">
											Ciudad
										</div>
										<div class="col-sm-8">
											<select name="cboCiudad" id="cboCiudad">
												<option value="">Escoja ciudad</option>
											</select>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-4">
											Lugar evento
										</div>
										<div class="col-sm-8">
											<select name="cboLugar" id="cboLugar">
												<option value="">Escoja lugar evento</option>
											</select>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-4">
											<input type="submit" id="cmdModificarEvento" name="cmdModificarEvento" class="btn btn-primary" value="Modificar evento">
										</div>
										<div class="col-sm-4">
											<input type="submit" id="cmdEliminarEvento" name="cmdEliminarEvento" class="btn btn-primary" value="Eliminar evento">
										</div>
										<div class="col-sm-4">
											<input type="reset" class="btn btn-success" value="Limpiar" 
											id="cmdLimpiar" name="cmdLimpiar">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-2"></div>
					</div>
				</form>
			</div>
		</div>
		<div class="row" id="pie">
			<div class="col-sm-12">
				<?php 
				include "php/pie.php";
				?>
			</div>
		</div>
	</div>
</body>
</html>
<script type="text/javascript">
	var codigoRegion;
	var codigoProvincia;
	var codigoCiudad;
	var codigoLugar;
	$(document).ready(function(){
		BuscarEvento(<?php echo $idEvento;?>)
		$("#cboEvento").change(function(){
			var codEvento=$("#cboEvento").val();
			BuscarEvento(codEvento);
		});
		$("#cboRegion").change(function(){
			LlenarProvincias(0,0);
		});
		$("#cboProvincia").change(function(){
			
			LlenarCiudades(0,0);
		});
		$("#cboCiudad").change(function(){
			LlenarLugares(0,0);
		});
		$("#cmdLimpiar").click(function(){
		});
	});	

</script>
<script type="text/javascript">
	
	function BuscarEvento(codEvento)
	{
		
		$.ajax({
			type:"POST",
			url:"eventos.php",
			data:"evento="+codEvento,
			success:function(r){
				var re=JSON.parse(r);
				$("#txtNombreEvento").val(re["des_evento"]);
				$("#dtFechaEvento").val(re["fecha_evento"]);
				$("#tmHoraEvento").val(re["hora_evento"]);
				$("#txtAforo").val(re["aforo"]);
				$("#txtEdadMinima").val(re["edad_minima"]);
				$("#cboOrganizacion").val(re["rut_organizacion"]);
				$("#cboTipoEvento").val(re["cod_tipo_evento"]);
				$("#cboRegion").val(re["cod_region"]);
				/*$("#cboProvincia").val(re["cod_provincia"]);
				$("#cboCiudad").val(re["cod_ciudad"]);
				$("#cboLugar").val(re["cod_lugar"]);*/
				codigoRegion=re["cod_region"];
				codigoProvincia=re["cod_provincia"];
				codigoCiudad=re["cod_ciudad"];
				codigoLugar=re["cod_lugar"];
				LlenarProvincias(codigoProvincia,codigoRegion);
				LlenarCiudades(codigoProvincia,codigoCiudad);
				LlenarLugares(codigoCiudad,codigoLugar);	
			}
		});
	}
	function LlenarProvincias(cProvincia,cRegion)
	{
		if(cRegion==0)
		{
			var codRegion=$("#cboRegion").val();
		}
		else
		{
			var codRegion=cRegion;
		}
		$.ajax({
			type:"POST",
			url:"provincias.php",
			data:{"region":codRegion},
			success:function(r){
				$('#cboProvincia').html(r);
				$('#cboProvincia').val(cProvincia);
			}
		});
	}

	function LlenarCiudades(cProvincia,cCiudad,)
	{
		if(cProvincia==0)
		{
			var codProvincia=$("#cboProvincia").val();
		}
		else
		{
			var codProvincia=cProvincia;
		}

		$.ajax({
			type:"POST",
			url:"ciudades.php",
			data:{"provincia":codProvincia},
			success:function(r){
				$('#cboCiudad').html(r);
				$('#cboCiudad').val(cCiudad);
			}
		});
	}

	function LlenarLugares(cCiudad,cLugar)
	{
		if(cCiudad==0)
		{
			var codCiudad=$("#cboCiudad").val();
		}
		else
		{
			var codCiudad=cCiudad;
		}
		$.ajax({
			type:"POST",
			url:"lugares.php",
			data:{"ciudad":codCiudad},
			success:function(r){
				$('#cboLugar').html(r);
				$('#cboLugar').val(cLugar);
			}
		});
	}

</script>
