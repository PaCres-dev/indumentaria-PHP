<?php
$new_nosotros=$_POST['nosotros'];
$new_quien=$_POST['quien'];
$new_vision=$_POST['vision'];
$new_medilab=$_POST['medilab'];
$new_termolab=$_POST['termolab'];
$new_moncar=$_POST['moncar'];
$new_mail=$_POST['mail'];

include("../conexion.php");

mysqli_query($datos_conexion, "UPDATE administrador SET nosotros='$new_nosotros'");
mysqli_query($datos_conexion, "UPDATE administrador SET quien='$new_quien'");
mysqli_query($datos_conexion, "UPDATE administrador SET vision='$new_vision'");
mysqli_query($datos_conexion, "UPDATE administrador SET medilab='$new_medilab'");
mysqli_query($datos_conexion, "UPDATE administrador SET termolab='$new_termolab'");
mysqli_query($datos_conexion, "UPDATE administrador SET moncar='$new_moncar'");
mysqli_query($datos_conexion, "UPDATE administrador SET mail='$new_mail'");
mysqli_close($datos_conexion);

header("Location:nosotros.php?i=ok");
?>