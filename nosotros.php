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
            	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="nosotros">
                    <h2>Nosotros</h2>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                    <h3>M&B INDUMENTARIA</h3>
                    <p>
                        <?php
                        include("conexion.php");
                        $nosotros=mysqli_query($datos_conexion, "SELECT nosotros FROM administrador");
                        while ($mostrar_nos=mysqli_fetch_array($nosotros)) 
                        {
                            echo $mostrar_nos['nosotros'];
                        }
                        ?>   
                    </p>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                    <iframe width="100%" height="315" src="https://www.youtube.com/embed/GIBU4drVyMc?controls=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
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