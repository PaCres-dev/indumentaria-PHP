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
                  <h4>Eliminar Producto</h4>
          		<?php
                  if(isset($_SESSION['admin'])) 
                  {
                    include('../conexion.php');
                      
                    $id=$_POST['producto'];
                      	
                	  $buscar_producto=mysqli_query($datos_conexion, "SELECT * FROM productos WHERE id=$id");

                	  $mostrar_producto=mysqli_fetch_array($buscar_producto);

                	?>
                	<ul>
                		<li>Nombre del Producto: <?php echo $mostrar_producto['nombre']; ?></li>
                    <li>Descripción breve: <?php echo $mostrar_producto['breve_desc']; ?></li>
                		<li>Descripción: <?php echo $mostrar_producto['descripcion']; ?></li>
                		<li>Precio: $<?php echo $mostrar_producto['precio']; ?></li>
                		<li>Categoria: <?php echo $mostrar_producto['categoria']; ?></li>
                    <li>Imagenes: <br>
                		<?php
                    for ($i=1; $i < 6 ; $i++) 
                    { 
                      if ($mostrar_producto['imagen'.$i]!="")
                      {
                        ?><div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <img src="../mostrarImagenesProductos/imagen_producto1.php?id=<?php echo $id; ?>&img=<?php echo $i; ?>" class="img-responsive" style="height: 200px;" alt="<?php echo $mostrar_produc['nombre']; ?>">
                          </div>
                        <?php
                      }
                    }
                    ?>
                    </li>
                	</ul>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <p>¿Estas seguro que querés borrar este producto? <a href="borrar_producto_tabla.php?id=<?php echo $mostrar_producto['id']; ?>" class="btn btn-danger">SI</a><a href="eliminar_producto.php" class="btn btn-success">NO</a></p>
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