<?php
	session_start();

	$new_pass=$_POST['clave'];
	$new_pass_confirmation=$_POST['repetirClave'];

	if ($new_pass===$new_pass_confirmation) 
	{
		include("../conexion.php");
		mysqli_query($datos_conexion, "UPDATE administrador SET password='$new_pass'");
		mysqli_close($datos_conexion);
		
		header("Location:index.php?i=newPassOk");
	}
	else
	{
		header("Location:index.php?i=newPassWrong");
	}
?>