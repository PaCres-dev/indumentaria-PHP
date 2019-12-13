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
            	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            		<h2>Administrador de Contenido</h2>
                    <h4>Cargar Producto</h4>
                    <?php
                        if(isset($_GET['r'])) 
                        {
                            if($_GET['r']=='wrong') 
                            {
                                echo "<p class='alert alert-danger' role='alert'>Error en la carga</p>";
                            }
                            if($_GET['r']=='ok') 
                            {
                                echo "<p class='alert alert-success' role='alert'>Cargada correctamente</p>";
                            }
                        }

                        if (isset($_SESSION['admin'])) 
                        {
                            ?>
                            <form method="POST" action="productos_cargados.php" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="nombre_producto">Nombre del producto: </label>
                                    <input type="text" name="nombre_producto" id="nombre_producto" class="form-control" required maxlength="40">

                                    <label for="descripcionb">Descripción breve: (Aparecera solo en la miniatura del catálogo) </label>
                                    <input type="text" name="descripcionb" id="descripcion" class="form-control" required maxlength="100"></input>

                                    <label for="descripcion">Descripción: </label>
                                    <textarea type="text" name="descripcion" id="descripcion" class="form-control" rows="4" required maxlength="250"></textarea>

                                    <label for="precio">Precio: </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">$</div>
                                        <input type="number" class="form-control" name="precio" id="precio" placeholder="Precio sin comas" required>
                                        <div class="input-group-addon">.00</div>
                                    </div>

                                    <label for="relevancia">Relevancia: </label>
                                    <select id="relevancia" name="relevancia" class="form-control">
                                        <option value="1">Mucha</option>
                                        <option value="2">Media</option>
                                        <option value="3">Baja</option>
                                    </select>

                                    <label for="categoria">Categoria: </label>
                                    <select id="categoria" name="categoria" class="form-control">
                                        <option value="medilab">Medilab</option>
                                        <option value="termolab">Termolab</option>
                                        <option value="moncar">Moncar</option>
                                    </select>

                                    <label for="imagen">Imagen:</label>
                                    <input type="file" class="form-control" name="foto" id="imagen" required><br />
                                </div>
                                <input type="submit" value="Cargar Producto" class="btn btn-success">
                            </form>
                            <?php
                        }
                        else
                        {
                            header("Location:index.php");
                        }
                        ?>
            	</div>
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