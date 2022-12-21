<?php 
include "php/conexionbd.php";
$link=AbrirConexion();

$codProvincia=$_POST["provincia"];
$CadSql="Select cod_ciudad,des_ciudad 
from ciudad where cod_provincia='".$codProvincia."';";
$resultado=EjecutarConsulta($CadSql,$link);
$r='<option value="">Escoja ciudad</option>';
while ($fila=mysqli_fetch_array($resultado)) {
	$r.='<option value="'.$fila["cod_ciudad"].'">'.$fila["des_ciudad"].'</option>';
}

echo $r;
?>