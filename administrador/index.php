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
                        <h3 class="bg-warning">Cambiar contraseña de Administrador</h3>
                        <?php
                        if(isset($_GET['i'])) 
                        {
                            if($_GET['i']=='newPassWrong') 
                            {
                                echo "<p class='alert alert-danger' role='alert'>Las contraseñas no son iguales.</p>";
                            }
                            if($_GET['i']=='newPassOk') 
                            {
                                echo "<p class='alert alert-success' role='alert'>Contraseña cambiada correctamente.</p>";
                            }
                        }
                        ?>
                        <form method="POST" action="cambiar_pass_admin.php">
                        <label for="clave">Clave nueva</label>
                        <input type="password" name="clave" id="clave" class="form-control" minlength="6" required>
                        <label for="clave">Verificar clave</label>
                        <input type="password" name="repetirClave" id="repetirClave" class="form-control" required>
                        <input type="submit" value="Cambiar contraseña" class="btn btn-success" id="cambiarPass">      
                        </form>

                        
                        <?php
                    }
                    else
                    {
                        ?>
                        <p>User: admin || pass: 123456</p>
                        <form method="POST" action="ingresar_admin.php">
                        <label for="usuario">Usuario</label>
                        <input type="text" name="usuario" class="form-control" required id="usuario">
                        <label for="clave">Clave</label>
                        <input type="password" name="clave" id="clave" class="form-control" required>
                        <input type="submit" value="Ingresar" class="btn btn-success">      
                        </form>
                        <?php
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