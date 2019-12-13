<?php
	$nombre=$_POST['nombre_producto'];
	$descripcionb=$_POST['descripcionb'];
	$descripcion=$_POST['descripcion'];
	$precio=$_POST['precio'];
	$relevancia=$_POST['relevancia'];
	$categoria=$_POST['categoria'];


	$foto_name= $_FILES['foto']['name'];
	$foto_size= $_FILES['foto']['size'];
	$foto_type=  $_FILES['foto']['type'];
	$foto_temporal= $_FILES['foto']['tmp_name'];
	$lim_tamano= 500000;
		
	//Explorer Friendly
	if ($foto_type=="image/x-png" || $foto_type=="image/png") 
	{
		$extension="image/png";
	}

	if ($foto_type=="image/pjpeg" || $foto_type=="image/jpeg") 
	{
		$extension="image/jpeg";
	}

	if ($foto_type=="image/gif") 
	{
		$extension="image/gif";
	}
	//Finish Explorer Friendly
	 

	if ($foto_name !='' && $foto_size != 0 &&  $foto_size<=$lim_tamano && isset($extension)) 
	{
		$f1= fopen($foto_temporal,"rb");
		 
		$foto_reconvertida = fread($f1, $foto_size);
		 
		$foto_reconvertida=addslashes($foto_reconvertida);

		include("../conexion.php");

		mysqli_query($datos_conexion, "INSERT INTO productos (id, nombre, breve_desc, descripcion, categoria, precio, relevancia, imagen1, extension_imagen1) VALUES (0, '$nombre', '$descripcionb', '$descripcion', '$categoria', $precio, $relevancia, '$foto_reconvertida', '$extension')");

		mysqli_close($datos_conexion);

		header("Location:cargar_producto.php?r=ok");
	}
	else
	{
		header("Location:cargar_producto.php?r=wrong");
	}

?>