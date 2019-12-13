<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MEDILAB || INDUMENTARIA</title>
    <link href="img/favicon.ico" rel="shortcut icon">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/miestilo.css" rel="stylesheet">
  </head>
  <body>
    <section class="container-fluid" id="contenedor">
    	<!-- acá va la cabecera -->
        <?php
        include('cabecera.php'); //comentario
        ?>
        <section class="container" id="contenedor-estatico">
            <section class="row" id="contenido">

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="mi-carousel">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                              <img src="img/slider1.jpg" class="altura-baja" alt="Los Angeles">
                            </div>

                            <div class="item">
                              <img src="img/slider2.jpg" class="altura-baja" alt="Chicago">
                            </div>

                            <div class="item">
                              <img src="img/slider3.jpg" class="altura-baja" alt="New York">
                            </div>
                        </div>

                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>

            	<a href="catalogo.php?id=medilab"><div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" id="izquierda">
                <h2 class="text-center">Medilab</h2>
                <img src="img/medilab.png" class="img-responsive img-thumbnail"/>
                </div></a>
                <a href="catalogo.php?id=termolab"><div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" id="centro">
                <h2 class="text-center">Termolab</h2>
                <img src="img/termolab.png" class="img-responsive img-thumbnail"/>
                </div></a>
                <a href="catalogo.php?id=moncar"><div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" id="derecha">
                <h2 class="text-center">Moncar</h2>
                <img src="img/moncar.png" class="img-responsive img-thumbnail"/>
                </div></a>

                <article class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="izquierda_abajo">
                <h3 class="bg-info">Quienes somos</h3>
                <p>
                    <?php
                    include("conexion.php");
                    $nosotros=mysqli_query($datos_conexion, "SELECT * FROM administrador");
                    while ($mostrar_nos=mysqli_fetch_array($nosotros)) 
                    {
                        echo $mostrar_nos['quien'];
                    ?>
                </p>
                </article>
                <article class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="derecha_abajo">
                <h3 class="bg-success">Misión y Visión</h3>
                <p>
                    <?php
                        echo $mostrar_nos['vision'];
                    }
                    ?>
                </p>
                </article>
            </section>
            <!-- acá va el footer -->
            <?php
            include('pie.php');
            ?>
        </section>
    </section>

 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>