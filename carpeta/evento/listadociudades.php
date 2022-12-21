<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Listado de regiones, provincias y ciudades</title>
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
				//CerrarConexion($link);
			$CadSql="Select a.cod_region,a.des_region,b.cod_provincia,
			b.des_provincia,c.cod_ciudad,c.des_ciudad 
			from region a,provincia b,ciudad c 
			where a.cod_region=b.cod_region and 
			b.cod_provincia=c.cod_provincia;";
			$resultado=EjecutarConsulta($CadSql,$link);
			?>
			<div class="row">
				<div class="col-sm-2">Código región</div>
				<div class="col-sm-2">Nombre región</div>
				<div class="col-sm-2">Código provincia</div>
				<div class="col-sm-2">Nombre provincia</div>
				<div class="col-sm-2">Código ciudad</div>
				<div class="col-sm-2">Nombre ciudad</div>
			</div>
			<?php 		
			while($fila=mysqli_fetch_array($resultado))
			{
				?>
				<div class="row">
					<div class="col-sm-2">
						<?php echo $fila["cod_region"];?>
					</div>
					<div class="col-sm-2">
						<?php echo $fila["des_region"];?>
					</div>
					<div class="col-sm-2">
						<?php echo $fila["cod_provincia"];?>
					</div>
					<div class="col-sm-2">
						<?php echo $fila["des_provincia"];?>
					</div>
					<div class="col-sm-2">
						<?php echo $fila["cod_ciudad"];?>
					</div>
					<div class="col-sm-2">
						<?php echo $fila["des_ciudad"];?>
					</div>
				</div>
				<?php 
			} 
			$CadSql="Select count(a.cod_region) 'total' 
			from region a;";
			$resultado=EjecutarConsulta($CadSql,$link);
			$fila=mysqli_fetch_array($resultado);
			$totalr=$fila["total"];

			$CadSql="Select count(a.cod_provincia) 'total' 
			from provincia a;";
			$resultado=EjecutarConsulta($CadSql,$link);
			$fila=mysqli_fetch_array($resultado);
			$totalp=$fila["total"];

			$CadSql="select count(a.cod_ciudad) 'total' 
			from ciudad a;";
			$resultado=EjecutarConsulta($CadSql,$link);
			$fila=mysqli_fetch_array($resultado);
			$totalc=$fila["total"];

			?>
			<div class="row">
				
				<div class="col-sm-2">Total regiones</div>
				<div class="col-sm-2">
					<b> <?php echo $totalr;?> </b>
				</div>
				<div class="col-sm-2">Total provincias</div>
				<div class="col-sm-2">
					<b> <?php echo $totalp;?> </b>
				</div>
				<div class="col-sm-2">Total ciudades</div>
				<div class="col-sm-2">
					<b> <?php echo $totalc;?> </b>
				</div>
			</div>
			<?php CerrarConexion($link); ?>
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