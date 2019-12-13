<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MEDILAB || ADMIN</title>
    <link href="../img/favicon.ico" rel="shortcut icon">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/miestilo.css" rel="stylesheet">
  </head>
  <body>
    <section class="container-fluid" id="contenedor">
    	<!-- acá va la cabecera -->
        <?php
        include('cabecera_admin.php'); //comentario
        ?>
        <section class="container" id="contenedor-estatico">
            <section class="row" id="contenido">
                <?php
                if(isset($_SESSION['admin']))
                {
                    ?>
                	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                		<h2>Administrador de Productos</h2>
                        <a href="cargar_producto.php">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="carga">
                                <h2>Cargar productos</h2>
                                <p>Aqui puede cargar nuevos productos a su catálogo</p>
                            </div>
                        </a>
                        <a href="modificar_producto.php">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="modifica">
                                <h2>Modificar productos</h2>
                                <p>Aqui puede modificar sus productos ya cargados y agregarle mas imagenes a los mismos</p>
                            </div>
                        </a>
                        <a href="eliminar_producto.php">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="elimina">
                                <h2>Eliminar productos</h2>
                                <p>Aqui eliminara aquellos productos que no desee seguir teniendo en su catálogo</p>
                            </div>
                        </a>
                    </div>
                    <?php
                }
                else
                {
                    header("Location:index.php");
                }
                ?>
            </section>
            <!-- acá va el footer -->
            <?php
            include('../pie.php');
            ?>
        <section class="container" id="contenedor">
    </section>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>