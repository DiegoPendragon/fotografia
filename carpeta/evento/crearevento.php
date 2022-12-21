<?php 
include "php/conexionbd.php";
$link=AbrirConexion();
$CadSql="Select cod_region,des_region from region;";
$regiones=EjecutarConsulta($CadSql,$link);

$CadSql="Select cod_provincia,des_provincia,cod_region from provincia;";
$provincias=EjecutarConsulta($CadSql,$link);

$CadSql="Select cod_tipo_evento,des_tipo_evento from tipo_evento;";
$tipo_evento=EjecutarConsulta($CadSql,$link);

$CadSql="Select rut_organizacion,nombre_organizacion from organizacion;";
$organizacion=EjecutarConsulta($CadSql,$link);

$CadSql="Select cod_ciudad,des_ciudad from ciudad;";
$ciudad=EjecutarConsulta($CadSql,$link);

?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Subir foto</title>
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
			<form action="guardarevento.php" method="POST">
				<div class="row">
					<div class="col-sm-2"></div>
					<div class="col-sm-8">
						<div class="panel panel-primary">
							<div class="panel-heading">Subir fotografia</div>
							<div class="panel-body azul">
								<div class="row">
									<div class="col-sm-6">
										Nombre Fotografia
									</div>
									<div class="col-sm-6">
										<input type="search" id="txtNombreEvento" name="txtNombreEvento" placeholder="Ingrese nombre" required="required">
									</div>
								</div>
<!--
								<div class="row">
									<div class="col-sm-6">
										Fecha evento
									</div>
									<div class="col-sm-6">
										<input type="date" id="dtFechaEvento" name="dtFechaEvento" required="required">
									</div>
								</div>
                                
								<div class="row">
									<div class="col-sm-6">
										Hora evento
									</div>
									<div class="col-sm-6">
										<input type="time" id="tmHoraEvento" name="tmHoraEvento" required="required">
									</div>
								</div>

								<div class="row">
									<div class="col-sm-6">
										Aforo
									</div>
									<div class="col-sm-6">
										<input type="number" id="txtAforo" name="txtAforo" min="1" required="required">
									</div>
								</div>

								<div class="row">
									<div class="col-sm-6">
										Edad mínima
									</div>
									<div class="col-sm-6">
										<input type="number" id="txtEdad" name="txtEdad" min="0" max="135" required="required">
									</div>
								</div>
								-->

								<div class="row">
									<div class="col-sm-6">
										Tipo de fotografia
									</div>
									<div class="col-sm-6">
										<select name="cboTipoEvento" id="cboTipoEvento" required="required">
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


								<div class="row">
									<div class="col-sm-6">
										Organizacion
									</div>
									<div class="col-sm-6">
										<select name="cboOrganizacion" id="cboOrganizacion">
											<option value="0">Escoja organizacion</option>
											<?php 
											while ($fila=mysqli_fetch_array($organizacion)) {
												?>
												<option value="<?php echo $fila['rut_organizacion'];?>">
													<?php echo $fila["nombre_organizacion"]; ?>
												</option>
												<?php 
											}
											?>
										</select>
									</div>
								</div>



								<div class="row">
									<div class="col-sm-4">
										Región
									</div>
									<div class="col-sm-8">
										<select name="cboRegion" id="cboRegion">
											<option value="0">Escoja región</option>
											<?php 
											while($fila=mysqli_fetch_array($regiones))
											{
												?>
												<option value="<?php echo $fila['cod_region'];?>">
													<?php echo $fila["des_region"];?>
												</option>
												<?php
											}
											
											?>
										</select>
									</div>
								</div>

								<div class="row">
									<div class="col-sm-6">
										Provincia
									</div>
									<div class="col-sm-6">
										<select name="cboProvincia" id="cboProvincia">
											<option value="0">Escoja provincia</option>
											<?php 
											while($fila=mysqli_fetch_array($provincias))
											{
												?>
												<option value="<?php echo $fila['cod_provincia'];?>">
													<?php echo $fila["des_provincia"];?>
												</option>
												<?php
											}
											
											?>
										</select>
									</div>
								</div>

								<div class="row">
									<div class="col-sm-6">
										Ciudad
									</div>
									<div class="col-sm-6">
										<select name="cboCiudad" id="cboCiudad">
											<option value="0">Escoja ciudad</option>
											<?php 
											while($fila=mysqli_fetch_array($ciudades))
											{
												?>
												<option value="<?php echo $fila['cod_ciudad'];?>">
													<?php echo $fila["des_ciudad"];?>
												</option>
												<?php
											}
											CerrarConexion($link);
											?>
										</select>
									</div>
								</div>

								<div class="row">
									<div class="col-sm-6">
										Lugar evento
									</div>
									<div class="col-sm-6">
										<select name="cboLugarEvento" id="cboLugarEvento">
											<option value="0">Escoja lugar evento</option>
										</select>
									</div>
								</div>

								<div class="row">
									<div class="col-sm-6">
										<input type="submit" id="cmdEnviar" name="cmdEnviar" value="Enviar"class="btn btn-primary">
									</div>
									<div class="col-sm-6">
										<input type="reset" id="cmdLimpiar" name="cmdLimpiar" value="Limpiar" class="btn btn-success">
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
			include("php/pie.php");
			?>
		</div>
	</div>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){

		$("#cboRegion").change(function(){
			LlenarProvincias();
		});
		$("#cboProvincia").change(function(){
			LlenarCiudades();
		});
		$("#cboCiudad").change(function(){
			LlenarLugares();
		});

	});
</script>
<script type="text/javascript">
	function 	LlenarProvincias()
	{
		var codRegion=$("#cboRegion").val();
		$.ajax({
			type:"POST",
			url:"provincias.php",
			data:"region="+codRegion,
			success:function(r){
				$("#cboProvincia").html(r);
			}
		});
	}

	function 	LlenarCiudades()
	{
		var codProvincia=$("#cboProvincia").val();
		$.ajax({
			type:"POST",
			url:"ciudades.php",
			data:"provincia="+codProvincia,
			success:function(r){
				$("#cboCiudad").html(r);
			}
		});
	}

	function 	LlenarLugares()
	{
		var codCiudad=$("#cboCiudad").val();
		$.ajax({
			type:"POST",
			url:"lugares.php",
			data:"ciudad="+codCiudad,
			success:function(r){
				$("#cboLugarEvento").html(r);
			}
		});
	}
</script>