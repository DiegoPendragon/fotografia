<?php 
include "php/conexionbd.php";
$link=AbrirConexion();

$codCiudad=$_POST["ciudad"];
$CadSql="Select cod_lugar,des_lugar 
from lugar where cod_ciudad='".$codCiudad."';";
$resultado=EjecutarConsulta($CadSql,$link);
$r='<option value="">Escoja lugar</option>';
while ($fila=mysqli_fetch_array($resultado)) {
	$r.='<option value="'.$fila["cod_lugar"].'">'.$fila["des_lugar"].'</option>';
}

echo $r;
?>