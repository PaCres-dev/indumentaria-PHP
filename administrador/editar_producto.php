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
                    <h4>Modificar Producto</h4>
                    <?php
                    if (isset($_SESSION['admin'])) 
                    {
                        $id=$_POST['producto'];
                        include("../conexion.php");
                        $consultar_produc=mysqli_query($datos_conexion, "SELECT * FROM productos WHERE id=$id");
                        $mostrar_produc=mysqli_fetch_array($consultar_produc);
                        ?>
                        <form method="POST" action="cambiar_producto.php">
                            <label for="nombre">Nombre del producto:</label>
                            <input type="text" name="nombre" class="form-control" value="<?php echo $mostrar_produc['nombre']; ?>">
                            
                            <label for="descripcionb">Descripción breve: (Aparecera solo en la miniatura del catálogo) </label>
                            <input type="text" name="descripcionb" id="descripcion" class="form-control" required maxlength="100" value="<?php echo $mostrar_produc['breve_desc'];?>"></input>

                            <label for="descripcion">Descripción:</label>
                            <textarea id="descripcion" name="descripcion" class="form-control" rows="4"><?php echo $mostrar_produc['descripcion'];?></textarea>

                            <label for="precio">Precio: </label>
                            <div class="input-group">
                                <div class="input-group-addon">$</div>
                                    <input type="number" class="form-control" name="precio" id="precio" value="<?php echo $mostrar_produc['precio']; ?>" required>
                                <div class="input-group-addon">.00</div>
                            </div>

                            <label for="relevancia">Relevancia: </label>
                            <select id="relevancia" name="relevancia" class="form-control">
                                <option value="1" <?php if ($mostrar_produc['relevancia']=='1') {echo "selected";} ?>>Mucha</option>
                                <option value="2" <?php if ($mostrar_produc['relevancia']=='2') {echo "selected";} ?>>Media</option>
                                <option value="3" <?php if ($mostrar_produc['relevancia']=='3') {echo "selected";} ?>>Baja</option>
                            </select>
                            
                            <label for="categoria">Categoría:</label>
                                <select id="categoria" name="categoria" class="form-control">
                                    <option value="medilab" <?php if ($mostrar_produc['categoria']=='medilab') {echo "selected";} ?>>Medilab</option>
                                    <option value="termolab" <?php if ($mostrar_produc['categoria']=='termolab') {echo "selected";} ?>>Termolab</option>
                                    <option value="moncar" <?php if ($mostrar_produc['categoria']=='moncar') {echo "selected";} ?>>Moncar</option>
                                </select>

                            <input type="hidden" name="id" value="<?php echo $mostrar_produc['id'];?>">
                            <input type="submit" value="Modificar Producto" name="modificar" class="btn btn-success">
                        </form>

                        <h4>Modificar, eliminar y/o agregar imagenes al producto</h4>
                            <form method="POST" action="cambiar_imagen.php" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $mostrar_produc['id']; ?>">
                        <?php
                        for ($i=1; $i < 6 ; $i++) 
                        { 
                            if ($mostrar_produc['imagen'.$i]!="")
                            {
                                ?>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <h4>Imagen N°<?php echo $i; ?></h4>
                                    <img src="../mostrarImagenesProductos/imagen_producto1.php?id=<?php echo $id; ?>&img=<?php echo $i; ?>" class="img-responsive" style="height: 200px;" alt="<?php echo $mostrar_produc['nombre']; ?>">
                                    
                                    <input type="file" name="foto<?php echo $i; ?>">
                                    <label for="eliminar<?php echo $i; ?>">Eliminar Imagen</label>
                                    <input type="checkbox"id="eliminar<?php echo $i; ?>" name="eliminar<?php echo $i; ?>" value="borrar">
                                </div>
                                <?php
                            }
                            else
                            {
                                ?>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <h4>Imagen N°<?php echo $i; ?></h4>
                                        <img src="../img/fotosProductos/download.svg" class="img-responsive" style="height: 200px;" alt="Sin imagen">
                                    <input type="file" name="foto<?php echo $i; ?>">
                                </div>
                                <?php
                            }
                        }
                        ?>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <input type="submit" value="Modificar Imagenes" class="btn btn-success">                                
                            </form>
                            </div>
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
        </section>
    </section>

 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>