<?php 
include "php/conexionbd.php";
$link=AbrirConexion();

$codTipo=$_POST["tipo"];
$CadSql="Select cod_evento,nombre_evento 
from evento where cod_tipo_evento='".$codTipo."';";
$resultado=EjecutarConsulta($CadSql,$link);
$r='<div class="row">';
$r.='<div class="col-sm-6">Codigo evento</div>';
$r.='<div class="col-sm-6">nombre_evento</div>';

while ($fila=mysqli_fetch_array($resultado)) {
	$r='<div class="row">';
	$r.='<div class="col-sm-6">'.$fila['cod_evento'].'</div>';
	$r.='<div class="col-sm-6">'.$fila['des_evento'].'</div>';
	$r='</div>';
}

echo $r;
?>
