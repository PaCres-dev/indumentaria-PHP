<?php

	session_start();
	
	$usuario_admin=$_POST['usuario'];
	$clave_admin=$_POST['clave'];

	include("../conexion.php");

	$consultar_datos_admin=mysqli_query($datos_conexion, "SELECT * FROM administrador");

	while ($verificar_datos_admin=mysqli_fetch_array($consultar_datos_admin)) 
	{
		if($usuario_admin==$verificar_datos_admin['usuario'] && $clave_admin==$verificar_datos_admin['password']) 
		{
			$_SESSION['admin']=$usuario_admin;
			header("Location:index.php");
		} 
		else 
		{
			header("Location:index.php?i=error");
		}
	}

?>