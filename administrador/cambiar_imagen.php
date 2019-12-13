<?php
	
	$id=$_POST['id'];

	// if (isset($_POST['cantidad'])) 
	// {
	// 	$cantidad=$_POST['cantidad'];
	// }
	// else
	// {
	// 	$cantidad=1;
	// }

	for ($i=0; $i < 6 ; $i++) 
	{ 
		if (isset($_POST['eliminar'.$i])) 
		{
			$eliminar=$_POST['eliminar'.$i];

			if ($eliminar=='borrar') 
			{
				include("../conexion.php");

				mysqli_query($datos_conexion, "UPDATE productos SET imagen".$i."=NULL WHERE id=$id");
				mysqli_query($datos_conexion, "UPDATE productos SET extension_imagen".$i."=NULL WHERE id=$id");

				header("Location:modificar_producto.php?r=ok");	
			}
		}
	}
	
	for ($i=1; $i < 6; $i++) 
	{ 

		if (isset($_FILES['foto'.$i]['name'])) 
		{
			
			$foto_name=$_FILES['foto'.$i]['name'];
			$foto_size=$_FILES['foto'.$i]['size'];
			$foto_type=$_FILES['foto'.$i]['type'];
			$foto_temporal=$_FILES['foto'.$i]['tmp_name'];
			$lim_tamano= 500000;
			


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
			 
			if ($foto_name !='' && $foto_size != 0 &&  $foto_size<=$lim_tamano && $extension !='') 
			{
				$f1= fopen($foto_temporal,"rb");		 
				$foto_reconvertida = fread($f1, $foto_size);		 
				$foto_reconvertida=addslashes($foto_reconvertida);

				include("../conexion.php");

				mysqli_query($datos_conexion, "UPDATE productos SET imagen".$i."='$foto_reconvertida' WHERE id=$id");
				mysqli_query($datos_conexion, "UPDATE productos SET extension_imagen".$i."='$extension' WHERE id=$id");

				mysqli_close($datos_conexion);

				header("Location:modificar_producto.php?r=ok");
			}
			else
			{
				header("Location:modificar_producto.php");
			}
		}
	}




?>