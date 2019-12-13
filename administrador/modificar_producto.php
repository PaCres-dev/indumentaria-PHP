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
                    <h4>Modificar Propiedades</h4>
            		<?php
                    if (isset($_SESSION['admin'])) 
                    {
                        include("../conexion.php");

                        $consultar_produc=mysqli_query($datos_conexion, "SELECT id, nombre, categoria FROM productos");
                        ?>
                        <form method="POST" action="editar_producto.php">
                            <label>Categoría:</label>
                            <select name="producto" class="form-control">
                                <?php
                                    while ($mostrar_produc=mysqli_fetch_array($consultar_produc))
                                    {
                                        ?>
                                        <option value="<?php echo $mostrar_produc['id'];?>"><?php echo $mostrar_produc['nombre'];?> de <?php echo ucwords($mostrar_produc['categoria']);?></option>
                              <?php } ?>
                            </select>
                            <input type="submit" name="modify" value="Modificar producto" class="btn btn-success">
                            <span class="text-success">
                                <?php 
                                    if(isset($_GET['r']))
                                    {
                                        if($_GET['r']=='ok')
                                        {
                                            echo "Datos actualizados";
                                        }
                                        else if ($_GET['r']=='error') 
                                        {
                                            echo "Error en la carga de datos";
                                        }
                                    }
                                ?>
                            </span>
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
        </section>
    </section>

 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>