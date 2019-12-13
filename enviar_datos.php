<?php
$nombre=$_POST['nombre_formu'];
$apellido=$_POST['apellido_formu'];
$correo=$_POST['correo_formu'];
$edad=$_POST['edad_formu'];
$fecha=$_POST['fecha_formu'];
$motivo=$_POST['motivo_formu'];
$mensaje=$_POST['mensaje_formu'];

include("conexion.php");

$mail=mysqli_query($datos_conexion, "SELECT * FROM administrador");
while ($mostrar_mail=mysqli_fetch_array($mail)) 
{
	$destino=$mostrar_nos['mail'];
}

$asunto="Mensaje enviado desde www.misitio.com";

$cuerpo="Nombre: ".$nombre."\r\n";
$cuerpo.="Apellido: ".$apellido."\r\n";
$cuerpo.="Correo: ".$correo."\r\n";
$cuerpo.="Edad: ".$edad."\r\n";
$cuerpo.="Fecha de nacimiento: ".$fecha."\r\n";
$cuerpo.="Motivo: ".$motivo."\r\n";
$cuerpo.="Mensaje: ".$mensaje;

$remitente="FROM: $nombre $apellido <$correo>";

mail($destino, $asunto, $cuerpo, $remitente);

mysqli_query($datos_conexion, "INSERT INTO mensajes VALUES (0,'$nombre', '$apellido', '$correo', $edad, '$fecha', '$motivo', '$mensaje')");

header("Location: mensaje_enviado.php");

?>