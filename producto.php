<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MEDILAB || INDUMENTARIA</title>
    <link href="img/favicon.ico" rel="shortcut icon">
    <link href="css/lightbox.css" rel="stylesheet">
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

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="nombre-producto">
                  <?php
                  include("conexion.php");
                  $id=$_GET['id'];

                  $producto=mysqli_query($datos_conexion, "SELECT * FROM productos WHERE id=$id");
                  $mostrarProducto=mysqli_fetch_array($producto); 
                    ?>
                    <ol class="breadcrumb">
                      <li><a href="index.php">Inicio</a></li>
                      <li><a href="catalogo.php?id=<?php echo $mostrarProducto['categoria']; ?>">Catálogo de <?php echo ucwords($mostrarProducto['categoria']); ?></a></li>
                      <li class="active nombreProducto"><?php echo $mostrarProducto['nombre']; ?></li>
                    </ol>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="carousel-lightroom">
                  <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                      <div class="item active">
                        <?php
                        if ($mostrarProducto['imagen1']=="") 
                        {
                          ?>
                          <img src="img/fotosProductos/download.svg" class="img-responsive" alt="<Producto sin imagen">
                          <?php
                        }
                        else
                        {
                          ?>
                          <img src="mostrarImagenesProductos/imagen_producto1.php?id=<?php echo $id; ?>&img=1" class="img-producto" alt="<?php echo $mostrarProducto['nombre']; ?>">
                          <?php
                        }
                        ?>
                      </div>
                      <?php
                      for ($i=2; $i < 6 ; $i++) 
                      { 
                        if ($mostrarProducto['imagen'.$i]!="")
                        {
                          ?>

                          <div class="item">
                            <img src="mostrarImagenesProductos/imagen_producto1.php?id=<?php echo $id; ?>&img=<?php echo $i; ?>" class="img-producto" alt="<?php echo $mostrarProducto['nombre']; ?>">
                          </div>
                          <?php
                        }
                      }
                      ?>
                    </div>

                    <!-- Left and right controls -->
                    <?php
                    if ($mostrarProducto['imagen2']!="")
                    {?>
                    <a class="left carousel-control p" href="#myCarousel" data-slide="prev">
                      <span class="glyphicon glyphicon-chevron-left"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control p" href="#myCarousel" data-slide="next">
                      <span class="glyphicon glyphicon-chevron-right"></span>
                      <span class="sr-only">Next</span>
                    </a>
                    <?php
                    }
                    ?> 
                  </div>

                  <div class="cajaLightbox">       
                    <?php
                    for ($i=1; $i < 6 ; $i++) 
                    { 
                      if ($mostrarProducto['imagen'.$i]!="")
                      {
                        ?>
                        <a href="mostrarImagenesProductos/imagen_producto1.php?id=<?php echo $id; ?>&img=<?php echo $i; ?>" data-lightbox="imagen_<?php echo $mostrarProducto['nombre']; ?>" data-title="<?php echo $mostrarProducto['nombre']; ?>"><img src="mostrarImagenesProductos/imagen_producto1.php?id=<?php echo $id; ?>&img=<?php echo $i; ?> " class="img_mini" alt="<?php echo $mostrarProducto['nombre']; ?>">
                        </a>
                        <?php
                      }
                    }
                    ?>
                  </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="descripcionProducto">
                  <h3><?php echo $mostrarProducto['nombre']; ?></h3>
                  <h3>Descripción:</h3>
                  <p><?php echo $mostrarProducto['descripcion'] ?></p>
                  <p>Precio: $<?php echo $mostrarProducto['precio'] ?></p>
                </div>
            </section>
            <!-- acá va el footer -->
            <?php
            include('pie.php');
            ?>
        </section>
    </section>

    <script type="text/javascript" src=""></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/lightbox-plus-jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
