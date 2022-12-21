<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Listado de autores</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstra pcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
			$CadSql="Select a.nombre_usuario,a.nombre_autor,a.direccion_autor,a.correo_autor from autor a;";
			$resultado=EjecutarConsulta($CadSql,$link);
			?>
			<div class="panel panel-primary">
				<div class="panel-heading">
					Listado de autores
				</div>
				<div class="panel-body azul">
					<div class="row">
						<div class="col-sm-1">Nombre usuario</div>
						<div class="col-sm-1">Nombre autor</div>
						<div class="col-sm-1">direccion autor</div>
						<div class="col-sm-1">correo</div>
					</div>
					<?php 		
					while($fila=mysqli_fetch_array($resultado))
					{
						?>
						<div class="row">
							<div class="col-sm-1">
								<?php echo $fila["cod_evento"];?>
							</div>
							<div class="col-sm-1">
								<a href="buscarevento.php?idEvento=<?php echo $fila["cod_evento"];?>" >
								<?php echo $fila["nombre_evento"];?> </a>
							</div>
							<div class="col-sm-1">
								<?php echo $fila["fecha_evento"];?>
							</div>
							<div class="col-sm-1">
								<?php echo $fila["hora_evento"];?>
							</div>
							<div class="col-sm-1">
								<?php echo $fila["edad_minima"];?>
							</div>
							<div class="col-sm-1">
								<?php echo $fila["aforo"];?>
							</div>
							<div class="col-sm-1">
								<?php echo $fila["des_tipo_evento"];?>
							</div>
							<div class="col-sm-1">
								<?php echo $fila["des_lugar"];?>
							</div>
							<div class="col-sm-1">
								<?php echo $fila["des_ciudad"];?>
							</div>
							<div class="col-sm-1">
								<?php echo $fila["des_provincia"];?>
							</div>
							<div class="col-sm-1">
								<?php echo $fila["des_region"];?>
							</div>
							<div class="col-sm-1">
								<?php echo $fila["nombre_organizacion"];?>
							</div>
						</div>
						<?php 
					} 
					$CadSql="Select count(a.cod_evento) 'total' 
					from evento a;";
					$resultado=EjecutarConsulta($CadSql,$link);
					$fila=mysqli_fetch_array($resultado);
					?>
					<div class="row">
						<div class="col-sm-2"></div>
						<div class="col-sm-4">Total eventos</div>
						<div class="col-sm-4">
							<b> <?php echo $fila["total"];?> </b>
						</div>
						<div class="col-sm-2"></div>
					</div>
					<?php CerrarConexion($link); ?>
				</div>
			</div>
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