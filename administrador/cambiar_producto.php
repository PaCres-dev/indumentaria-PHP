<?php
	
	$nombre=$_POST['nombre'];
	$descripcionb=$_POST['descripcionb'];
	$descripcion=$_POST['descripcion'];
	$precio=$_POST['precio'];
	$relevancia=$_POST['relevancia'];
	$categoria=$_POST['categoria'];
	$id=$_POST['id'];

	include("../conexion.php");

	mysqli_query($datos_conexion, "UPDATE productos SET nombre='$nombre' WHERE id=$id");
	mysqli_query($datos_conexion, "UPDATE productos SET breve_desc='$descripcionb' WHERE id=$id");
	mysqli_query($datos_conexion, "UPDATE productos SET descripcion='$descripcion' WHERE id=$id");
	mysqli_query($datos_conexion, "UPDATE productos SET precio='$precio' WHERE id=$id");
	mysqli_query($datos_conexion, "UPDATE productos SET relevancia='$relevancia' WHERE id=$id");
	mysqli_query($datos_conexion, "UPDATE productos SET categoria='$categoria' WHERE id=$id");

	mysqli_close($datos_conexion);

	header("Location:modificar_producto.php?r=ok");
?>