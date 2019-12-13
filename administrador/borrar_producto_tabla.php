<?php
	include("../conexion.php");

	$id=$_GET['id'];

	mysqli_query($datos_conexion, "DELETE FROM productos WHERE id=$id");

	mysqli_close($datos_conexion);
	header("Location:eliminar_producto.php?r=ok");
?>