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
			<div class="panel panel-primary">
				<div class="panel-heading">Actualización de evento</div>
				<div class="panel-body">

					<?php 
					if(!isset($_POST["cboEvento"]))
					{
						header("location: buscarevento.php");
					}
					include "php/conexionbd.php";
					$link=AbrirConexion();
					$codEvento=$_POST["cboEvento"];
					$nombreevento=$_POST["txtNombreEvento"];
					$rutorganizacion=$_POST["cboOrganizacion"];
					$codTipoEvento=$_POST["cboTipoEvento"];
					$hora=$_POST["tmHoraEvento"];
					$CadSql="";
					if(isset($_POST["cmdModificarEvento"]))
					{
						$CadSql="Update evento set ";
						$CadSql.="nombre_evento='".$nombreevento."',";
						$CadSql.="fecha_evento='".$fecha."',";
						$CadSql.="hora_evento='".$hora."',";
						$CadSql.="aforo='".$aforo."',";
						$CadSql.="edad_minima='".$edadMinima."',";
						$CadSql.="cod_tipo_evento='".$codTipoEvento."',";
						$CadSql.="rut_organizacion='".$rutorganizacion."',";
						$CadSql.="cod_lugar='".$cod_lugar."' ";
						$CadSql.=" where cod_evento='".$codEvento."';";
						$mensaje="Evento actualizado correctamente";
						$error="Error al actualizar evento";
						//echo $CadSql;
					}
					else if(isset($_POST["cmdEliminarEvento"]))
					{
						$CadSql="Delete from evento ";
						$CadSql.=" where cod_evento='".$codEvento."';";
						$mensaje="Evento eliminado correctamente";
						$error="Error al eliminar evento";
					}
					
					
					try{
						$resultado=EjecutarIUD($CadSql,$link);
						if($resultado){
							echo '<div class="azul">'.$mensaje.'</div>';
						}
						else
						{
							echo '<div class="azul">'.$error.'</div>';
						}
					}
					catch(Exception $e){
						echo '<div class="azul">'.$error.'</div>';
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