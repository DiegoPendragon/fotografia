<?php 
function AbrirConexion()
{
	$servidor="localhost";
	$usuario="root";
	$clave="";
	$bd="bd_fotografia";
	@$link=mysqli_connect($servidor,$usuario,$clave,$bd);
	if(!$link)
	{
		echo "No se pudo conectar a la BD";
		echo "<br>Error nro. mysql: ".mysqli_connect_errno();
		echo "<br>Error mysql: ".mysqli_connect_error();
	}
	else
	{
		  

		 // echo "Conexión exitosa";
	}
	return($link);
}
function CerrarConexion($link)
{
	if($link){
		mysqli_close($link);
	}
}
function EjecutarConsulta($CadSql,$link)
{
	try {
		$resultado=$link->query($CadSql);
	} catch (Exception $e) {
		echo "Error al ejecutar consulta";	
		$resultado="";	
	}
	return($resultado);
}
function EjecutarIUD($CadSql,$link)
{
	$exito=false;
	try {
		$exito=$link->query($CadSql);
	} catch (Exception $e) {
		$exito=false;
	}
	finally
	{
		CerrarConexion($link);
	}
	return($exito);
}
?>