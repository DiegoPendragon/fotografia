<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Listado de Contactos</title>
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
			$CadSql="Select a.rut_contacto,a.nombre_contacto, a.correo_contacto from contacto a;";
			$resultado=EjecutarConsulta($CadSql,$link);
			?>
			<div class="row">
				<div class="col-sm-2"></div>
				<div class="col-sm-3">Rut contacto</div>
				<div class="col-sm-3">Nombre contacto</div>
				<div class="col-sm-3">Correo contacto</div>
				<div class="col-sm-2"></div>
			</div>
			<?php 		
			while($fila=mysqli_fetch_array($resultado))
			{
				?>
				<div class="row">
					<div class="col-sm-2"></div>
					<div class="col-sm-3">
						<?php echo $fila["rut_contacto"];?>
					</div>
					<div class="col-sm-3">
						<?php echo $fila["nombre_contacto"];?>
					</div>
					<div class="col-sm-3">
						<?php echo $fila["correo_contacto"];?>
					</div>
					<div class="col-sm-2"></div>
				</div>
				<?php 
			} 
			$CadSql="Select count(a.rut_contacto) 'total' 
			from contacto a;";
			$resultado=EjecutarConsulta($CadSql,$link);
			$fila=mysqli_fetch_array($resultado);
			?>
			<div class="row">
				<div class="col-sm-2"></div>
				<div class="col-sm-3"></div>
				<div class="col-sm-3">Total contactos</div>
				<div class="col-sm-3">
					<b> <?php echo $fila["total"];?> </b>
				</div>
				<div class="col-sm-2"></div>
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