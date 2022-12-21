<?php 
include "php/conexionbd.php";
$link=AbrirConexion();

$codEvento=$_POST["evento"];

$CadSql="Select a.cod_evento,a.nombre_evento,a.fecha_evento,a.hora_evento,
a.edad_minima,a.aforo,a.rut_organizacion,a.cod_tipo_evento,
a.cod_lugar,b.cod_ciudad,c.cod_provincia,d.cod_region
from evento a,lugar b,ciudad c,provincia d
where a.cod_lugar=b.cod_lugar and b.cod_ciudad=c.cod_ciudad and 
c.cod_provincia=d.cod_provincia and a.cod_evento='".$codEvento."';";

$resultado=EjecutarConsulta($CadSql,$link);
$r=array();
while($fila=mysqli_fetch_array($resultado))
{
	$r["cod_evento"]=$fila["cod_evento"];
	$r["des_evento"]=$fila["nombre_evento"];
	$r["fecha_evento"]=$fila["fecha_evento"];
	$r["hora_evento"]=$fila["hora_evento"];
	$r["edad_minima"]=$fila["edad_minima"];
	$r["aforo"]=$fila["aforo"];
	$r["rut_organizacion"]=$fila["rut_organizacion"];
	$r["cod_tipo_evento"]=$fila["cod_tipo_evento"];
	$r["cod_lugar"]=$fila["cod_lugar"];
	$r["cod_ciudad"]=$fila["cod_ciudad"];
	$r["cod_provincia"]=$fila["cod_provincia"];
	$r["cod_region"]=$fila["cod_region"];
}
$r=json_encode($r);

echo $r;

?>