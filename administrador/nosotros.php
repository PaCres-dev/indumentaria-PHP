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
                    <?php
                    if(isset($_GET['i'])) 
                    {
                        if($_GET['i']=='error') 
                        {
                            echo "<p class='alert alert-danger' role='alert'>Los datos ingresados son incorrectos.</p>";
                        }
                    }

                    if(isset($_SESSION['admin']))
                    {
                        ?>
                        <!--CAMBIO DE CONTRASEÑA-->
                        <h3 class="bg-warning">Cambiar Información personale de la página</h3>
                        <?php
                        if(isset($_GET['i'])) 
                        {
                            if($_GET['i']=='ok') 
                            {
                                echo "<p class='alert alert-success' role='alert'>Sección cambiada correctamente.</p>";
                            }
                        }
                        include("../conexion.php");
                        $nosotros=mysqli_query($datos_conexion, "SELECT * FROM administrador");
                        while ($mostrar_nos=mysqli_fetch_array($nosotros)) 
                        {
                            ?>
                            <form method="POST" action="cambiar_nosotros_admin.php">
                                <label for="nosotros">Nosotros</label>
                                <textarea type="text" name="nosotros" id="nosotros" class="form-control" rows="4" required maxlength="500"><?php echo $mostrar_nos['nosotros']; ?></textarea>
                                <br>
                                <label for="quien">Quienes Somos</label>
                                <textarea type="text" name="quien" id="quien" class="form-control" rows="4" required maxlength="500"><?php echo $mostrar_nos['quien']; ?></textarea>
                                <br>
                                <label for="vision">Mision y Vision</label>
                                <textarea type="text" name="vision" id="vision" class="form-control" rows="4" required maxlength="500"><?php echo $mostrar_nos['vision']; ?></textarea>
                                <br>
                                <label for="medilab">Medilab Descripción</label>
                                <textarea type="text" name="medilab" id="medilab" class="form-control" rows="4" required maxlength="500"><?php echo $mostrar_nos['medilab']; ?></textarea>
                                <br>
                                <label for="termolab">Termolab Descripción</label>
                                <textarea type="text" name="termolab" id="termolab" class="form-control" rows="4" required maxlength="500"><?php echo $mostrar_nos['termolab']; ?></textarea>
                                <br>
                                <label for="moncar">Moncar Descripción</label>
                                <textarea type="text" name="moncar" id="moncar" class="form-control" rows="4" required maxlength="500"><?php echo $mostrar_nos['moncar']; ?></textarea>
                                <br>
                                <label for="mail">Mail de Contacto</label>
                                <input type="mail" class="form-control" name="mail" id="mail" value="<?php echo $mostrar_nos['mail']; ?>">
                                <br>
                                <input type="submit" value="Cambiar Información" class="btn btn-success" id="cambiarPass">      
                            </form>
                            <?php
                        }
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
