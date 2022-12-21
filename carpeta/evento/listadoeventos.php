<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Listado de eventos</title>
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
			$CadSql="Select a.nombre_usuario,a.nombre_autor,a.direccion_autor,a.correo_autor from autor a;";
			$resultado=EjecutarConsulta($CadSql,$link);
			?>
			<div class="container mt-3">
				<table class="table table-dark">
					Listado de autores
				<thead>
					<tr>
						<th>Nombre usuario</th>
						<th>Nombre autor</th>
						<!--<th>direccion autor</th> -->
						<th>Correo</th>
					</tr>
				</thead>
				<tbody>
					<?php 		
					while($fila=mysqli_fetch_array($resultado)){
					
						?>
						<tr>
							<th> <?php 
							echo $fila["nombre_usuario"]; ?></th>
							<th><?php
							echo $fila["nombre_autor"];   ?></th>
							<!--<td>
								<?php
								echo $fila["direccion_autor"];

						    ?>  </td>
						-->
						    <th> <?php
						    echo $fila["correo_autor"]; ?></th>

						</div>

						</div>
						<?php
						}

					$CadSql="Select count(a.nombre_usuario) 'total' 
					from autor a;";

					$resultado=EjecutarConsulta($CadSql,$link);
					$fila=mysqli_fetch_array($resultado);
					?>
				</tbody>
				<tbody>
					<tr>
						<td>Total de autores
							</td>
						<td> <?php
						echo $fila["total"]; ?></td>
						<?php
					$CadSql="Select count(nombre_autor)'total' from autor a;";
					
					
					
