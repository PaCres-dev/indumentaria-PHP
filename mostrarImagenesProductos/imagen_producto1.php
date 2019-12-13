<?php

	include("../conexion.php");
	$id=$_GET['id'];
	if (isset($_GET['img'])) 
	{
		$img=$_GET['img'];
	}
	else
	{
		$img=1;
	}
	

	$buscar_imagen=mysqli_query($datos_conexion, "SELECT imagen".$img.", extension_imagen".$img." FROM productos WHERE id=$id");

	$mostrar_imagen=mysqli_fetch_row($buscar_imagen);
	header ("Content-type:$mostrar_imagen[1]");
	echo $mostrar_imagen[0];

	mysqli_close($datos_conexion);
?>