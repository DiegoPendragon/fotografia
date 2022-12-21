<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Guardar evento</title>
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
			aqui se guardara el evento
			<div class="panel panel-primary">
				<div class="panel-heading">Registro de evento</div>
				<div class="panel-body">

					<?php 
					if(!isset($_POST["txtNombreEvento"]))
					{
						header("location: crearevento.php");
					}
					$nombreevento=$_POST["txtNombreEvento"];
					$fecha=$_POST["dtFechaEvento"];
					$cod_lugar=$_POST["cboLugarEvento"];
					$rutorganizacion=$_POST["cboOrganizacion"];
					$aforo=$_POST["txtAforo"];
					$edadMinima=$_POST["txtEdad"];
					$codTipoEvento=$_POST["cboTipoEvento"];
					$hora=$_POST["tmHoraEvento"];
					
					$CadSql="Insert into evento(nombre_evento,fecha_evento,hora_evento,aforo,edad_minima,cod_tipo_evento,rut_organizacion,cod_lugar) values('".$nombreevento."','".$fecha."','".$hora."','".$aforo."','".$edadMinima."','".$codTipoEvento."','".$rutorganizacion."','".$cod_lugar."');";
					include "php/conexionbd.php";
					$link=AbrirConexion();
					try{
						$resultado=EjecutarIUD($CadSql,$link);
						if($resultado){
							echo "Evento registrado correctamente";
						}
						else
						{
							echo "No se pudo crear el evento";
						}
					}
					catch(Exception $e){
						echo "Error crear el evento";
					}

					?>


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