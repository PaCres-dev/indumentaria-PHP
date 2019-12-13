<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MEDILAB || INDUMENTARIA</title>
    <link href="img/favicon.ico" rel="shortcut icon">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/miestilo.css" rel="stylesheet">
  </head>
  <body>
    <section class="container-fluid" id="contenedor">
    	<?php
        include('cabecera.php');
        ?>
        <section class="container" id="contenedor">
            <section class="row" id="contenido">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <h2>Contacto</h2>
            	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <p>Contactese con nosotros y les responderemos a la brevedad</p>
                  <form method="POST" action="enviar_datos.php">

                    <label for="nombre">Nombre: </label>
                    <input type="text" name="nombre_formu" id="nombre" class="form-control" required maxlength="30">

                    <label for="apellido">Apellido:</label>
                    <input type="text" name="apellido_formu" id="apellido" class="form-control" required maxlength="30">

                    <label for="correo">Correo Electrónico</label>
                    <input type="email" name="correo_formu" id="correo" class="form-control" required maxlength="60">

                    <label for="edad">Edad:</label>
                    <input type="number" name="edad_formu" id="edad" class="form-control" min="13" max="100">

                    <label for="fecha">Fecha de nacimiento</label>
                    <input type="date" name="fecha_formu" id="fecha" class="form-control">

                    <label for="motivo">Motivo:</label>
                    <select id="motivo" name="motivo_formu" class="form-control">
                        <option value="consulta">Consulta</option>
                        <option value="pedido">Pedido</option>
                        <option value="reclamo">Reclamo</option>
                    </select>

                    <label for="mensaje">Mensaje</label>
                    <textarea id="mensaje" name="mensaje_formu" class="form-control" rows="5"></textarea>

                    <input type="submit" class="btn btn-primary" value="Enviar Mensaje">

                    </form>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <!--MAP-->
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3288.269802805114!2d-58.692305284696836!3d-34.496043680487396!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bca3280b222009%3A0xc76a67216781d43!2sGral.+San+Mart%C3%ADn+3538%2C+B1613FKT+Los+Polvorines%2C+Buenos+Aires!5e0!3m2!1ses-419!2sar!4v1528723350648" width="100%" height="450" frameborder="0" style="border:0 " allowfullscreen></iframe>
                    <!--MAP FINISH-->

                </div>
            </section>
            <?php
            include('pie.php');
            ?>
        </section>
    </section>

 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>